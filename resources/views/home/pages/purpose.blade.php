@extends('layouts.app')



@section('content')


        <!-- Inner Banner -->
        <div class="inner-banner inner-bg6">
            <div class="container">
                <div class="inner-title text-center">
                    <h3>Purpose</h3>
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
                        <li>Purpose</li>
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
                                <span>Advancing Women in Leadership</span>
                                <h2>
                                    Purpose statement
                                </h2>
                                <p>
                                    To create a supportive platform that champions the advancement of women in GRC, financial crime, and fraud prevention by fostering leadership, professional growth, and collaboration across industries and sectors.
                                </p>
                            </div>
                           
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="application-img-two">
                            <img src="assets/img/mobile2.png" alt="Images">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    <!-- Testimonial Area -->
    @include('home.pages.testimonial')
    <!-- Testimonial Area End -->


       
     
@endsection