<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [ 
        'name',
        'email',
        'linkedin',
        'password',
        'profile_picture',
        'role',
        'phone',
    ];
 
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        // 'password' => 'hashed',
    ];

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getNameAttribute()
    {
        return "{$this->firstname} {$this->lastname}";
    }
 
    public function mentors(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'mentor_invitations', 'user_id', 'mentor_id');
    }

    public function mentees()
    {
        return $this->belongsToMany(User::class, 'mentor_invitations', 'mentor_id', 'user_id');
    }
  
    public function mentorInvitations()
    {
        return $this->hasMany(MentorInvitations::class, 'user_id');
    } 

    public function notifications()
    {
        return $this->morphMany(Notification::class, 'notifiable')->orderBy('created_at', 'desc');
    }
    public function messages()
    {
        return $this->hasmany(Message::class);
    } 
    
    protected static function booted()
    {
        static::updating(function ($user) {
            // Update last_login_at when the user is being updated (e.g., during login)
            if ($user->isDirty('password')) {
                $user->last_login_at = now(); // Set current time as last login time
            }
        });
    }
    public function getLastLoginAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->diffForHumans();
    }

    public function advisoryProfile()
    {
        return $this->hasOne(AdvisoryProfile::class);
    }
}
