<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;




class UserCertification extends Pivot
{
    protected $table = 'user_certifications';

    protected $casts = [
        'completed_at' => 'date',
        'expires_at' => 'date'
    ];

    public function scopeIncomplete(Builder $query): Builder
    {
        return $query->whereNull('completed_at');
    }

    public function scopeComplete(Builder $query): Builder
    {
        return $query->whereNotNull('completed_at');
    }

    public function scopeExpiringSoon(Builder $query, int $days = 30): Builder
    {
        return $query->whereDate('expires_at', '<=', now()->addDays($days))
                    ->whereDate('expires_at', '>=', now());
    }

    public function scopeExpired(Builder $query): Builder
    {
        return $query->whereDate('expires_at', '<', now());
    }
}