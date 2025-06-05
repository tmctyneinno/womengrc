@extends('layouts.app')



@section('content')


        <!-- Inner Banner -->
        @php
            // Cache translations for the inner banner and mission section
            $missionTitle = 'Mission';
            $homeText = 'Home';
            $pagesText = 'Pages';
            $missionStatementTitle = 'Mission statement';

            // Handle dynamic content and image with fallbacks and translation
            $headerImageUrl = (isset($aboutUs) && !empty($aboutUs->header_image)) ? asset($aboutUs->header_image) : asset('images/default-header-placeholder.jpg'); // Fallback header image
            $missionContent = '';
            $missionImageUrl = asset('images/default-mission-placeholder.jpg'); // Fallback mission image
            $missionImageAlt = $missionStatementTitle; // Default alt text

            if (isset($visionMission) && $visionMission) {
                $missionContent = $visionMission->mission ?? '';
                if (!empty($visionMission->mission_img)) {
                    $missionImageUrl = asset($visionMission->mission_img);
                }
                $missionImageAlt = $missionStatementTitle;
            }
        @endphp
        <div class="inner-banner" style="background-image: url({{ $headerImageUrl }});">
            <div class="container">
                <div class="inner-title text-center">
                    <h3>{{ $missionTitle }}</h3>
                    <ul>
                        <li>
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li>
                            <i class='bx bx-chevron-right'></i>
                        </li>
                        <li>{{ $pagesText }}</li>
                        <li>
                            <i class='bx bx-chevron-right'></i>
                        </li>
                        <li>{{ $missionTitle }}</li>
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
                                <h2>{{ $missionStatementTitle }}</h2>
                                <p>
                                    {{-- {!! $missionContent !!} --}}
                                    {!! $visionMission->mission  !!}
                                </p>
                            </div>
                           
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="">
                            <img src="{{ $missionImageUrl }}" alt="{{ $missionImageAlt }}" style="border-radius: 5%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <!-- Client Area -->
        @include('home.pages.testimonial')
        <!-- Client Area End -->

       
     
@endsection