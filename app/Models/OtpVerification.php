<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtpVerification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'otp',
        'expires_at',
        'remember',
    ];
    protected $table = 'otp_verifications';
    public $timestamps = true;
    protected $casts = [
        'expires_at' => 'datetime',
    ];
    protected $hidden = [
        'otp',
        'remember',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function isValid()
    {
        return $this->expires_at > now();
    }
    public function isUsed()
    {
        return $this->used_at !== null;
    }
}
