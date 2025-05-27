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
        $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));
        
        $product = $stripe->products->create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $plan = $stripe->plans->create([
            'amount' => $this->price * 100,
            'currency' => 'usd',
            'interval' => $this->billing_period,
            'product' => $product->id,
        ]);

        $this->update(['stripe_plan_id' => $plan->id]);
        
        return $plan;
    }
}