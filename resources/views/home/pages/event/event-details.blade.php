@extends('layouts.app')



@section('content')

 <!-- Inner Banner -->
 <div class="inner-banner" style="background-image: url({{ asset('assets/images/event/event_bg.jpg') }});">
    <div class="container">
        <div class="inner-banner-title text-center">
            <h3>{!! Str::limit($eventItem->title, 30, '...') !!}</h3>
            <p>Empowering Women, Transforming Leadership, Driving Innovation</p>
        </div> 
        
        <div class="banner-list">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-7">
                    <ul class="list">
                        <li>
                            <a href="{{ route('home')}}">Home</a>
                        </li>
                        <li>
                            <i class='bx bx-chevron-right'></i>
                        </li>
                        <li>Resource</li>
                        <li>
                            <i class='bx bx-chevron-right'></i>
                        </li>
                        <li class="active">Event Details</li>
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

<!-- Blog Details Area -->
<div class="blog-details-area pt-100 pb-70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="blog-article">
                    <div class="article-comment-area">
                        <div class="article-img">
                            <img src="{{ asset($eventItem->image)}}" class="w-100" style="object-fit: cover; width: 100%;" alt="business-area">

                        </div>

                        <ul class="article-comment">
                            <li>
                                <div class="image">
                                 </div>
                                <div class="content">
                                    <h3>By Admin</h3>
                                    <span>{{ $eventItem->created_at->format('F d, Y') }}</span>
                                </div>
                            </li>

                            <li>
                                <div class="content-list">
                                    
                                </div>
                            </li>

                            <li>
                                <div class="content-list">
                                   
                                </div>
                            </li>
                        </ul>
                    </div>
            
                    <div class="article-content">
                        <h3>{{$eventItem->title }} </h3>
                       
                        {{-- Event Details Section --}}
                        @if($eventItem->start_time || $eventItem->location || $eventItem->is_online)
                            <div class="event-details-info mb-4 p-3" style="background-color: #f1f3f4; border-left: 4px solid #B03436; border-radius: 4px;">
                                <h6 class="mb-3" style="color: #B03436;"><i class="bx bx-info-circle"></i> Event Information</h6>
                                <div class="row">
                                    @if($eventItem->start_time)
                                        <div class="col-md-6 mb-2">
                                            <strong><i class="bx bx-calendar"></i> Start Date:</strong>
                                            {{ \Carbon\Carbon::parse($eventItem->start_time)->format('F j, Y \a\t g:i A') }}
                                        </div>
                                    @endif
                                    @if($eventItem->end_time)
                                        <div class="col-md-6 mb-2">
                                            <strong><i class="bx bx-calendar-x"></i> End Date:</strong>
                                            {{ \Carbon\Carbon::parse($eventItem->end_time)->format('F j, Y \a\t g:i A') }}
                                        </div>
                                    @endif
                                    @if($eventItem->location)
                                        <div class="col-md-6 mb-2">
                                            <strong><i class="bx bx-map"></i> Location:</strong>
                                            {{ $eventItem->location }}
                                        </div>
                                    @endif
                                    @if($eventItem->is_online)
                                        <div class="col-md-6 mb-2">
                                            <strong><i class="bx bx-laptop"></i> Format:</strong>
                                            <span class="badge bg-info">Online Event</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif

                        <div class="content-text">
                            {!! $eventItem->content !!} 
                        </div>

                        @if($eventItem->registration_url)
                            <div class="registration-section mt-4 p-4" style="background-color: #f8f9fa; border: 2px solid #B03436; border-radius: 8px;">
                                <h5 class="mb-3" style="color: #B03436;">
                                    <i class="bx bx-calendar-check"></i> Event Registration
                                </h5>
                                <p class="mb-3">Click the button below to register now!</p>
                                <a href="{{ $eventItem->registration_url }}" 
                                   target="_blank" 
                                   class="default-btn">
                                    <i class="bx bx-link-external"></i> Register Now
                                </a>
                                <p class="mt-2 text-muted small">
                                    <i class="bx bx-info-circle"></i> You will be redirected to the registration page
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="blog-widget-left">
                    <div class="blog-widget ">
                        <h3 class="title">Search</h3>
                        <div class="search-widget">
                            <form class="search-form">
                                <input type="search" class="form-control" placeholder="Search...">
                                <button type="submit">
                                    <i class="bx bx-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="blog-widget">
                        <h3 class="title">Navigation</h3>
                        <div class="widget_categories">
                            <ul>
                                @forelse ($randomMenuItems as $menuItem)
                                    <li>
                                        <a href="{{ route('home.pages', $menuItem->slug) }}">{{ $menuItem->name }} </a>
                                    </li>
                                @empty
                                    <p>No data found</p>
                                @endforelse
                            </ul>
                        </div>
                    </div>

                    <div class="blog-widget">
                        <h3 class="title">Related Posts</h3>
                        <div class="widget-popular-post">
                            @forelse ($recentBlog as $relatedPost)
                                <article class="item">
                                    <a href="{{ route('blog.detail', $relatedPost->slug) }}" class="thumb">
                                        <span 
                                        style="background-image: url({{ asset($relatedPost->image)}});"
                                        class="full-image cover "  role="img"></span>
                                    </a>
                                    <div class="info">
                                        <span>
                                            {{ $relatedPost->created_at->format('F d, Y') }}
                                        </span>
                                        <h4 class="title-text">
                                            <a href="{{ route('blog.detail', $relatedPost->slug) }}">
                                                {{ $relatedPost->title }}
                                            </a> 
                                        </h4>
                                    </div>
                                </article>
                                <!-- single categoris End -->
                            @empty
                                <p>No data found</p>
                            @endforelse

                           
                        </div>
                    </div>

                    <div class="blog-widget">
                        <h3 class="title">Related Events</h3>
                        <div class="widget-popular-post">
                            @forelse ($relatedEvent as $relatedEvent)
                                <article class="item">
                                    <a href="{{ route('events.show', $relatedEvent->slug) }}" class="thumb">
                                        <span 
                                        style="background-image: url({{ asset($relatedEvent->image)}});"
                                        class="full-image cover" role="img"></span>
                                    </a>
                                    <div class="info">
                                        <span>
                                            {{ $relatedEvent->created_at->format('F d, Y') }}
                                        </span>
                                        <h4 class="title-text">
                                            <a href="{{ route('events.show', $relatedEvent->slug) }}">
                                                {{ $relatedEvent->title }}
                                            </a> 
                                        </h4>
                                    </div>
                                </article>
                                <!-- single categoris End -->
                            @empty
                                <p>No data found</p>
                            @endforelse

                           
                        </div>
                    </div>

                    <div class="blog-widget">
                        <h3 class="title">Join us</h3>
                        <div class="widget-popular-post">
                            <div class="content">
                                <script src="https://static.elfsight.com/platform/platform.js" async></script>
                                <div class="elfsight-app-0955ada4-fab8-4640-ad23-4ee8e059e624" data-elfsight-app-lazy></div>
                            </div>
                        </div>
                    </div>

                  


                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog Details Area End -->


@endsection

