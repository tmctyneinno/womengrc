@extends('layouts.app')
<style>
    .navbar-custom{
        background-color: #2a2a2a !important;
    }
</style>


@section('content')


<!-- Slider Area -->
<div class="slider-area owl-carousel owl-theme">
    <div class="slider-item " style="background-image: url(../assets/img/home-one/slider2.jpg);">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="slider-content">
                        <h1>Empowering Women in GRC  </h1>
                        <p><b>Fostering Leadership and Innovation in Governance, Risk, and Compliance</b></p>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="slider-item" style="background-image: url(../assets/img/home-one/slider1.jpg);">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="slider-content">
                        <h1>Breaking Barriers in Financial Crime Prevention</h1>
                        <p> <b>Shaping a Future of Diversity, Excellence, and Inclusion</b> </p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="slider-item " style="background-image: url(../assets/img/home-one/slider3.jpg);">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="slider-content">
                        <h1>Collaborate. Lead. Inspire. </h1>
                        <p> <b>Building a Global Network for Women in Governance and Compliance</b> </p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="slider-item " style="background-image: url(../assets/img/home-one/slider4.jpg);">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="slider-content">
                        <h1>Join the Movement</h1> 
                        <p><b>Creating Opportunities for Women in GRC and Financial Crime Prevention</b> </p>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Slider Area End -->

<div class="application-area-two pt-100" >
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-7">
                <div class="application-content">
                    <div class="section-title">
                        <h2>
                            About us
                        </h2>
                        <p style="text-align: justify" class="pb-3">
                            <snap style="font-weight: bold">Women in Governance, Risk, Compliance, Financial Crime, and Fraud Prevention </snap>
                            is a pioneering initiative founded by Dr. Foluso Amusa, PhD, dedicated to empowering women professionals in these critical fields. Our mission is to foster leadership, inspire innovation, and create a collaborative platform for women to thrive, lead, and make a lasting impact across industries.
                        </p>
                        <a href="{{ route('about')}}" class="default-btn border-radius ">
                            Read more
                        </a>
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



<!-- Category Area -->
<section class="category-area pt-100 pb-70">
    <div class="container">
        
        
        <div class="row category-bg">
            <div class="col-lg-4 col-sm-6">
                <div class="category-card">
                    <a href="category.html">
                        <i class="flaticon-bake"></i>
                    </a>
                   
                    <a href="category.html">
                        <h3>Restaurant</h3>
                    </a>
                    <p>Lorem ipsum dolor sit amet consecte tempo quaerat voluptatem.</p>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="category-card">
                    <a href="category.html">
                        <i class="flaticon-hotel"></i>
                    </a>
                    <a href="category.html">
                        <h3>Hotel & Resort</h3>
                    </a>
                    <p>Lorem ipsum dolor sit amet consecte tempo quaerat voluptatem.</p>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="category-card">
                    <a href="category.html">
                        <i class="flaticon-barbell"></i>
                    </a>
                    <a href="category.html">
                        <h3>Fitness Club</h3>
                    </a>
                    <p>Lorem ipsum dolor sit amet consecte tempo quaerat voluptatem.</p>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="category-card">
                    <a href="category.html">
                        <i class="flaticon-store"></i>
                    </a>
                    <a href="category.html">
                        <h3>Shops & Stores</h3>
                    </a>
                    <p>Lorem ipsum dolor sit amet consecte tempo quaerat voluptatem.</p>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="category-card">
                    <a href="category.html">
                        <i class="flaticon-event"></i>
                    </a>
                    <a href="category.html">
                        <h3>Events & Programme</h3>
                    </a>
                    <p>Lorem ipsum dolor sit amet consecte tempo quaerat voluptatem.</p>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="category-card">
                    <a href="category.html">
                        <i class="flaticon-flower"></i>
                    </a>
                    <a href="category.html">
                        <h3>Beauty & Spa</h3>
                    </a>
                    <p>Lorem ipsum dolor sit amet consecte tempo quaerat voluptatem.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Category Area End -->

<!-- Place List Area -->
<section class="place-list-area pb-70">
    <div class="container-fluid">
        <div class="section-title text-center">
            <span>Events Lists</span>
            <h2>The Latest Events Added</h2>
            <p>Porem ipsum dolor sit ame consectetur adipisicing eli sed usmod tempor </p>
        </div>
        <div class="place-slider owl-carousel owl-theme pt-45">
            <div class="place-list-item">
                <div class="images">
                    <a href="listing-details.html" class="images-list">
                        <img src="assets/img/place-list/place-list1.jpg" alt="Images">
                    </a>
                    
                    <div class="place-profile">
                        <img src="assets/img/place-list/place-profile.png" alt="Images">
                        <h3>By, Alfred</h3>
                    </div>
                    <div class="place-status bg-dark-orange">
                        <a href="listing-details.html"><h3>Open Now</h3></a>
                    </div>
                    <div class="place-tag">
                        <ul>
                            <li>
                                <a href="https://www.google.com/maps">
                                    <i class="flaticon-place"></i>
                                </a>
                            </li>
                            <li>
                                <a href="shop-details.html">
                                    <i class="flaticon-like"></i>
                                </a>
                            </li>
                            <li>
                                <a href="shop-details.html">
                                    <i class="flaticon-workflow"></i>
                                </a>
                            </li>
                        </ul>
                        <span><a href="shop-details.html">$$$</a></span>
                        <h3 class="title"><a href="listing-details.html">Restaurant</a></h3>
                    </div>
                </div>

                <div class="content">
                    <a href="listing-details.html">
                        <h3>The Billiard Restaurant</h3>
                    </a> 
                    <p>
                        <i class="flaticon-cursor"></i>
                        Dorente rio, 104, 00184 Crono, Canada
                    </p>

                    <ul class="place-rating">
                        <li>
                            <a href="#">4.9</a>
                        </li>
                        <li>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star icon-color'></i>
                            <i class='bx bxs-star icon-color'></i>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="place-list-item">
                <div class="images">
                    <a href="listing-details.html" class="images-list">
                        <img src="assets/img/place-list/place-list2.jpg" alt="Images">
                    </a>
                    
                    <div class="place-profile">
                        <img src="assets/img/place-list/place-profile2.png" alt="Images">
                        <h3>By, Jaein</h3>
                    </div>
                    <div class="place-status bg-dark-orange">
                        <a href="listing-details.html"><h3>Closed Now</h3></a>
                    </div>
                    <div class="place-tag">
                        <ul>
                            <li>
                                <a href="https://www.google.com/maps">
                                    <i class="flaticon-place"></i>
                                </a>
                            </li>
                            <li>
                                <a href="shop-details.html">
                                    <i class="flaticon-like"></i>
                                </a>
                            </li>
                            <li>
                                <a href="shop-details.html">
                                    <i class="flaticon-workflow"></i>
                                </a>
                            </li>
                        </ul>
                        <span><a href="shop-details.html">$$$</a></span>
                        <h3 class="title"> <a href="#">Beauty Shop</a></h3>
                    </div>
                </div>

                <div class="content">
                    <a href="listing-details.html">
                        <h3>The Beauty Shop</h3>
                    </a> 
                    <p>
                        <i class="flaticon-cursor"></i>
                        Davisto Laterani, 104, 00184 Roma, Italy
                    </p>

                    <ul class="place-rating">
                        <li>
                            <a href="#">5.0</a>
                        </li>
                        <li>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="place-list-item">
                <div class="images">
                    <a href="listing-details.html" class="images-list">
                        <img src="assets/img/place-list/place-list3.jpg" alt="Images">
                    </a>
                    
                    <div class="place-profile">
                        <img src="assets/img/place-list/place-profile3.png" alt="Images">
                        <h3>By, Normand</h3>
                    </div>
                    <div class="place-status bg-color-blue">
                        <a href="listing-details.html"><h3>Open Now</h3></a> 
                    </div>
                    <div class="place-tag">
                        <ul>
                            <li>
                                <a href="listing-details.html">
                                    <i class="flaticon-place"></i>
                                </a>
                            </li>
                            <li>
                                <a href="listing-details.html">
                                    <i class="flaticon-like"></i>
                                </a>
                            </li>
                            <li>
                                <a href="shop-details.html">
                                    <i class="flaticon-workflow"></i>
                                </a>
                            </li>
                        </ul>
                        <span><a href="shop-details.html">$$$</a></span>
                        <h3 class="title"><a href="#">Fitness Club</a></h3>
                    </div>
                </div>

                <div class="content">
                    <a href="listing-details.html">
                        <h3>Ridge Fitness Club</h3>
                    </a> 
                    <p>
                        <i class="flaticon-cursor"></i>
                        Ke visto Onterio, 104, 6789 Rcona, usa
                    </p>

                    <ul class="place-rating">
                        <li>
                            <a href="#">4.5</a>
                        </li>
                        <li>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star icon-color'></i>
                            <i class='bx bxs-star icon-color'></i>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="place-list-item">
                <div class="images">
                    <a href="listing-details.html" class="images-list">
                        <img src="assets/img/place-list/place-list4.jpg" alt="Images">
                    </a>
                    
                    <div class="place-profile">
                        <img src="assets/img/place-list/place-profile4.png" alt="Images">
                        <h3>By, Olfred</h3>
                    </div>
                    <div class="place-status bg-color-blue">
                        <a href="listing-details.html"><h3>Open Now</h3></a>
                    </div>
                    <div class="place-tag">
                        <ul>
                            <li>
                                <a href="https://www.google.com/maps">
                                    <i class="flaticon-place"></i>
                                </a>
                            </li>
                            <li>
                                <a href="shop-details.html">
                                    <i class="flaticon-like"></i>
                                </a>
                            </li>
                            <li>
                                <a href="shop-details.html">
                                    <i class="flaticon-workflow"></i>
                                </a>
                            </li>
                        </ul>
                        <span><a href="shop-details.html">$$$</a></span>
                        <h3 class="title"><a href="#">Hotel</a></h3>
                    </div>
                </div>

                <div class="content">
                    <a href="listing-details.html">
                        <h3>The Hotel</h3>
                    </a> 
                    <p>
                        <i class="flaticon-cursor"></i>
                        Ostapin, 134, 00184 Coventry, London 
                    </p>

                    <ul class="place-rating">
                        <li>
                            <a href="#">4.7</a>
                        </li>
                        <li>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star icon-color'></i>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="place-list-item">
                <div class="images">
                    <a href="listing-details.html" class="images-list">
                        <img src="assets/img/place-list/place-list1.jpg" alt="Images">
                    </a>
                    
                    <div class="place-profile">
                        <img src="assets/img/place-list/place-profile.png" alt="Images">
                        <h3>By, Alfred</h3>
                    </div>
                    <div class="place-status bg-dark-orange">
                        <a href="listing-details.html"><h3>Open Now</h3></a>
                    </div>
                    <div class="place-tag">
                        <ul>
                            <li>
                                <a href="https://www.google.com/maps">
                                    <i class="flaticon-place"></i>
                                </a>
                            </li>
                            <li>
                                <a href="shop-details.html">
                                    <i class="flaticon-like"></i>
                                </a>
                            </li>
                            <li>
                                <a href="shop-details.html">
                                    <i class="flaticon-workflow"></i>
                                </a>
                            </li>
                        </ul>
                        <span><a href="shop-details.html">$$$</a></span>
                        <h3 class="title"><a href="listing-details.html">Restaurant</a></h3>
                    </div>
                </div>

                <div class="content">
                    <a href="listing-details.html">
                        <h3>The Billiard Restaurant</h3>
                    </a> 
                    <p>
                        <i class="flaticon-cursor"></i>
                        Dorente rio, 104, 00184 Crono, Canada
                    </p>

                    <ul class="place-rating">
                        <li>
                            <a href="#">4.9</a>
                        </li>
                        <li>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star icon-color'></i>
                            <i class='bx bxs-star icon-color'></i>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Place List Area End -->




<!-- Video Area -->
<div class="video-area video-area-bg">
    <div class="container">
        <div class="video-content">
            <h2>Are You  Ready To Start Your Journey?</h2>
            <a href="{{ route('register') }}" class="default-btn border-radius">
                Sign up
                <i class='bx bx-plus'></i>
            </a>
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
                        <span>Women Empowered Globally</span>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-3">
                    <div class="single-counter">
                        <h3>23165</h3>
                        <span>Resources Accessed by Members</span>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-3">
                    <div class="single-counter">
                        <h3>4563</h3>
                        <span>Awards Celebrating Excellence</span>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-3">
                    <div class="single-counter">
                        <h3>880</h3>
                        <span>Successful Mentorship Connections</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Counter Area End -->

<!-- Place Area -->
<div class="place-area pt-100 pb-70">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-7 col-md-6">
                <div class="section-title mb-45">
                    <span>Desire Places</span>
                    <h2>Most Popular Places</h2>
                </div>
            </div>
            <div class="col-lg-5 col-md-6">
                <div class="place-btn">
                    <a href="listing.html" class="default-btn border-radius">
                        Check out all places
                        <i class='bx bx-plus'></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="place-card">
                    <a href="listing-details.html" class="place-images">
                        <img src="assets/img/place-area/place-area1.jpg" alt="Images">
                    </a>
                    <div class="rating">
                        <ul>
                            <li>
                                <a href="#">4.9</a>
                            </li>
                            <li>
                                <span>23 Review</span>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star i-color'></i>
                                <i class='bx bxs-star i-color'></i>
                            </li>
                        </ul>
                    </div>
                    <div class="status-tag bg-dark-orange">
                        <a href="listing-details.html"><h3>Closed Now</h3></a>
                    </div>
                    <div class="content">
                        <div class="content-profile">
                            <img src="assets/img/place-area/place-area-profile.png" alt="Images">
                            <h3>By, Lowis Jelda</h3>
                        </div>
                        <span>
                            <i class="flaticon-cursor"></i>
                            Dongo 184 Crono, Canada
                        </span>
                        <a href="listing-details.html"><h3>Denisto Centin Restaurant </h3></a>
                        <p>Lorem ipsum dolor sit amet, consectetur  quam quaerat voluptatem.</p>
                        <div class="content-tag">
                            <ul>
                                <li>
                                    <a href="https://www.google.com/maps">
                                        <i class="flaticon-place"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="shop-details.html">
                                        <i class="flaticon-like"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="shop.html">
                                        <i class="flaticon-workflow"></i>
                                    </a>
                                </li>
                            </ul>
                            <h3 class="price"> <a href="#">$560-890</a></h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="place-card">
                    <a href="listing-details.html" class="place-images">
                        <img src="assets/img/place-area/place-area2.jpg" alt="Images">
                    </a>
                    <div class="rating">
                        <ul>
                            <li>
                                <a href="#">5.0</a>
                            </li>
                            <li>
                                <span>30 Review</span>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                            </li>
                        </ul>
                    </div>
                    <div class="status-tag bg-color-blue">
                        <a href="listing-details.html"><h3>Open Now</h3></a>
                    </div>
                    <div class="content">
                        <div class="content-profile">
                            <img src="assets/img/place-area/place-area-profile2.png" alt="Images">
                            <h3>By, Austin Deli</h3>
                        </div>
                        <span>
                            <i class="flaticon-cursor"></i>
                            40 Square Plaza, NJ, USA
                        </span>
                        <a href="listing-details.html"><h3>Iconic Cafe in Ontario</h3></a>
                        <p>Lorem ipsum dolor sit amet, consectetur  quam quaerat voluptatem.</p>
                        <div class="content-tag">
                            <ul>
                                <li>
                                    <a href="https://www.google.com/maps">
                                        <i class="flaticon-place"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="shop-details.html">
                                        <i class="flaticon-like"></i>
                                    </a>
                                </li>
                                <li>
                                  <a href="shop.html">
                                        <i class="flaticon-workflow"></i>
                                    </a>
                                </li>
                            </ul>
                            <h3 class="price"><a href="#">$500-700</a></h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="place-card">
                    <a href="listing-details.html" class="place-images">
                        <img src="assets/img/place-area/place-area3.jpg" alt="Images">
                    </a>
                    <div class="rating">
                        <ul>
                            <li>
                                <a href="#">4.9</a>
                            </li>
                            <li>
                                <span>23 Review</span>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star i-color'></i>
                                <i class='bx bxs-star i-color'></i>
                            </li>
                        </ul>
                    </div>
                    <div class="status-tag bg-color-heliotrope">
                        <a href="listing-details.html"><h3>Open Now</h3></a>
                    </div>
                    <div class="content">
                        <div class="content-profile">
                            <img src="assets/img/place-area/place-area-profile3.png" alt="Images">
                            <h3>By, Polin Osto</h3>
                        </div>
                        <span>
                            <i class="flaticon-cursor"></i>
                            34-42 Montgomery St , NY, USA
                        </span>
                        <a href="listing-details.html"><h3>Strong body Gym</h3></a>
                        <p>Lorem ipsum dolor sit amet, consectetur  quam quaerat voluptatem.</p>
                        <div class="content-tag">
                            <ul>
                                <li>
                                    <a href="https://www.google.com/maps">
                                        <i class="flaticon-place"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="shop-details.html">
                                        <i class="flaticon-like"></i>
                                    </a>
                                </li>
                                <li>
                                  <a href="shop.html">
                                        <i class="flaticon-workflow"></i>
                                    </a>
                                </li>
                            </ul>
                            <h3 class="price"><a href="listing-details.html">$400-800</a></h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="place-card">
                    <a href="listing-details.html" class="place-images">
                        <img src="assets/img/place-area/place-area4.jpg" alt="Images">
                    </a>
                    <div class="rating">
                        <ul>
                            <li>
                                <a href="#">4.8</a>
                            </li>
                            <li>
                                <span>16 Review</span>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star i-color'></i>
                                <i class='bx bxs-star i-color'></i>
                                <i class='bx bxs-star i-color'></i>
                            </li>
                        </ul>
                    </div>
                    <div class="status-tag bg-dark-orange">
                        <a href="listing-details.html"><h3>Closed Now</h3></a> 
                    </div>
                    <div class="content">
                        <div class="content-profile">
                            <img src="assets/img/place-area/place-area-profile4.png" alt="Images">
                            <h3>By, Debit Jhon</h3>
                        </div>
                        <span>
                            <i class="flaticon-cursor"></i>
                            27th Brooklyn New York, USA
                        </span>
                        <a href="listing-details.html"><h3>Family Convenience Store</h3></a> 
                        <p>Lorem ipsum dolor sit amet, consectetur  quam quaerat voluptatem.</p>
                        <div class="content-tag">
                            <ul>
                                <li>
                                    <a href="https://www.google.com/maps">
                                        <i class="flaticon-place"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="shop-details.html">
                                        <i class="flaticon-like"></i>
                                    </a>
                                </li>
                                <li>
                                  <a href="shop.html">
                                        <i class="flaticon-workflow"></i>
                                    </a>
                                </li>
                            </ul>
                            <h3 class="price"><a href="#">$560-890</a></h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="place-card">
                    <a href="listing-details.html" class="place-images">
                        <img src="assets/img/place-area/place-area5.jpg" alt="Images">
                    </a>
                    <div class="rating">
                        <ul>
                            <li>
                                <a href="#">5.0</a>
                            </li>
                            <li>
                                <span>16 Review</span>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                            </li>
                        </ul>
                    </div>
                    <div class="status-tag bg-color-blue">
                        <a href="listing-details.html"><h3>Closed Now</h3></a>
                    </div>
                    <div class="content">
                        <div class="content-profile">
                            <img src="assets/img/place-area/place-area-profile5.png" alt="Images">
                            <h3>By, Kelvin Sasi</h3>
                        </div>
                        <span>
                            <i class="flaticon-cursor"></i>
                            56 Street Square Plaza, NJ, USA
                        </span>
                        <a href="listing-details.html"><h3>Iconic Cafe in Onterio</h3></a>
                        <p>Lorem ipsum dolor sit amet, consectetur  quam quaerat voluptatem.</p>
                        <div class="content-tag">
                            <ul>
                                <li>
                                    <a href="https://www.google.com/maps">
                                        <i class="flaticon-place"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="shop-details.html">
                                        <i class="flaticon-like"></i>
                                    </a>
                                </li>
                                <li>
                                  <a href="shop.html">
                                        <i class="flaticon-workflow"></i>
                                    </a>
                                </li>
                            </ul>
                            <h3 class="price"><a href="#">$300-600</a></h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="place-card">
                    <a href="listing-details.html" class="place-images">
                        <img src="assets/img/place-area/place-area6.jpg" alt="Images">
                    </a>
                    <div class="rating">
                        <ul>
                            <li>
                                <a href="#">5.0</a>
                            </li>
                            <li>
                                <span>39 Review</span>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                            </li>
                        </ul>
                    </div>
                    <div class="status-tag bg-color-green">
                        <a href="listing-details.html"><h3>Open Now</h3></a>
                    </div>
                    <div class="content">
                        <div class="content-profile">
                            <img src="assets/img/place-area/place-area-profile6.png" alt="Images">
                            <h3>By, Creiun Hitler</h3>
                        </div>
                        <span>
                            <i class="flaticon-cursor"></i>
                            34-42 Montgomery St , NY, USA
                        </span>
                        <a href="listing-details.html"><h3>Kentorin Hotel</h3></a>
                        <p>Lorem ipsum dolor sit amet, consectetur  quam quaerat voluptatem.</p>
                        <div class="content-tag">
                            <ul>
                                <li>
                                    <a href="https://www.google.com/maps">
                                        <i class="flaticon-place"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="shop-details.html">
                                        <i class="flaticon-like"></i>
                                    </a>
                                </li>
                                <li>
                                  <a href="shop.html">
                                        <i class="flaticon-workflow"></i>
                                    </a>
                                </li>
                            </ul>
                            <h3 class="price"><a href="#">$400-800</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Place Area End -->


<!-- Testimonial Area -->
<section class="testimonial-area pb-70">
    <div class="container-fluid">
        <div class="section-title text-center">
            <span>Testimonials</span>
            <h2>What Our Clients Say</h2>
        </div>

        <div class="testimonial-slider owl-carousel owl-theme">
            <div class="testimonial-item testimonial-item-bg">
                <h3>Sanaik Tubi</h3>
                <span>Arbon Restaurant</span>
                <p>Roinin ipsum dolor sit amet, consectetur adipisicing  sit ut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                <ul class="rating">
                    <li>
                        <i class='bx bxs-star'></i>
                    </li>
                    <li>
                        <i class='bx bxs-star'></i>
                    </li>
                    <li>
                        <i class='bx bxs-star'></i>
                    </li>
                    <li>
                        <i class='bx bxs-star'></i>
                    </li>
                    <li>
                        <i class='bx bxs-star'></i>
                    </li>
                </ul>

                <div class="testimonial-top">
                    <i class='bx bxs-quote-left'></i>
                </div>
            </div>

            <div class="testimonial-item testimonial-item-bg">
                <h3>Oli Rubion</h3>
                <span>Rubion Inc</span>
                <p>Roinin ipsum dolor sit amet, consectetur adipisicing  sit ut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                <ul class="rating">
                    <li>
                        <i class='bx bxs-star'></i>
                    </li>
                    <li>
                        <i class='bx bxs-star'></i>
                    </li>
                    <li>
                        <i class='bx bxs-star'></i>
                    </li>
                    <li>
                        <i class='bx bxs-star'></i>
                    </li>
                    <li>
                        <i class='bx bxs-star'></i>
                    </li>
                </ul>

                <div class="testimonial-top">
                    <i class='bx bxs-quote-left'></i>
                </div>
            </div>

            <div class="testimonial-item testimonial-item-bg">
                <h3>Mashrof Ruin</h3>
                <span>Pice Cafe<span>
                <p>Roinin ipsum dolor sit amet, consectetur adipisicing  sit ut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                <ul class="rating">
                    <li>
                        <i class='bx bxs-star'></i>
                    </li>
                    <li>
                        <i class='bx bxs-star'></i>
                    </li>
                    <li>
                        <i class='bx bxs-star'></i>
                    </li>
                    <li>
                        <i class='bx bxs-star'></i>
                    </li>
                    <li>
                        <i class='bx bxs-star'></i>
                    </li>
                </ul>

                <div class="testimonial-top">
                    <i class='bx bxs-quote-left'></i>
                </div>
            </div>

            <div class="testimonial-item testimonial-item-bg">
                <h3>Sanaik Tubi</h3>
                <span>Arbon Restaurant</span>
                <p>Roinin ipsum dolor sit amet, consectetur adipisicing  sit ut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                <ul class="rating">
                    <li>
                        <i class='bx bxs-star'></i>
                    </li>
                    <li>
                        <i class='bx bxs-star'></i>
                    </li>
                    <li>
                        <i class='bx bxs-star'></i>
                    </li>
                    <li>
                        <i class='bx bxs-star'></i>
                    </li>
                    <li>
                        <i class='bx bxs-star'></i>
                    </li>
                </ul>

                <div class="testimonial-top">
                    <i class='bx bxs-quote-left'></i>
                </div>
            </div>

            <div class="testimonial-item testimonial-item-bg">
                <h3>Sanaik Tubi</h3>
                <span>Arbon Restaurant</span>
                <p>Roinin ipsum dolor sit amet, consectetur adipisicing  sit ut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                <ul class="rating">
                    <li>
                        <i class='bx bxs-star'></i>
                    </li>
                    <li>
                        <i class='bx bxs-star'></i>
                    </li>
                    <li>
                        <i class='bx bxs-star'></i>
                    </li>
                    <li>
                        <i class='bx bxs-star'></i>
                    </li>
                    <li>
                        <i class='bx bxs-star'></i>
                    </li>
                </ul>

                <div class="testimonial-top">
                    <i class='bx bxs-quote-left'></i>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonial Area End -->


    
@endsection