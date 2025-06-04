@extends('layouts.app')



@section('content')


    <!-- Inner Banner -->
    @php
        // Cache translations for the inner banner and vision section
        $visionTitle = cache()->remember('vision_page_title_'.app()->getLocale(), 86400, function() {
            return GoogleTranslate::trans('Vision', app()->getLocale()) ?: 'Vision';
        });
        $homeText = cache()->remember('breadcrumb_home_text_'.app()->getLocale(), 86400, function() {
            return GoogleTranslate::trans('Home', app()->getLocale()) ?: 'Home';
        });
        $pagesText = cache()->remember('breadcrumb_pages_text_'.app()->getLocale(), 86400, function() {
            return GoogleTranslate::trans('Pages', app()->getLocale()) ?: 'Pages';
        });
        $visionStatementTitle = cache()->remember('vision_statement_title_'.app()->getLocale(), 86400, function() {
            return GoogleTranslate::trans('Vision statement', app()->getLocale()) ?: 'Vision statement';
        });

        // Handle dynamic content and image with fallbacks and translation
        $headerImageUrl = (isset($aboutUs) && !empty($aboutUs->header_image)) ? asset($aboutUs->header_image) : asset('images/default-header-placeholder.jpg'); // Fallback header image
        $visionContent = '';
        $visionImageUrl = asset('images/default-vision-placeholder.jpg'); // Fallback vision image
        $visionImageAlt = $visionStatementTitle; 

        if (isset($visionMission) && $visionMission) {
             $visionContent = cache()->remember('vision_mission_vision_content_'.($visionMission->id ?? 'static').'_'.app()->getLocale(), 86400, function() use ($visionMission) {
                return GoogleTranslate::trans(strip_tags($visionMission->vision ?? ''), app()->getLocale()) ?: ($visionMission->vision ?? ''); // Strip tags before translating and displaying
            });
            if (!empty($visionMission->vision_img)) {
                $visionImageUrl = asset($visionMission->vision_img);
            }
             $visionImageAlt = cache()->remember('vision_mission_image_alt_'.($visionMission->id ?? 'static').'_'.app()->getLocale(), 86400, function() use ($visionStatementTitle) {
                return GoogleTranslate::trans($visionStatementTitle.' image', app()->getLocale()) ?: $visionStatementTitle.' image'; // Alt text based on title
            });
        }
    @endphp
    <div class="inner-banner " style="background-image: url({{ $headerImageUrl }});">
        <div class="container">
            <div class="inner-title text-center">
                <h3>{{ $visionTitle }}</h3>
                <ul>
                    <li>
                        <a href="{{ url('/') }}">{{ $homeText }}</a> {{-- Use url('/') for home link --}}
                    </li>
                    <li>
                        <i class='bx bx-chevron-right'></i>
                    </li>
                    <li>{{ $pagesText }}</li>
                    <li>
                        <i class='bx bx-chevron-right'></i>
                    </li>
                    <li>{{ $visionTitle }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    
    <div class="application-area-two pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-7">
                    <div class="application-content">
                        <div class="section-title" style="text-align: justify">
                            {{-- <span>Vision statement</span> --}}
                            <h2>{{ $visionStatementTitle }}</h2>
                            <p>
                                {!! $visionContent !!} {{-- Output translated/cached content --}}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Vision Image --}}
                {{-- Added check for $visionMission existence before trying to access properties --}}
                <div class="col-lg-5">
                    <div class="">
                        <img src="{{ $visionImageUrl }}" alt="{{ $visionImageAlt }}" style="border-radius: 5%;">
                    </div>
                </div>
            </div>
        </div>
    </div>

        
    <!-- Testimonial Area -->
    @include('home.pages.testimonial')
    <!-- Testimonial Area End -->

       
     
@endsection