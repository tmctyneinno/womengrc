<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\MembershipPlans2;
use App\Models\Subscription;
use App\Models\User;
use Auth;

class CheckoutController extends Controller
{
    public function plans()
    {
        // Retrieve all membership plans grouped by type
        $individualPlans = MembershipPlans2::where('type', 'individual')->get();
        $corporatePlans = MembershipPlans2::where('type', 'corporate')->get();
        return view('checkout.plans', compact('individualPlans', 'corporatePlans'));
    }
 
    public function checkout($planId)
    {
        $plan = MembershipPlans2::findOrFail($planId);
        $user = Auth::user();
        
        Stripe::setApiKey(config('services.stripe.secret'));
        
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'gbp',
                    'product_data' => [
                        'name' => $plan->name . ' Membership',
                    ],
                    'unit_amount' => $plan->annual_fee * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('user.checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('user.checkout.cancel'),
            'customer_email' => $user->email,
            'metadata' => [
                'plan_id' => $plan->id,
                'user_id' => $user->id,
            ],
        ]);

        return redirect($session->url);
    }

    public function success(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        $session = Session::retrieve($request->session_id);
        
        // Verify the payment was successful
        if ($session->payment_status === 'paid') {
            $planId = $session->metadata->plan_id;
            $userId = $session->metadata->user_id;
            
            // Handle successful payment (create subscription, etc.)
            $this->createSubscription($userId, $planId);
            
            return view('checkout.success', [
                'plan' => MembershipPlans2::find($planId),
                'session' => $session
            ]);
        }
        
        return redirect()->route('checkout.cancel');
    }

    public function cancel()
    {
        return view('checkout.cancel');
    }

    protected function createSubscription($userId, $planId)
    {
        // Implement your subscription logic here
        // For example:
        $user = User::find($userId);
        $plan = MembershipPlans2::find($planId);
        // dd($plan->id);
        $user->subscriptions()->create([
            'membership_planId' => $plan->id,
            'starts_at' => now(),
            'ends_at' => now()->addYear(),
            'status' => 'active',
            'stripe_session_id' => request()->session_id,
            'stripe_subscription_id' => 0
        ]);
        
        // You might also want to send a confirmation email
    }

    public function cancelSubscription(Request $request)
    {
        $subscription = $request->user()->activeSubscription();
        
        if (!$subscription) {
            return back()->with('error', 'No active subscription found.');
        }
        
        if ($subscription->cancel()) {
            return back()->with('success', 'Your subscription has been canceled.');
        }
        
        return back()->with('error', 'Failed to cancel subscription. Please try again.');
    }
    
    public function webhook()
    {
        // Handle Stripe webhooks for subscription events
    }
}