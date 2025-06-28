@extends('layouts.dashboard')

@section('content')
<div class="page__body--wrapper" id="dashbody__page--body__wrapper">
    <main class="main__content_wrapper">
        <!-- dashboard container -->
        <div class="dashboard__container ">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2><i class="fas fa-calendar-alt me-2"></i>Upcoming Events</h2>
                <p></p>
            </div>

            <div class="row">
               
                    <div class="col-md-6 col-lg-12 mb-4">
                        <div class="card h-100">
                            @if($event->image) 
                                <img src="{{ asset($event->image) }}" class="card-img-top" alt="{{ $event->title }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $event->title }}</h5>
                                <p class="text-muted">
                                    <i class="far fa-clock"></i> 
                                    {{ $event->created_at->format('M j, Y g:i A') }}
                                </p>
                                <p class="card-text">{!! $event->content !!}</p>
                            </div>
                            <div class="card-footer bg-white">
                              
                                {{-- @if($event->hasRegistration())
                                    <span class="badge bg-success float-end">
                                        Registered
                                    </span>
                                @endif --}}
                            </div>
                        </div>
                    </div>
              
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $events->links() }}
            </div>
        </div>
    </main>
</div>
@endsection