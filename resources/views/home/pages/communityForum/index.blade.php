@extends('layouts.app')



@section('content')
 
 <!-- Inner Banner -->
 <div class="inner-banner" style="background-image: url({{ asset('assets/images/event/event_bg.jpg') }});">
    <div class="container">
        <div class="inner-banner-title text-center">
            <h3>Community Forum</h3>
            <p>Empowering Women, Transforming Leadership, Driving Innovation</p>
        </div>
        
        <div class="banner-list">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-7">
                    <ul class="list">
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
                        <li class="active">Community Forum</li>
                    </ul>
                </div>
 
                <div class="col-lg-6 col-md-5">
                    <ul class="social-link">
                        <li>
                            <a href="https://www.facebook.com/login/" target="_blank"><i class='bx bxl-facebook'></i></a>
                        </li> 
                        <li>
                            <a href="https://twitter.com/i/flow/login" target="_blank"><i class='bx bxl-twitter'></i></a>
                        </li> 
                        <li>
                            <a href="https://www.instagram.com/accounts/login/" target="_blank"><i class='bx bxl-instagram'></i></a>
                        </li> 
                        <li>
                            <a href="https://www.pinterest.com/" target="_blank"><i class='bx bxl-pinterest-alt'></i></a>
                        </li> 
                        <li>
                            <a href="https://www.youtube.com/" target="_blank"><i class='bx bxl-youtube'></i></a>
                        </li> 
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Inner Banner End -->


<!-- Blog Area End -->
 <div class="blog-area pt-100 pb-70">
    @include('home.pages.social-media')

 </div>
@endsection