@extends('layouts.app')



@section('content')

 
        <!-- Inner Banner -->
        <div class="inner-banner" style="background-image: url({{ asset($aboutUs->header_image) }});">
            <div class="container">
                <div class="inner-title text-center">
                    <h3>About Us</h3>
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
                        <li>About Us</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Inner Banner End -->

        <!-- About Area -->
        <div class="about-area pt-100 pb-70">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6">
                        <div class="about-content">
                            <div class="section-title pb-3" style="text-align: justify">
                                <h2>About us</h2>
                                <p>
                                    {!! ($aboutUs->content) !!}
                                </p>
                            </div>
                            
                           
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="about-img">
                            <img src="{{ asset($aboutUs->image) }}" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About Area End -->

        <!-- Choose Area  -->
        <div class="choose-area">
            <div class="container">
                <div class="section-title text-center">
                    <span>"Explore Insights</span>
                    <h2>What We Do</h2>
                </div>
                <div class="choose-width pt-100 pb-70">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6">
                            <div class="choose-card">
                                <i class="flaticon-phone-call"></i>
                                <h3>Empower Leaders</h3>
                                <p>We provide mentorship, training, and resources to equip women with the skills and confidence to lead in their organizations.</p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="choose-card">
                                <i class="flaticon-web-page"></i>
                                <h3>Foster Collaboration</h3>
                                <p>
                                    Through events, networking opportunities, and partnerships, we connect professionals to exchange insights, share best practices, and solve real-world challenges.
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6  ">
                            <div class="choose-card">
                                <i class="flaticon-support"></i>
                                <h3>Drive Innovation</h3>
                                <p>
                                    We stay at the forefront of industry trends, offering tools and knowledge to navigate the rapidly evolving GRC and financial crime landscape.
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6  ">
                            <div class="choose-card">
                                <i class="flaticon-support"></i>
                                <h3>Promote Integrity</h3>
                                <p>
                                    Upholding the highest ethical standards, we champion practices that build trust and drive sustainable change across industries.
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6  ">
                            <div class="choose-card">
                                <i class="flaticon-support"></i>
                                <h3>Advocate for Equity</h3>
                                <p>
                                    We work to break down barriers and ensure that women have equal opportunities to excel in their c
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Choose Area End -->

        <!-- Video Area -->
        <div class="video-area video-area-bg">
            <div class="container">
                <div class="video-content">
                    <h2>Join us as we create a future where women are at the forefront of shaping secure, ethical, and resilient organizations and societies worldwide. </h2>
                     
                </div>
            </div>
        </div>
        <!-- Video Area End -->

        <!-- Counter Area -->
        <div class="counter-area">
            <div class="container">
                <div class="counter-bg">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 col-sm-6 col-md-3">
                            <div class="single-counter">
                                <h3>1254</h3>
                                <span>New Visiters Every Week</span>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-md-3">
                            <div class="single-counter">
                                <h3>23165</h3>
                                <span>New Visiters Every Week</span>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-md-3">
                            <div class="single-counter">
                                <h3>4563</h3>
                                <span>Won Amazing Awards</span>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-md-3">
                            <div class="single-counter">
                                <h3>880</h3>
                                <span>New Listing Every Week</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Counter Area End -->

      

        

    
<!-- Testimonial Area -->
@include('home.pages.testimonial')
<!-- Testimonial Area End -->


       
     
@endsection