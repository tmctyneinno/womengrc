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
        'twitter_profile',
        'facebook_profile',
        'bio',
        'expertise',
        'years_of_experience',
        'last_login_at',
        'email_verified_at',
        'password',
        'profile_image', 
        'role',
        'phone',
        'upload_cv',
        'is_admin' 
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

    public function hasRole(string $role): bool
    {
        return $this->role === $role;
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

    public function guest()
    {
        return $this->hasOne(GuestModel::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    } 

    public function hasActiveSubscription()
    {
        return $this->subscriptions()
            ->where('status', 'active')
            ->where(function($query) {
                $query->whereNull('ends_at')
                      ->orWhere('ends_at', '>', now());
            })
            ->exists();
    }
    
    public function activeSubscription()
    {
        return $this->subscriptions()
            ->where('status', 'active')
            ->where(function($query) {
                $query->whereNull('ends_at')
                      ->orWhere('ends_at', '>', now());
            })
            ->with('membershipPlan')
            ->first();
    }  

    public function canAccessBenefit($benefit)
    {
        if (!$this->hasActiveSubscription()) return false;
        
        $plan = $this->activeSubscription()->membershipPlan;
        $benefits = json_decode($plan->benefits, true) ?? [];
        
        return in_array($benefit, $benefits);
    }

    public function certifications(): BelongsToMany
    {
        return $this->belongsToMany(Certification::class, 'user_certifications')
            ->using(UserCertification::class)
            ->withPivot([
                'completed_at',
                'expires_at',
                'certificate_file_path',
                'notes'
            ])
            ->withTimestamps();
    }

        public function incompleteCertifications()
        {
            return $this->certifications()
                ->wherePivotNull('completed_at')
                
                ->orWherePivot('expires_at', '>', now());
        
        }

        // app/Models/User.php
        public function sentMessages()
        {
            return $this->hasMany(PrivateMessage::class, 'sender_id');
        }

        public function receivedMessages()
        {
            return $this->hasMany(PrivateMessage::class, 'recipient_id');
        }

        public function unreadMessages()
        {
            return $this->receivedMessages()->unread();
        }

        public function groups()
        {
            return $this->belongsToMany(Group::class, 'group_user')
                ->withTimestamps()
                ->withPivot(['role', 'joined_at']);
        }
        
    }
 