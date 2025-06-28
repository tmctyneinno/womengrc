<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipPlan extends Model 
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stripe_plan_id',
        'billing_period',
        'benefits'
    ];

    protected $casts = [
        'benefits' => 'array',
        'price' => 'decimal:2'
    ];

    /**
     * Get all subscriptions for this plan
     */
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    /**
     * Create the Stripe plan
     */
    public function createAsStripePlan()
    {
        $stripeSecret = config('services.stripe.secret');

        if (!is_string($stripeSecret) || empty($stripeSecret)) {
            \Log::error('Stripe secret key is not configured or is not a string.');
            // Optionally, throw an exception or return an error response
            // For example: throw new \Exception('Stripe secret key is not configured properly.');
            return null; 
        }

        $stripe = new \Stripe\StripeClient($stripeSecret);

        $product = $stripe->products->create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        // Map your billing_period to Stripe's expected interval values
        $stripeInterval = strtolower(rtrim($this->billing_period, 'ly')); // "monthly" -> "month", "yearly" -> "year"

        $plan = $stripe->plans->create([
            'amount' => $this->price * 100,
            'currency' => 'usd',
            'interval' => $stripeInterval,
            'product' => $product->id,
        ]);

        $this->update(['stripe_plan_id' => $plan->id]);
        
        return $plan;
    }
}