<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvisoryProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'linkedin_profile',
        'twitter_profile',
        'facebook_profile',
        'bio',
        'expertise',
        'years_of_experience',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
