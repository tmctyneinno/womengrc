@extends('layouts.app')



@section('content')

@php
    // Cache translations for the inner banner and membership criteria section
    $criteriaTitle = cache()->remember('membership_criteria_page_title_'.app()->getLocale(), 86400, function() {
        return GoogleTranslate::trans('Membership Criteria', app()->getLocale()) ?: 'Membership Criteria';
    });
    $homeText = cache()->remember('breadcrumb_home_text_'.app()->getLocale(), 86400, function() {
        return GoogleTranslate::trans('Home', app()->getLocale()) ?: 'Home';
    });
    $pagesText = cache()->remember('breadcrumb_pages_text_'.app()->getLocale(), 86400, function() {
        return GoogleTranslate::trans('Pages', app()->getLocale()) ?: 'Pages';
    });

    // Handle dynamic content and image with fallbacks and translation
    // Header image from $membershipContent (assuming it's passed for the banner)
    $headerImageUrl = asset('images/default-header-placeholder.jpg'); // Default fallback header image
    if (isset($membershipContent) && !empty($membershipContent->image)) {
        $headerImageUrl = asset($membershipContent->image);
    }

    // Content from $membershipCriteria
    $criteriaContentTitle = $criteriaTitle; // Default title fallback
    $criteriaContentText = cache()->remember('membership_criteria_default_content_'.app()->getLocale(), 86400, function() {
        return GoogleTranslate::trans('Membership criteria details will be available soon. Please check back later.', app()->getLocale())
               ?: 'Membership criteria details will be available soon. Please check back later.';
    });

    if (isset($membershipCriteria) && $membershipCriteria) {
        // Use ID in cache key if available, otherwise use 'static'
        $criteriaId = $membershipCriteria->id ?? 'static';

        $criteriaContentTitle = cache()->remember('membership_criteria_content_title_'.$criteriaId.'_'.app()->getLocale(), 86400, function() use ($membershipCriteria, $criteriaTitle) {
            return GoogleTranslate::trans($membershipCriteria->title ?? '', app()->getLocale()) ?: ($membershipCriteria->title ?? $criteriaTitle);
        });

        $criteriaContentText = cache()->remember('membership_criteria_content_text_'.$criteriaId.'_'.app()->getLocale(), 86400, function() use ($membershipCriteria) {
            // Translate the content, preserving HTML as it's output with {!! !!}
            return GoogleTranslate::trans($membershipCriteria->content ?? '', app()->getLocale()) ?: ($membershipCriteria->content ?? '');
        });
    }
@endphp

<div class="inner-banner" style="background-image: url({{ $headerImageUrl }});">
    <div class="container">
        <div class="inner-title text-center">
            <h3>{{ $criteriaTitle }}</h3>
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
                <li>{{ $criteriaTitle }}</li>
            </ul>
        </div>
    </div>
</div>

<div class="terms-conditions-area ptb-100"> {{-- Consider renaming this class for specificity --}}
    <div class="container">
        <div class="single-content"> {{-- Consider renaming this class for specificity --}}
            <h3 class="text-center">{{ $criteriaContentTitle }}</h3>
            <p>
                {!! $criteriaContentText !!}
            </p>
        </div>
    </div>
</div>

@endsection