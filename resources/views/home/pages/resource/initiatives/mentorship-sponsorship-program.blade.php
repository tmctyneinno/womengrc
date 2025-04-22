@extends('layouts.app')



@section('content')

 
        <!-- Inner Banner -->
        <div class="inner-banner"  style="background-image: url({{ asset($aboutUs->header_image) }});">
            <div class="container">
                <div class="inner-title text-center">
                    <h3>Mentorship Sponsorship Program</h3>
                    <ul>
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <i class='bx bx-chevron-right'></i>
                        </li>
                        <li>Pages</li>
                        <li>
                            <i class='bx bx-chevron-right'></i>
                        </li>
                        <li>Mentorship sponsorship programmes</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Inner Banner End -->

        <!-- About Area -->
        <div class="about-area pt-100 pb-70">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-12">
                        <div class="about-content">
                            <div class="section-title pb-3 text-center" style="text-align: justify">
                                <h3>Mentorship sponsorship programmes</h3>
                                <p>
                                    Coming Soon
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        {{-- <div class="about-img">
                            <img src="{{ asset($aboutUs->image) }}" alt="image">
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- About Area End -->

       
      

    


       
     
@endsection