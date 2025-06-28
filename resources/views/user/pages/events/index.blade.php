@extends('layouts.dashboard')

@section('content')
<div class="page__body--wrapper" id="dashbody__page--body__wrapper">
    <main class="main__content_wrapper">
        <!-- dashboard container -->
        <div class="dashboard__container ">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2><i class="fas fa-calendar-alt me-2"></i>Upcoming Events</h2>
                {{-- @can('create', App\Models\Event::class)
                    <a href="{{ route('events.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-1"></i> Create Event
                    </a>
                @endcan --}}
            </div>

            <div class="row">
                @forelse($events as $event)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100">
                            @if($event->image)
                                <img src="{{ asset($event->image)}}" class="card-img-top" alt="{{ $event->title }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $event->title }}</h5>
                                <p class="text-muted">
                                    <i class="far fa-clock"></i> 
                                    {{-- {{ $event->start_time->format('M j, Y g:i A') }} --}}
                                </p>
                                <p class="card-text">{!! Str::limit($event->content, 100) !!}</p>
                            </div>
                            <div class="card-footer bg-white">
                                <a href="{{ route('user.events.upcoming.show', $event->slug) }}" class="btn btn-outline-primary">
                                    View Details 
                                </a>
                                {{-- @if($event->hasRegistration())
                                    <span class="badge bg-success float-end">
                                        Registered
                                    </span>
                                @endif --}}
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            No upcoming events found. Check back later!
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $events->links() }}
            </div>
        </div>
    </main>
</div>
@endsection