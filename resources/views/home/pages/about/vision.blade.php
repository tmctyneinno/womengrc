@extends('layouts.app')



@section('content')


        <!-- Inner Banner -->
        <div class="inner-banner " style="background-image: url({{ asset($aboutUs->header_image) }});">
            <div class="container">
                <div class="inner-title text-center">
                    <h3>Vision</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <i class='bx bx-chevron-right'></i>
                        </li>
                        <li>Pages</li>
                        <li>
                            <i class='bx bx-chevron-right'></i>
                        </li>
                        <li>Vision</li>
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
                                <h2>
                                    Vision statement
                                </h2>
                                <p>
                                    {!! $visionMission->vision  !!}
                                </p>
                            </div>
                           
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="">
                            <img src="{{ asset($visionMission->vision_img) }}" alt="Images" style="border-radius: 5%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    <!-- Testimonial Area -->
    @include('home.pages.testimonial')
    <!-- Testimonial Area End -->

       
     
@endsection