<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PendingRoleUpdate extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'current_role',
        'new_role', 
        'token',
        'status',
        'rejection_reason',
        'expires_at',
        'requested_by',
        'approved_at',
        'rejected_at',
    ];
 
    protected $casts = [
        'expires_at' => 'datetime'
    ];

    // Status constants
    const STATUS_PENDING = 'pending';
    const STATUS_APPROVED = 'approved';
    const STATUS_REJECTED = 'rejected';

    /**
     * Boot the model
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->token = $model->token ?? Str::random(60);
            $model->expires_at = $model->expires_at ?? now()->addDays(3);
        });
    }

    /**
     * Relationship to User model
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship to Admin who initiated the request
     */
    public function requestedBy()
    {
        return $this->belongsTo(User::class, 'requested_by');
    }

    /**
     * Check if request is pending
     */
    public function isPending()
    {
        return $this->status === self::STATUS_PENDING;
    }

    /**
     * Check if request is approved
     */
    public function isApproved()
    {
        return $this->status === self::STATUS_APPROVED;
    }

    /**
     * Check if request is rejected
     */
    public function isRejected()
    {
        return $this->status === self::STATUS_REJECTED;
    }

    /**
     * Check if request has expired
     */
    public function isExpired()
    {
        return $this->expires_at && now()->gt($this->expires_at);
    }

    /**
     * Scope for pending requests
     */
    public function scopePending($query)
    {
        return $query->where('status', self::STATUS_PENDING);
    }

    /**
     * Scope for active (pending and not expired) requests
     */
    public function scopeActive($query)
    {
        return $query->pending()
            ->where(function($q) {
                $q->whereNull('expires_at')
                  ->orWhere('expires_at', '>', now());
            });
    }

    /**
     * Approve the role update
     */
    public function approve()
    {
        $this->user->update(['role' => $this->new_role]);
        $this->update(['status' => self::STATUS_APPROVED]);
        
        // Notify user of approval
        $this->user->notify(new RoleUpdateApproved($this));
        
        return $this;
    }

    /**
     * Reject the role update
     */
    public function reject($reason = null)
    {
        $this->update([
            'status' => self::STATUS_REJECTED,
            'rejection_reason' => $reason
        ]);
        
        // Notify user of rejection
        $this->user->notify(new RoleUpdateRejected($this, $reason));
        
        return $this;
    }

    /**
     * Get the display name of the new role
     */
    public function getNewRoleDisplayAttribute()
    {
        return [
            'advisory_member' => 'Advisory Member',
            'guests' => 'Guest',
            'mentor' => 'Mentor',
            'mentee' => 'Mentee',
        ][$this->new_role] ?? $this->new_role;
    }

    public function getRoleDisplayName($role)
    {
        $displayNames = [
            'advisory_member' => 'Advisory Member',
            'guests' => 'Guest',
            'mentor' => 'Mentor',
            'mentee' => 'Mentee',
        ];
        
        return $displayNames[$role] ?? ucfirst(str_replace('_', ' ', $role));
    }
}