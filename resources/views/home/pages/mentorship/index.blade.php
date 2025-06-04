@extends('layouts.app')



@section('content')

@php
    // Cache translations for the inner banner and mentorship section
    $mentorshipTitle = cache()->remember('mentorship_page_title_'.app()->getLocale(), 86400, function() {
        return GoogleTranslate::trans('Mentorship', app()->getLocale()) ?: 'Mentorship';
    });
    $homeText = cache()->remember('breadcrumb_home_text_'.app()->getLocale(), 86400, function() {
        return GoogleTranslate::trans('Home', app()->getLocale()) ?: 'Home';
    });
    $pagesText = cache()->remember('breadcrumb_pages_text_'.app()->getLocale(), 86400, function() {
        return GoogleTranslate::trans('Pages', app()->getLocale()) ?: 'Pages';
    });

    // Handle dynamic content and image with fallbacks and translation
    $headerImageUrl = asset('images/default-header-placeholder.jpg'); // Default fallback header image
    $mentorshipContentTitle = $mentorshipTitle; // Default title fallback
    $mentorshipContentText = cache()->remember('mentorship_default_content_'.app()->getLocale(), 86400, function() {
        return GoogleTranslate::trans('Mentorship information will be available soon. Please check back later.', app()->getLocale())
               ?: 'Mentorship information will be available soon. Please check back later.';
    });
    $mentorshipImageAlt = $mentorshipTitle; // Default alt text

    if (isset($mentorshipContent) && $mentorshipContent) {
        // Use ID in cache key if available, otherwise use 'static'
        $contentId = $mentorshipContent->id ?? 'static';

        $mentorshipContentTitle = cache()->remember('mentorship_content_title_'.$contentId.'_'.app()->getLocale(), 86400, function() use ($mentorshipContent, $mentorshipTitle) {
            return GoogleTranslate::trans($mentorshipContent->title ?? '', app()->getLocale()) ?: ($mentorshipContent->title ?? $mentorshipTitle);
        });

        $mentorshipContentText = cache()->remember('mentorship_content_text_'.$contentId.'_'.app()->getLocale(), 86400, function() use ($mentorshipContent) {
            // Translate the content, preserving HTML as it's output with {!! !!}
            return GoogleTranslate::trans($mentorshipContent->content ?? '', app()->getLocale()) ?: ($mentorshipContent->content ?? '');
        });

        if (!empty($mentorshipContent->image)) {
            $headerImageUrl = asset($mentorshipContent->image);
        }

        $mentorshipImageAlt = cache()->remember('mentorship_image_alt_'.$contentId.'_'.app()->getLocale(), 86400, function() use ($mentorshipContentTitle) {
             // Use the translated title for alt text
            return GoogleTranslate::trans($mentorshipContentTitle.' image', app()->getLocale()) ?: $mentorshipContentTitle.' image';
        });
    }
@endphp

<div class="inner-banner" style="background-image: url({{ $headerImageUrl }});">
    <div class="container">
        <div class="inner-title text-center">
            <h3>{{ $mentorshipTitle }}</h3>
            <ul>
                <li>
                    <a href="{{ route('home')}}">{{ $homeText }}</a>
                </li>
                <li> 
                    <i class="bx bx-chevron-right"></i>
                </li>
                <li>{{ $pagesText }}</li>
                <li>
                    <i class="bx bx-chevron-right"></i>
                </li>
                <li>{{ $mentorshipTitle }}</li>
            </ul>
        </div>
    </div>
</div>

<div class="terms-conditions-area ptb-100"> {{-- This class name seems generic, maybe rename to mentorship-content-area? --}}
    <div class="container">
        <div class="single-content"> {{-- This class name also seems generic --}}
            <h3 class="text-center">{{ $mentorshipContentTitle }}</h3>
            <p>
                {!! $mentorshipContentText !!}
            </p>
        </div>
    </div>
</div>

@endsection