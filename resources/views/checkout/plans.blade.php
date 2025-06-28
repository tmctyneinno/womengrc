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
                            Choose the membership plan that fits your needs and unlock exclusive benefits.
                        </p>
                    </div>

                    @if(auth()->user()->hasActiveSubscription())
                        @php
                            $currentSubscription = auth()->user()->activeSubscription();
                            $currentPlan = $currentSubscription->membershipPlan;
                        @endphp
                        <div class="current__membership mt-5">
                            <div class="alert alert-success">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4 class="alert-heading mb-3">
                                            <i class="fas fa-crown me-2"></i>Your Current Membership
                                        </h4>
                                        <p class="mb-1">
                                            You're subscribed to: <strong>{{ $currentPlan->name }}</strong>
                                        </p>
                                        <p class="mb-1">
                                            @if($currentSubscription->ends_at)
                                                Renews on: {{ $currentSubscription->ends_at->format('F j, Y') }}
                                            @else
                                                Active until canceled
                                            @endif
                                        </p>
                                    </div>
                                    <div class="text-end">
                                        <span class="badge bg-white text-success fs-6 p-2">
                                            £{{ number_format($currentPlan->annual_fee, 2) }}/year
                                        </span>
                                    </div>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    {{-- <a href="{{ route('user.benefits') }}" class="btn btn-outline-primary">
                                        <i class="fas fa-gem me-1"></i> View Benefits
                                    </a> --}}
                                    <form action="{{ route('user.subscription.cancel') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger" 
                                                onclick="return confirm('Are you sure you want to cancel your subscription?')">
                                            <i class="fas fa-ban me-1"></i> Cancel Subscription
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="upgrade-benefits mt-4 mb-5">
                            <div class="alert alert-info">
                                <h5><i class="fas fa-star me-2"></i> Why consider changing your plan?</h5>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <div class="d-flex">
                                            <i class="fas fa-bolt text-warning me-3 mt-1"></i>
                                            <div>
                                                <h6>More Features</h6>
                                                <p class="small mb-0">Access premium tools not in your current tier</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="d-flex">
                                            <i class="fas fa-chart-line text-success me-3 mt-1"></i>
                                            <div>
                                                <h6>Better Value</h6>
                                                <p class="small mb-0">Get more for your money with higher tiers</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="d-flex">
                                            <i class="fas fa-random text-primary me-3 mt-1"></i>
                                            <div>
                                                <h6>Flexibility</h6>
                                                <p class="small mb-0">Change plans as your needs evolve</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Plan comparison button -->
                    <div class="text-center mb-5">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#planComparisonModal">
                            <i class="fas fa-chart-bar me-2"></i> Compare All Plans
                        </button>
                    </div>

                    <!-- Individual Membership Plans -->
                    <div class="mt-5">
                        <h3 class="section__title mb-4">
                            <i class="fas fa-user me-2"></i>Individual Membership Tiers
                        </h3>
                        <div class="row">
                            @foreach($individualPlans as $plan)
                            <div class="col-md-4 mb-4">
                                <div class="card membership__card h-100">
                                    <div class="card-header bg-primary text-white position-relative">
                                        @if(auth()->user()->hasActiveSubscription() && $currentPlan->id == $plan->id)
                                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-white text-primary">
                                                <i class="fas fa-check-circle me-1"></i> Current
                                            </span>
                                        @endif
                                        <h3 class="plan__title">{{ $plan->name }}</h3>
                                        <div class="plan__price">
                                            £{{ number_format($plan->annual_fee, 2) }}<span class="plan__period">/year</span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        @if(auth()->user()->hasActiveSubscription() && $currentPlan->id != $plan->id)
                                            <div class="plan-comparison mb-3">
                                                <h6 class="text-center mb-2">Compared to your current plan:</h6>
                                                <ul class="comparison-list">
                                                    <!-- Example comparison points - customize based on your plan features -->
                                                    <li>+ {{ rand(2,5) }} additional premium features</li>
                                                    <li>+ {{ rand(10,50) }}% more storage</li>
                                                    <li>Priority customer support</li>
                                                </ul>
                                            </div>
                                        @endif
                                        
                                        <h4 class="plan__benefits--title">Target Audience:</h4>
                                        <p>{{ $plan->target_audience }}</p>
                                        
                                        <h4 class="plan__benefits--title mt-3">Key Benefits:</h4>
                                        <ul class="plan__benefits--list">
                                            @foreach(explode("\n", $plan->key_benefits) as $benefit)
                                                @if(trim($benefit))
                                                    <li class="plan__benefit--item">
                                                        <i class="fas fa-check-circle text-success"></i> {{ $benefit }}
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="card-footer bg-transparent border-top-0">
                                        @if(auth()->user()->hasActiveSubscription())
                                            @if($currentPlan->id == $plan->id)
                                                <button class="btn btn-success w-100" disabled>
                                                    <i class="fas fa-check-circle me-2"></i> Your Current Plan
                                                </button>
                                            @else
                                                @php
                                                    $isHigherTier = $plan->annual_fee > $currentPlan->annual_fee;
                                                @endphp
                                                <a href="{{ route('user.checkout', $plan->id) }}" 
                                                   class="btn {{ $isHigherTier ? 'btn-warning' : 'btn-outline-primary' }} w-100">
                                                    {{ $isHigherTier ? 'Upgrade' : 'Downgrade' }} Plan
                                                </a>
                                            @endif
                                        @else
                                            <a href="{{ route('user.checkout', $plan->id) }}" class="btn btn-primary w-100">
                                                Choose Plan
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Corporate Membership Plans -->
                    <div class="mt-5">
                        <h3 class="section__title mb-4">
                            <i class="fas fa-building me-2"></i>Corporate & Institutional Membership
                        </h3>
                        <div class="row">
                            @foreach($corporatePlans as $plan)
                            <div class="col-md-4 mb-4">
                                <div class="card membership__card h-100">
                                    <div class="card-header bg-dark text-white position-relative">
                                        @if(auth()->user()->hasActiveSubscription() && $currentPlan->id == $plan->id)
                                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-white text-dark">
                                                <i class="fas fa-check-circle me-1"></i> Current
                                            </span>
                                        @endif
                                        <h3 class="plan__title">{{ $plan->name }}</h3>
                                        <div class="plan__price">
                                            £{{ number_format($plan->annual_fee, 2) }}<span class="plan__period">/year</span>
                                        </div>
                                        @if($plan->max_staff_accounts)
                                            <div class="staff__accounts">
                                                <small>Includes {{ $plan->max_staff_accounts }} staff accounts</small>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        @if(auth()->user()->hasActiveSubscription() && $currentPlan->id != $plan->id)
                                            <div class="plan-comparison mb-3">
                                                <h6 class="text-center mb-2">Compared to your current plan:</h6>
                                                <ul class="comparison-list">
                                                    <li>+ {{ $plan->max_staff_accounts }} staff accounts</li>
                                                    <li>Team management dashboard</li>
                                                    <li>Centralized billing</li>
                                                </ul>
                                            </div>
                                        @endif
                                        
                                        <h4 class="plan__benefits--title">Ideal For:</h4>
                                        <p>{{ $plan->target_audience }}</p>
                                        
                                        <h4 class="plan__benefits--title mt-3">Key Benefits:</h4>
                                        <ul class="plan__benefits--list">
                                            @foreach(explode("\n", $plan->key_benefits) as $benefit)
                                                @if(trim($benefit))
                                                    <li class="plan__benefit--item">
                                                        <i class="fas fa-check-circle text-success"></i> {{ $benefit }}
                                                    </li>
                                                @endif 
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="card-footer bg-transparent border-top-0">
                                        @if(auth()->user()->hasActiveSubscription())
                                            @if($currentPlan->id == $plan->id)
                                                <button class="btn btn-success w-100" disabled>
                                                    <i class="fas fa-check-circle me-2"></i> Your Current Plan
                                                </button>
                                            @else
                                                <a href="{{ route('user.checkout', $plan->id) }}" 
                                                   class="btn btn-outline-dark w-100">
                                                    Switch to Corporate
                                                </a>
                                            @endif
                                        @else
                                            <a href="{{ route('user.checkout', $plan->id) }}" class="btn btn-dark w-100">
                                                Choose Plan
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <br/> <br/> <br/>
                       
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- Plan Comparison Modal -->
<div class="modal fade" id="planComparisonModal" tabindex="-1" aria-labelledby="planComparisonModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="planComparisonModalLabel">
                    <i class="fas fa-chart-bar me-2"></i>Plan Comparison
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Features</th>
                                @foreach($individualPlans as $plan)
                                    <th class="{{ auth()->user()->hasActiveSubscription() && $currentPlan->id == $plan->id ? 'bg-success text-white' : '' }}">
                                        {{ $plan->name }}<br>
                                        £{{ number_format($plan->annual_fee, 2) }}/year
                                    </th>
                                @endforeach
                                @foreach($corporatePlans as $plan)
                                    <th class="{{ auth()->user()->hasActiveSubscription() && $currentPlan->id == $plan->id ? 'bg-success text-white' : '' }}">
                                        {{ $plan->name }}<br>
                                        £{{ number_format($plan->annual_fee, 2) }}/year
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Example comparison rows - customize with your actual features -->
                            <tr>
                                <td>Maximum Properties</td>
                                @foreach($individualPlans as $plan)
                                    <td>{{ rand(5,20) }}</td>
                                @endforeach
                                @foreach($corporatePlans as $plan)
                                    <td>Unlimited</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>Staff Accounts</td>
                                @foreach($individualPlans as $plan)
                                    <td>1</td>
                                @endforeach
                                @foreach($corporatePlans as $plan)
                                    <td>{{ $plan->max_staff_accounts ?? '10+' }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>Customer Support</td>
                                @foreach($individualPlans as $plan)
                                    <td>Email only</td>
                                @endforeach
                                @foreach($corporatePlans as $plan)
                                    <td>24/7 Priority</td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                {{-- @if(auth()->user()->hasActiveSubscription())
                    <a href="{{ route('user.plans') }}" class="btn btn-primary">
                        Change My Plan
                    </a>
                @endif --}}
            </div>
        </div>
    </div>
</div>

<style>
    .membership__card {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        border: none;
    }
    
    .membership__card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }
    
    .card-header {
        padding: 1.5rem;
        position: relative;
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
        opacity: 0.8;
    }
    
    .staff__accounts {
        font-size: 0.9rem;
        margin-top: 0.5rem;
    }
    
    .plan__benefits--title {
        font-size: 1.1rem;
        margin-bottom: 1rem;
        color: #555;
        font-weight: 600;
    }
    
    .plan__benefits--list {
        list-style: none;
        padding-left: 0;
        margin-bottom: 0;
    }
    
    .plan__benefit--item {
        padding: 0.5rem 0;
        border-bottom: 1px solid #eee;
        display: flex;
        align-items: flex-start;
    }
    
    .plan__benefit--item i {
        margin-right: 0.5rem;
        margin-top: 0.2rem;
    }
    
    .plan__benefit--item:last-child {
        border-bottom: none;
    }
    
    .section__title {
        font-weight: 600;
        color: #333;
        position: relative;
        padding-bottom: 0.5rem;
    }
    
    .section__title::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 50px;
        height: 3px;
        background-color: #4e73df;
    }
    
    .plan-comparison {
        background-color: #f8f9fa;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 20px;
        border-left: 4px solid #4e73df;
    }
    
    .comparison-list {
        list-style-type: none;
        padding-left: 0;
        margin-bottom: 0;
    }
    
    .comparison-list li {
        padding: 5px 0;
        position: relative;
        padding-left: 25px;
        font-size: 0.9rem;
    }
    
    .comparison-list li:before {
        content: "+";
        position: absolute;
        left: 10px;
        color: #28a745;
        font-weight: bold;
    }
    
    .btn-warning {
        transition: all 0.3s ease;
        background-color: #ffc107;
        border-color: #ffc107;
        color: #212529;
    }
    
    .btn-warning:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        background-color: #e0a800;
        border-color: #d39e00;
    }
    
    .current__membership .alert {
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        border-left: 5px solid #28a745;
    }
    
    .upgrade-benefits .alert {
        border-radius: 10px;
        border-left: 5px solid #17a2b8;
    }
    
    .badge.bg-white {
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
</style>

@section('scripts')
<script>
    // Initialize tooltips
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@endsection
@endsection