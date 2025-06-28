<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class PrivateMessage extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'private_messages';

    protected $fillable = [
        'sender_id',
        'recipient_id',
        'subject',
        'body',
        'is_read',
        'read_at'
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'read_at' => 'datetime',
    ];

    // Relationships
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function recipient()
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }

    // Scopes
    public function scopeRecentForUser(Builder $query,  $userId): Builder
{
    return $query->where('recipient_id', $userId)
        ->orderBy('created_at', 'desc')
        ->with(['sender' => function($q) {
            $q->select('id', 'name', 'email'); // Only get necessary fields
        }]);
}


    
    public function scopeUnread(Builder $query): Builder
    {
        return $query->where('is_read', false);
    }

    public function scopeBetweenUsers(Builder $query, int $user1, int $user2): Builder
    {
        return $query->where(function($q) use ($user1, $user2) {
            $q->where('sender_id', $user1)
              ->where('recipient_id', $user2);
        })->orWhere(function($q) use ($user1, $user2) {
            $q->where('sender_id', $user2)
              ->where('recipient_id', $user1);
        });
    }

    // Helper Methods
    public function markAsRead(): void
    {
        if (!$this->is_read) {
            $this->update([
                'is_read' => true,
                'read_at' => now()
            ]);
        }
    }
}