@extends('layouts.app')



@section('content')

@php
    // Cache translations for the inner banner and membership section
    $membershipTitle = 'Membership';
    $homeText = 'Home';
    $pagesText = 'Pages';

    // Handle dynamic content and image with fallbacks and translation
    $headerImageUrl = asset('images/default-header-placeholder.jpg'); // Default fallback header image
    $membershipContentTitle = $membershipTitle; // Default title fallback
    $membershipContentText = 'Membership information will be available soon. Please check back later.';
    $membershipImageAlt = $membershipTitle; // Default alt text

    if (isset($membershipContent) && $membershipContent) {
        // Use ID in cache key if available, otherwise use 'static'
        $contentId = $membershipContent->id ?? 'static';

        $membershipContentTitle = $membershipContent->title ?? '';

        $membershipContentText = $membershipContent->content ?? '';

        if (!empty($membershipContent->image)) {
            $headerImageUrl = asset($membershipContent->image);
        }

        $membershipImageAlt = $membershipContentTitle.' image';
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