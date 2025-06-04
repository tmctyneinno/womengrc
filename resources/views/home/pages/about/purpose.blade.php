@extends('layouts.app')



@section('content')


        <!-- Inner Banner -->
        @php
            // Cache translations for the inner banner and purpose section
            $purposeTitle = cache()->remember('purpose_page_title_'.app()->getLocale(), 86400, function() {
                return GoogleTranslate::trans('Purpose', app()->getLocale()) ?: 'Purpose';
            });
            $homeText = cache()->remember('breadcrumb_home_text_'.app()->getLocale(), 86400, function() {
                return GoogleTranslate::trans('Home', app()->getLocale()) ?: 'Home';
            });
            $pagesText = cache()->remember('breadcrumb_pages_text_'.app()->getLocale(), 86400, function() {
                return GoogleTranslate::trans('Pages', app()->getLocale()) ?: 'Pages';
            });
            $purposeSectionSubtitle = cache()->remember('purpose_section_subtitle_'.app()->getLocale(), 86400, function() {
                return GoogleTranslate::trans('Advancing Women in Leadership', app()->getLocale()) ?: 'Advancing Women in Leadership';
            });
            $purposeStatementTitle = cache()->remember('purpose_statement_title_'.app()->getLocale(), 86400, function() {
                return GoogleTranslate::trans('Purpose statement', app()->getLocale()) ?: 'Purpose statement';
            });

            // Handle dynamic content and image with fallbacks and translation
            $headerImageUrl = (isset($aboutUs) && !empty($aboutUs->header_image)) ? asset($aboutUs->header_image) : asset('images/default-header-placeholder.jpg'); // Fallback header image
            $purposeContent = '';
            $purposeImageUrl = asset('images/default-purpose-placeholder.jpg'); // Fallback purpose image
            $purposeImageAlt = $purposeStatementTitle; // Default alt text

            if (isset($visionMission) && $visionMission) {
                $purposeContent = cache()->remember('vision_mission_purpose_content_'.($visionMission->id ?? 'static').'_'.app()->getLocale(), 86400, function() use ($visionMission) {
                    return GoogleTranslate::trans(strip_tags($visionMission->purpose ?? ''), app()->getLocale()) ?: ($visionMission->purpose ?? ''); // Strip tags before translating
                });
                if (!empty($visionMission->purpose_img)) {
                    $purposeImageUrl = asset($visionMission->purpose_img);
                }
                $purposeImageAlt = cache()->remember('vision_mission_purpose_image_alt_'.($visionMission->id ?? 'static').'_'.app()->getLocale(), 86400, function() use ($purposeStatementTitle) {
                    return GoogleTranslate::trans($purposeStatementTitle.' image', app()->getLocale()) ?: $purposeStatementTitle.' image';
                });
            }
        @endphp
        <div class="inner-banner " style="background-image: url({{ $headerImageUrl }});">
            <div class="container">
                <div class="inner-title text-center">
                    <h3>{{ $purposeTitle }}</h3>
                    <ul>
                        <li>
                            <a href="{{ url('/') }}">{{ $homeText }}</a>
                        </li>
                        <li>
                            <i class='bx bx-chevron-right'></i>
                        </li>
                        <li>{{ $pagesText }}</li>
                        <li>
                            <i class='bx bx-chevron-right'></i>
                        </li>
                        <li>{{ $purposeTitle }}</li>
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
                                <span>{{ $purposeSectionSubtitle }}</span>
                                <h2>{{ $purposeStatementTitle }}</h2>
                                <p>
                                    {!! $purposeContent !!}
                                </p>
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="">
                            <img src="{{ $purposeImageUrl }}" alt="{{ $purposeImageAlt }}" style="border-radius: 5%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    <!-- Testimonial Area -->
    @include('home.pages.testimonial')
    <!-- Testimonial Area End -->


       
     
@endsection