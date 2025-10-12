<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema; // Added Schema import

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content', 
        'image',
        'start_time',
        'end_time',
        'location',
        'is_online',
        'registration_url',
        'status'
    ];

    protected $dates = [
        'start_time',
        'end_time',
        'created_at',
        'updated_at'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->title); 
        });

        static::updating(function ($model) {
            $model->slug = Str::slug($model->title); 
        });
    }

    /**
     * Scope for upcoming events with safe column checking
     */
    public function scopeUpcoming($query)
    {
        if (!Schema::hasColumn('events', 'start_time') || !Schema::hasColumn('events', 'status')) {
            return $query->whereNull('id'); // Returns empty result if columns don't exist
        }

        return $query->where('start_time', '>', Carbon::now())
                   ->where('status', 'published')
                   ->orderBy('start_time', 'asc');
    }

    /**
     * Scope for past events with safe column checking
     */
    public function scopePast($query)
    {
        if (!Schema::hasColumn('events', 'end_time') || !Schema::hasColumn('events', 'status')) {
            return $query->whereNull('id'); // Returns empty result if columns don't exist
        }

        return $query->where('end_time', '<', Carbon::now())
                   ->where('status', 'published')
                   ->orderBy('end_time', 'desc');
    }

    /**
     * Check if event is upcoming
     */
    public function isUpcoming()
    {
        return $this->start_time && $this->start_time > Carbon::now();
    }

    /**
     * Check if event is past
     */
    public function isPast()
    {
        return $this->end_time && $this->end_time < Carbon::now();
    }

    /**
     * Format start time for display
     */
    public function getFormattedStartTimeAttribute()
    {
        return $this->start_time 
            ? $this->start_time->format('F j, Y \a\t g:i A') 
            : 'Not scheduled';
    }

    /**
     * Format end time for display
     */
    public function getFormattedEndTimeAttribute()
    {
        return $this->end_time 
            ? $this->end_time->format('F j, Y \a\t g:i A') 
            : 'Not scheduled';
    }

    /**
     * Get featured image URL (commented out as per your request)
     */
    // public function getFeaturedImageAttribute()
    // {
    //     return $this->image 
    //         ? asset('storage/'.$this->image) 
    //         : asset('images/default-event.jpg');
    // }
}