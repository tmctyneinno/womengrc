@extends('layouts.app')
@section('content')

 <!-- Inner Banner -->
 @php
    // Simple fallback approach - disable GoogleTranslate for production stability
    $latestEventsSubtitle = 'Events';
    $latestEventsTitle = 'Latest Events'; 
    $noEventsText = 'No events available at the moment.';
    
    // Only use GoogleTranslate if explicitly enabled and working
    if (config('app.enable_google_translate', false) && class_exists('GoogleTranslate')) {
        try {
            $latestEventsSubtitle = cache()->remember('latest_events_subtitle_'.app()->getLocale(), 86400, function() {
                try {
                    return GoogleTranslate::trans('Events', app()->getLocale()) ?: 'Events';
                } catch (\Exception $e) {
                    return 'Events';
                }
            }) ?: 'Events';
            
            $latestEventsTitle = cache()->remember('latest_events_title_'.app()->getLocale(), 86400, function() {
                try {
                    return GoogleTranslate::trans('Latest Events', app()->getLocale()) ?: 'Latest Events';
                } catch (\Exception $e) {
                    return 'Latest Events';
                }
            }) ?: 'Latest Events';
            
            $noEventsText = cache()->remember('no_events_text_'.app()->getLocale(), 86400, function() {
                try {
                    return GoogleTranslate::trans('No events available at the moment.', app()->getLocale()) ?: 'No events available at the moment.';
                } catch (\Exception $e) {
                    return 'No events available at the moment.';
                }
            }) ?: 'No events available at the moment.';
        } catch (\Exception $e) {
            // Keep default values if anything fails
        }
    }
 @endphp
 <div class="inner-banner" style="background-image: url({{ asset('assets/images/event/event_bg.jpg') }});">
    <div class="container">
        <div class="inner-banner-title text-center">
            <h3>Events</h3>
            <p> Empowering Women, Transforming Leadership, Driving Innovation</p>
        </div>
        
        <div class="banner-list">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-7">
                    <ul class="list">
                        <li>
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li>
                            <i class='bx bx-chevron-right'></i>
                        </li>
                        <li>Resource</li>
                        <li>
                            <i class='bx bx-chevron-right'></i>
                        </li>
                        <li class="active">Events</li>
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
                        <span>{{ $latestEventsSubtitle }}</span>
                        <h2>{{ $latestEventsTitle }}</h2>
                    </div>

                    <div class="row pt-45 justify-content-center">
                        @forelse ($events as $event)
                            @php
                                // Simple approach - use original content, optionally translate if enabled
                                $eventTranslations = [
                                    'title' => $event->title ?? '',
                                    'alt_text' => $event->title ?? 'Event image',
                                    'content_snippet' => Str::limit(strip_tags($event->content ?? ''), 60),
                                ];
                                
                                // Only use GoogleTranslate if explicitly enabled and working
                                if (config('app.enable_google_translate', false) && class_exists('GoogleTranslate')) {
                                    try {
                                        $cachedTranslations = cache()->remember("event_item_{$event->id}_translations_".app()->getLocale(), 86400, function() use ($event) {
                                            try {
                                                return [
                                                    'title' => GoogleTranslate::trans($event->title ?? '', app()->getLocale()) ?: ($event->title ?? ''),
                                                    'alt_text' => GoogleTranslate::trans($event->title ?? 'Event image', app()->getLocale()) ?: ($event->title ?? 'Event image'),
                                                    'content_snippet' => GoogleTranslate::trans(Str::limit(strip_tags($event->content ?? ''), 60), app()->getLocale()) ?: Str::limit(strip_tags($event->content ?? ''), 60),
                                                ];
                                            } catch (\Exception $e) {
                                                return null; // Return null to use fallback
                                            }
                                        });
                                        
                                        if ($cachedTranslations) {
                                            $eventTranslations = $cachedTranslations;
                                        }
                                    } catch (\Exception $e) {
                                        // Keep original values
                                    }
                                }
                            @endphp
                            <div class="col-lg-4 col-md-6">
                                <div class="place-list-item">
                                    <div class="images">
                                        <a href="{{ route('events.show', $event->slug) }}" class="images-list">
                                            <img src="{{ asset($event->image) }}" alt="{{ $eventTranslations['alt_text'] }}">
                                        </a>
                                        
                                        <div class="place-tag">
                                            
                                            <h3 class="title"><a href="{{ route('events.show', $event->slug) }}">{{ $eventTranslations['title'] }}</a></h3>
                                        </div>
                                    </div>

                                    <div class="content">
                                        <a href="{{ route('events.show', $event->slug) }}">
                                            <h3>{{ $eventTranslations['title'] }}</h3>
                                        </a> 
                                        <p>
                                            {!! $eventTranslations['content_snippet'] !!}
                                        </p>

                                        <ul class="place-rating">
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12"><p class="text-center">{{ $noEventsText }}</p></div>
                        @endforelse

                       


                        {{-- <div class="col-lg-12 text-center"> 
                            <a href="{{ route('home.pages', 'event') }}" class="default-btn border-radius">
                                Load More  
                                <i class='bx bx-plus'></i>
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Listing Widget Section End -->



@endsection