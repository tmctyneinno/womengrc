<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Certification extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'certification_code',
        'duration_hours',
        'due_date',
        'is_required',
        'certificate_template_path',
    ];

    protected $casts = [
        'due_date' => 'date',
        'is_required' => 'boolean'
    ];

    public function users(): BelongsToMany
{
    return $this->belongsToMany(User::class, 'user_certifications') // Explicit table name
        ->using(UserCertification::class)
        ->withPivot([
            'completed_at', 
            'expires_at',
            'certificate_file_path',
            'notes'
        ])
        ->withTimestamps();
}

    public function scopeRequired(Builder $query): Builder
    {
        return $query->where('is_required', true);
    }

    public function scopeDueSoon(Builder $query, int $days = 30): Builder
    {
        return $query->whereDate('due_date', '<=', now()->addDays($days))
                    ->whereDate('due_date', '>=', now());
    }

    public function scopeExpired(Builder $query): Builder
    {
        return $query->whereDate('due_date', '<', now());
    }

    public function scopeIncompleteForUser(Builder $query,  $userId): Builder
    {
        return $query->where(function($query) use ($userId) {
                $query->whereHas('users', function($q) use ($userId) {
                        $q->where('user_certifications.user_id', $userId) // Explicit table name
                        ->where(function($q) {
                            $q->whereNull('user_certifications.completed_at')
                                ->orWhere('user_certifications.expires_at', '<', now());
                        });
                    })
                    ->orWhereDoesntHave('users', function($q) use ($userId) {
                        $q->where('user_certifications.user_id', $userId); // Explicit table name
                    });
            })
            ->where(function($query) {
                $query->whereNull('certifications.due_date')
                    ->orWhere('certifications.due_date', '>=', now());
            });
    }

    public function scopeForUser(Builder $query, int $userId): Builder
    {
        return $query->whereHas('users', function($q) use ($userId) {
            $q->where('user_id', $userId);
        });
    }

    public function scopeCompleteForUser(Builder $query, int $userId): Builder
    {
        return $query->whereHas('users', function($q) use ($userId) {
            $q->where('user_id', $userId)
              ->whereNotNull('completed_at')
              ->where('expires_at', '>', now());
        });
    }
}