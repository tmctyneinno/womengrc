<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorInvitations extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'mentor_id', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mentorInvitations()
    {
        return $this->hasMany(MentorInvitations::class, 'mentor_id');
    }

    // Relationship with the mentor invitations as a mentee (incoming invitation)
    public function menteeInvitations()
    {
        return $this->hasMany(MentorInvitations::class, 'user_id');
    }
    
    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id');
    }

    

    // Relationship to attach mentees to the mentor (mentor)
    public function mentees()
    {
        return $this->belongsToMany(User::class, 'mentor_invitations', 'mentor_id', 'user_id')->withTimestamps();
    }

}
 