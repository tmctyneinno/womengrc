@extends('layouts.app')



@section('content')

 <!-- Inner Banner -->
 <div class="inner-banner" style="background-image: url({{ asset('assets/images/event/event_bg.jpg') }});">
    <div class="container">
        <div class="inner-banner-title text-center">
            <h3>Events</h3>
            <p>Empowering Women, Transforming Leadership, Driving Innovation</p>
        </div>
        
        <div class="banner-list">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-7">
                    <ul class="list">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <i class='bx bx-chevron-right'></i>
                        </li>
                        <li>Pages</li>
                        <li>
                            <i class='bx bx-chevron-right'></i>
                        </li>
                        <li class="active">Event</li>
                    </ul>
                </div>

                <div class="col-lg-6 col-md-5">
                    @include('home.pages.social_link')
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Inner Banner End -->



<!-- Listing Widget Section -->
<div class="listing-widget-section pt-100 pb-70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="listing-widget-into">
                    <div class="section-title text-center">
                        <span>Events</span>
                        <h2>Latest Events </h2>
                    </div>

                    <div class="row pt-45 justify-content-center">
                        @forelse ($events as $event)
                            <div class="col-lg-4 col-md-6">
                                <div class="place-list-item">
                                    <div class="images">
                                        <a href="{{ route('events.show', $event->slug) }}" class="images-list">
                                            <img src="{{ asset($event->image) }}" alt="{{ $event->title }}">
                                        </a>
                                        
                                        <div class="place-tag">
                                            
                                            <h3 class="title"><a href="{{ route('events.show', $event->slug) }}">{{ $event->title }}</a></h3>
                                        </div>
                                    </div>

                                    <div class="content">
                                        <a href="{{ route('events.show', $event->slug) }}">
                                            <h3>{{ $event->title }}</h3>
                                        </a> 
                                        <p>
                                            {!! Str::limit($event->content, 60) !!}
                                        </p>

                                        <ul class="place-rating">
                                            
                                        </ul>
                                    </div>
                                </div>                
                            </div>
                        @empty
                            <p>No data available</p>    
                        @endforelse

                       


                        <div class="col-lg-12 text-center"> 
                            <a href="{{ route('home.pages', 'event') }}" class="default-btn border-radius">
                                Load More  
                                <i class='bx bx-plus'></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Listing Widget Section End -->



@endsection