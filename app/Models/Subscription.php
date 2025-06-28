<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
 
    protected $fillable = [ 
        'user_id',
        'membership_planId',
        'status',
        'ends_at', 
        'stripe_session_id',
        'stripe_subscription_id'
    ];

    protected $dates = ['ends_at'];

    /**
     * The possible subscription statuses
     */
    public const STATUSES = [
        'active' => 'Active',
        'past_due' => 'Past Due',
        'unpaid' => 'Unpaid', 
        'canceled' => 'Canceled',
        'incomplete' => 'Incomplete',
        'incomplete_expired' => 'Incomplete Expired',
        'trialing' => 'Trialing',
    ]; 

    /**
     * Get the user that owns the subscription
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the membership plan for this subscription
     */
    public function membershipPlan()
    {
        // return $this->belongsTo(MembershipPlans2::class);
        return $this->belongsTo(MembershipPlans2::class, 'membership_planId');
    } 

    /**
     * Check if subscription is active
     */
    public function isActive()
    {
        return $this->status === 'active' && 
               (!$this->ends_at || $this->ends_at->isFuture());
    }

    /**
     * Cancel the subscription
     */
    public function cancel()
    {
        $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));
        
        try {
            $stripe->subscriptions->cancel($this->stripe_session_id);
            $this->update([
                'status' => 'canceled',
                'ends_at' => now()
            ]);
            return true;
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }
}