@extends('layouts.app')



@section('content')

 
        <!-- Inner Banner -->
        <div class="inner-banner"  style="background-image: url({{ asset($aboutUs->header_image) }});">
            <div class="container">
                <div class="inner-title text-center">
                    <h3>Initiatives</h3>
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
                        <li> Initiatives</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Inner Banner End -->

        <!-- Category Area -->
        <section class="category-area pt-100 pb-70">
            <div class="container">
                <div class="section-title ">
                    <span>Key Initiatives</span>
                </div>
                
                <div class="row pt-45">
                    <div class="col-lg-4 col-sm-6">
                        <div class="category-box">
                            <a href="{{ route('home','mentorship-sponsorship-program') }}">
                                <img src="{{ asset('assets/images/initialtive1.png') }}" alt="Mentorship Sponsorship Program" style="width: 100px; height: 100px;">
                            </a>
                            
                            <a href="{{ route('home.pages','mentorship-sponsorship-program') }}">
                                <h3>Mentorship Sponsorship Program</h3>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="category-box">
                            <a href="{{ route('home','training-certification') }}">
                                <img src="{{ asset('assets/images/initialtive2.png') }}" alt="Mentorship Sponsorship Program" style="width: 100px; height: 100px;">
                            </a>
                            <a href="{{ route('home.pages','training-certification') }}">
                                <h3>Training Certification</h3>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="category-box">
                            <a href="{{ route('home','annual-summit-conferences') }}">
                                <img src="{{ asset('assets/images/initialtive3.png') }}" alt="Annual Summit Conferences" style="width: 100px; height: 100px;">
                            </a>
                            <a href="{{ route('home.pages','annual-summit-conferences') }}">
                                <h3>Annual Summit Conferences</h3>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="category-box">
                            <a href="{{ route('home','advocacy-policy-influence') }}">
                                <img src="{{ asset('assets/images/initialtive4.png') }}" alt="Advocacy Policy Influence" style="width: 100px; height: 100px;">
                            </a>
                            <a href="{{ route('home.pages','advocacy-policy-influence') }}">
                                <h3>Advocacy Policy Influence</h3>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="category-box">
                            <a href="{{ route('home','scholarships-grants') }}">
                                <img src="{{ asset('assets/images/initialtive5.png') }}" alt="Scholarships Grants" style="width: 100px; height: 100px;">
                            </a>
                            <a href="{{ route('home.pages','scholarships-grants') }}">
                                <h3>Scholarships Grants</h3>
                            </a>
                        </div>
                    </div>

                   
                </div>
            </div>
        </section>
        <!-- Category Area End -->

       
      

    


       
     
@endsection