@extends('layouts.app')



@section('content')

@php
    // Cache translations for the inner banner and membership criteria section
    $criteriaTitle = 'Membership Criteria';
    $homeText = 'Home';
    $pagesText = 'Pages';

    // Handle dynamic content and image with fallbacks and translation
    // Header image from $membershipContent (assuming it's passed for the banner)
    $headerImageUrl = asset('images/default-header-placeholder.jpg'); // Default fallback header image
    if (isset($membershipContent) && !empty($membershipContent->image)) {
        $headerImageUrl = asset($membershipContent->image);
    }

    // Content from $membershipCriteria
    $criteriaContentTitle = $criteriaTitle; // Default title fallback
    $criteriaContentText = 'Membership criteria details will be available soon. Please check back later.';
  

    if (isset($membershipCriteria) && $membershipCriteria) {
        // Use ID in cache key if available, otherwise use 'static'
        $criteriaId = $membershipCriteria->id ?? 'static';

        $criteriaContentTitle = $membershipCriteria->title ?? '';

        $criteriaContentText = $membershipCriteria->content ?? '';
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