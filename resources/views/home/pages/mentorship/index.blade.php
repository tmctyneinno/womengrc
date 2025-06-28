@extends('layouts.app')



@section('content')

@php
    // Cache translations for the inner banner and mentorship section
    $mentorshipTitle = 'Mentorship';
    $homeText = 'Home';
    $pagesText = 'Pages';

    // Handle dynamic content and image with fallbacks and translation
    $headerImageUrl = asset('images/default-header-placeholder.jpg'); // Default fallback header image
    $mentorshipContentTitle = $mentorshipTitle; // Default title fallback
    $mentorshipContentText = 'Mentorship information will be available soon. Please check back later.';
    
    $mentorshipImageAlt = $mentorshipTitle; // Default alt text

    if (isset($mentorshipContent) && $mentorshipContent) {
        // Use ID in cache key if available, otherwise use 'static'
        $contentId = $mentorshipContent->id ?? 'static';

        $mentorshipContentTitle = $mentorshipContent->title ?? '';

        $mentorshipContentText = $mentorshipContent->content ?? '';

        if (!empty($mentorshipContent->image)) {
            $headerImageUrl = asset($mentorshipContent->image);
        }

        $mentorshipImageAlt = $mentorshipContentTitle.' image';
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