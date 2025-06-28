@extends('layouts.dashboard')

@section('content')
<div class="page__body--wrapper" id="dashbody__page--body__wrapper">
    <main class="main__content_wrapper">
        <div class="dashboard__container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-danger text-white">
                            <h3 class="mb-0">Payment Cancelled</h3>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-warning">
                                <h4 class="alert-heading">Payment Not Completed</h4>
                                <p>Your membership payment was not completed. No charges have been applied to your account.</p>
                                <hr>
                                <p class="mb-0">If this was a mistake, you can try again below.</p>
                            </div>
                            
                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('user.membership.plans') }}" class="solid__btn add__property--btn">
                                    Back to Membership Plans
                                </a>
                                <a href="{{ url()->previous() }}" class="bsolid__btn add__property--btn">
                                    Try Again
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection