<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MembershipPlans2 extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 'name', 'slug', 'annual_fee', 
        'target_audience', 'key_benefits',
        'requires_invitation', 'max_staff_accounts', 'is_active'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($membership) {
            $membership->slug = Str::slug($membership->name);
        });

        static::updating(function ($membership) {
            $membership->slug = Str::slug($membership->name);
        });
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_memberships')
            ->withPivot(['start_date', 'expiry_date', 'status'])
            ->withTimestamps();
    }
}
