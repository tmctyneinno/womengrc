@extends('layouts.dashboard')

@section('content')
<div class="page__body--wrapper" id="dashbody__page--body__wrapper">
    <main class="main__content_wrapper">
        <div class="dashboard__container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            <h3 class="mb-0">Payment Successful</h3>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-success">
                                <h4 class="alert-heading">Thank you for your payment!</h4>
                                <p>Your <b>{{ $plan->name }} membership </b> has been activated.</p>
                                <hr>
                                <p class="mb-0">
                                    <strong>Amount Paid:</strong> £{{ number_format($session->amount_total / 100, 2) }}<br>
                                    <strong>Membership Expires:</strong> {{ now()->addYear()->format('F j, Y') }}
                                </p>
                            </div>
                            
                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('user.dashboard') }}" class="solid__btn add__property--btn w-50">
                                    Go to Dashboard
                                </a>
                                {{-- <a href="{{ route('user.benefits') }}" class="btn btn-outline-primary">
                                    View Membership Benefits
                                </a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection