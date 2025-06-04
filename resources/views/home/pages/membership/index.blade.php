@extends('layouts.app')



@section('content')

@php
    // Cache translations for the inner banner and membership section
    $membershipTitle = cache()->remember('membership_page_title_'.app()->getLocale(), 86400, function() {
        return GoogleTranslate::trans('Membership', app()->getLocale()) ?: 'Membership';
    });
    $homeText = cache()->remember('breadcrumb_home_text_'.app()->getLocale(), 86400, function() {
        return GoogleTranslate::trans('Home', app()->getLocale()) ?: 'Home';
    });
    $pagesText = cache()->remember('breadcrumb_pages_text_'.app()->getLocale(), 86400, function() {
        return GoogleTranslate::trans('Pages', app()->getLocale()) ?: 'Pages';
    });

    // Handle dynamic content and image with fallbacks and translation
    $headerImageUrl = asset('images/default-header-placeholder.jpg'); // Default fallback header image
    $membershipContentTitle = $membershipTitle; // Default title fallback
    $membershipContentText = cache()->remember('membership_default_content_'.app()->getLocale(), 86400, function() {
        return GoogleTranslate::trans('Membership information will be available soon. Please check back later.', app()->getLocale())
               ?: 'Membership information will be available soon. Please check back later.';
    });
    $membershipImageAlt = $membershipTitle; // Default alt text

    if (isset($membershipContent) && $membershipContent) {
        // Use ID in cache key if available, otherwise use 'static'
        $contentId = $membershipContent->id ?? 'static';

        $membershipContentTitle = cache()->remember('membership_content_title_'.$contentId.'_'.app()->getLocale(), 86400, function() use ($membershipContent) {
            return GoogleTranslate::trans($membershipContent->title ?? '', app()->getLocale()) ?: ($membershipContent->title ?? '');
        });

        $membershipContentText = cache()->remember('membership_content_text_'.$contentId.'_'.app()->getLocale(), 86400, function() use ($membershipContent) {
            // Translate the content, preserving HTML as it's output with {!! !!}
            return GoogleTranslate::trans($membershipContent->content ?? '', app()->getLocale()) ?: ($membershipContent->content ?? '');
        });

        if (!empty($membershipContent->image)) {
            $headerImageUrl = asset($membershipContent->image);
        }

        $membershipImageAlt = cache()->remember('membership_image_alt_'.$contentId.'_'.app()->getLocale(), 86400, function() use ($membershipContentTitle) {
             // Use the translated title for alt text
            return GoogleTranslate::trans($membershipContentTitle.' image', app()->getLocale()) ?: $membershipContentTitle.' image';
        });
    }
@endphp
<div class="inner-banner" style="background-image: url({{ $headerImageUrl }});">
    <div class="container">
        <div class="inner-title text-center">
            <h3>{{ $membershipTitle }}</h3>
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
                <li>{{ $membershipTitle }}</li>
            </ul>
        </div>
    </div>
</div>

<div class="terms-conditions-area ptb-100"> {{-- This class name seems generic, maybe rename to membership-content-area? --}}
    <div class="container">
        <div class="single-content"> {{-- This class name also seems generic --}}
            <h3 class="text-center">{{ $membershipContentTitle }}</h3>
            <p>
                {!! $membershipContentText !!}
            </p>
        </div>
    </div>
</div>

@endsection