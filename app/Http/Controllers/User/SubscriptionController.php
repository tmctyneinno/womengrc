<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\MembershipPlan;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function plans()
    {
        $plans = MembershipPlan::all();
        return view('subscriptions.plans', compact('plans'));
    }

    public function checkout($planId)
    {
        $plan = MembershipPlan::findOrFail($planId);
        
        Stripe::setApiKey(config('services.stripe.secret'));
        
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price' => $plan->stripe_plan_id,
                'quantity' => 1,
            ]],
            'mode' => 'subscription',
            'success_url' => route('subscription.success'),
            'cancel_url' => route('subscription.cancel'),
        ]);

        return redirect($session->url);
    }

    public function success()
    {
        // Handle successful subscription
        return view('subscriptions.success');
    }

    public function cancel()
    {
        return view('subscriptions.cancel');
    }
    
    public function webhook()
    {
        // Handle Stripe webhooks for subscription events
    }
}