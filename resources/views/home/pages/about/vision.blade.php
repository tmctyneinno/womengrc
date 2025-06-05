@extends('layouts.app')



@section('content')


    <!-- Inner Banner -->
    @php
       
        
        // Handle dynamic content and image with fallbacks and translation
        $headerImageUrl = (isset($aboutUs) && !empty($aboutUs->header_image)) ? asset($aboutUs->header_image) : asset('images/default-header-placeholder.jpg'); // Fallback header image
        $visionContent = '';
        $visionImageUrl = asset('images/default-vision-placeholder.jpg'); // Fallback vision image
        $visionImageAlt = $visionStatementTitle; 

        if (isset($visionMission) && $visionMission) {
             $visionContent = strip_tags($visionMission->vision ?? '');
            if (!empty($visionMission->vision_img)) {
                $visionImageUrl = asset($visionMission->vision_img);
            }
             $visionImageAlt = $visionStatementTitle;
        }
    @endphp
    <div class="inner-banner " style="background-image: url({{ $headerImageUrl }});">
        <div class="container">
            <div class="inner-title text-center">
                <h3>Vision statement</h3>
                <ul>
                    <li>
                        <a href="{{ url('/') }}">Home</a> {{-- Use url('/') for home link --}}
                    </li>
                    <li>
                        <i class='bx bx-chevron-right'></i>
                    </li>
                    <li>Pages</li>
                    <li>
                        <i class='bx bx-chevron-right'></i>
                    </li>
                    <li>Home</li>
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
                            <h2>Vision statement</h2>
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