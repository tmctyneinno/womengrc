@extends('layouts.app')



@section('content')


        <!-- Inner Banner -->
        @php
            // Cache translations for the inner banner and purpose section
            $purposeTitle = 'Purpose';
            $homeText = 'Home';
            $pagesText = 'Pages';
            $purposeSectionSubtitle = 'Advancing Women in Leadership';
            $purposeStatementTitle = 'Purpose statement';

            // Handle dynamic content and image with fallbacks and translation
            $headerImageUrl = (isset($aboutUs) && !empty($aboutUs->header_image)) ? asset($aboutUs->header_image) : asset('images/default-header-placeholder.jpg'); // Fallback header image
            $purposeContent = '';
            $purposeImageUrl = asset('images/default-purpose-placeholder.jpg'); // Fallback purpose image
            $purposeImageAlt = $purposeStatementTitle; // Default alt text

            if (isset($visionMission) && $visionMission) {
                $purposeContent = $visionMission->purpose;

                if (!empty($visionMission->purpose_img)) {
                    $purposeImageUrl = asset($visionMission->purpose_img);
                }
                $purposeImageAlt = $purposeStatementTitle;
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