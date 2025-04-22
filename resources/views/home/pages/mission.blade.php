@extends('layouts.app')



@section('content')


        <!-- Inner Banner -->
        <div class="inner-banner" style="background-image: url({{ asset($aboutUs->header_image) }});">
            <div class="container">
                <div class="inner-title text-center">
                    <h3>Mission</h3>
                    <ul>
                        <li>
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li>
                            <i class='bx bx-chevron-right'></i>
                        </li>
                        <li>Pages</li>
                        <li>
                            <i class='bx bx-chevron-right'></i>
                        </li>
                        <li>Mission</li>
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
                                <h2>
                                    Mission statement
                                </h2>
                                <p>
                                    {!! $visionMission->mission  !!}
                                </p>
                            </div>
                           
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="application-img-two">
                            <img src="{{ asset($visionMission->mission_img)}}" alt="Images">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <!-- Client Area -->
        @include('home.pages.testimonial')
        <!-- Client Area End -->

       
     
@endsection