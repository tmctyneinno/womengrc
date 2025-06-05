@extends('layouts.dashboard')

@section('content')
<div class="page__body--wrapper" id="dashbody__page--body__wrapper">
    <main class="main__content_wrapper">
        <!-- dashboard container -->
        <div class="dashboard__container">
            <div class="">
                <div class="">
                    <!-- Plans section -->
                    <div class="welcome__section align-items-center">
                        <h2 class="welcome__content--title">Membership Plans</h2>
                        <p class="welcome__content--desc">
                            Choose the membership plan that fits your needs and unlock exclusive benefits including
                            mentorship programs, learning resources, and networking opportunities.
                        </p>
                    </div>
                    <!-- Plans section .\ -->

                    <!-- Plans listing -->
                    <div class="row mt-4">
                        @foreach($plans as $plan)
                        <div class="col-md-4 mb-4">
                            <div class="card membership__card h-100">
                                <div class="card-header bg-primary text-white">
                                    <h3 class="plan__title">{{ $plan->name }}</h3>
                                    <div class="plan__price">
                                        ${{ number_format($plan->price, 2) }}<span class="plan__period">/{{ $plan->billing_period }}</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h4 class="plan__benefits--title">Benefits:</h4>
                                    {{-- <ul class="plan__benefits--list">
                                        @foreach(json_decode($plan->benefits) as $benefit)
                                        <li class="plan__benefit--item">
                                            <i class="fas fa-check-circle text-success"></i> {{ $benefit }}
                                        </li>
                                        @endforeach
                                    </ul> --}}
                                </div>
                                <div class="card-footer bg-transparent">
                                    @if(auth()->user()->hasActiveSubscription() && auth()->user()->activeSubscription()->membership_plan_id == $plan->id)
                                        <button class="welcome__content--btn solid__btn" disabled>
                                            Current Plan
                                        </button> 
                                    @else
                                        {{-- <a href="{{ route('checkout', $plan->id) }}" class="welcome__content--btn solid__btn"> --}}
                                        <a href="{{ route('user.checkout', $plan->id) }}" class="welcome__content--btn solid__btn">
                                            Choose Plan 
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- Plans listing .\ -->

                    <!-- Current membership status -->
                    @if(auth()->user()->hasActiveSubscription())
                    <div class="current__membership mt-5">
                        <div class="alert alert-success">
                            <h4 class="alert-heading">Your Current Membership</h4>
                            <p>
                                You're currently subscribed to the <strong>{{ auth()->user()->activeSubscription()->membershipPlan->name }}</strong> plan.
                                @if(auth()->user()->activeSubscription()->ends_at)
                                    Your subscription will renew automatically on {{ auth()->user()->activeSubscription()->ends_at->format('F j, Y') }}.
                                @else
                                    Your subscription is active until you cancel.
                                @endif
                            </p>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('user.benefits') }}" class="btn btn-outline-primary">
                                    View All Benefits
                                </a>
                                <form action="{{ route('subscription.cancel') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger" 
                                            onclick="return confirm('Are you sure you want to cancel your subscription?')">
                                        Cancel Subscription
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- Current membership status .\ -->
                </div>
            </div>
        </div>
        <!-- dashboard container .\ -->
    </main>
</div>

<style>
    .membership__card {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }
    
    .membership__card:hover {
        transform: translateY(-5px);
    }
    
    .plan__title {
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
    }
    
    .plan__price {
        font-size: 2rem;
        font-weight: bold;
    }
    
    .plan__period {
        font-size: 1rem;
        font-weight: normal;
    }
    
    .plan__benefits--title {
        font-size: 1.1rem;
        margin-bottom: 1rem;
        color: #555;
    }
    
    .plan__benefits--list {
        list-style: none;
        padding-left: 0;
    }
    
    .plan__benefit--item {
        padding: 0.5rem 0;
        border-bottom: 1px solid #eee;
    }
    
    .plan__benefit--item:last-child {
        border-bottom: none;
    }
</style>
@endsection