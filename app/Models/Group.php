<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'logo_path',
        'type',
        'creator_id',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'joined_at' => 'datetime'
    ];

    // Relationships
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->withPivot(['role', 'joined_at'])
            ->withTimestamps();
    }

    public function discussions(): HasMany
    {
        return $this->hasMany(Discussion::class);
    }

    public function latestDiscussion()
    {
        return $this->hasOne(Discussion::class)->latestOfMany();
    }

    // Scopes
    public function scopePublic($query)
    {
        return $query->where('type', 'public');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeForUser($query, $userId)
    {
        return $query->whereHas('users', function($q) use ($userId) {
            $q->where('user_id', $userId);
        });
    }

    // Helpers
    public function getMemberCountAttribute()
    {
        return $this->users()->count();
    }

    public function isMember($userId)
    {
        return $this->users()->where('user_id', $userId)->exists();
    }

    public function isAdmin($userId)
    {
        return $this->users()
            ->where('user_id', $userId)
            ->where('role', 'admin')
            ->exists();
    }
}
 