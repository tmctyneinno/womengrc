@extends('layouts.app')



@section('content')

 <!-- Inner Banner -->
 <div class="inner-banner inner-bg5">
    <div class="container">
        <div class="inner-banner-title text-center">
            <h3>Blog</h3>
            <p>Empowering Women, Transforming Leadership, Driving Innovation</p>
        </div>
        
        <div class="banner-list">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-7">
                    <ul class="list">
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
                        <li class="active">Blog</li>
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

<!-- Blog Area -->
<div class="blog-area pt-100 pb-70">
   <div class="container">
        <div class="section-title text-center">
            <span>Blog</span>
            <h2>Latest Blog <b>Post</b></h2>
        </div>
       <div class="row pt-45">
           <div class="col-lg-4 col-md-6">
               <div class="blog-card">
                   <a href="blog-details.html">
                       <img src="assets/img/blog/blog1.jpg" alt="Images">
                   </a>
                   <div class="content">
                        <span>April 19, 2024 / <a href="#">Restaurant</a></span>
                        <h3>
                            <a href="blog-details.html">Denisto Centin Restaurant, Canada</a>
                        </h3>  
                        <a href="#" class="read-more">Read More</a>
                    </div>
               </div>
           </div>

           <div class="col-lg-4 col-md-6">
                <div class="blog-card">
                    <a href="blog-details.html">
                        <img src="assets/img/blog/blog2.jpg" alt="Images">
                    </a>
                    <div class="content">
                        <span>June 29, 2024 / <a href="#">PLATFORM</a></span>
                        <h3>
                            <a href="blog-details.html">Top 10 Business Location in Usa</a>
                        </h3>  
                        <a href="#" class="read-more">Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="blog-card">
                    <a href="blog-details.html">
                        <img src="assets/img/blog/blog3.jpg" alt="Images">
                    </a>
                    <div class="content">
                        <span>July 15, 2024 / <a href="#">ADVICE</a></span>
                        <h3>
                            <a href="blog-details.html">Top 10 Visiting Place in Turkey</a>
                        </h3>  
                        <a href="#" class="read-more">Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="blog-card">
                    <a href="blog-details.html">
                        <img src="assets/img/blog/blog4.jpg" alt="Images">
                    </a>
                    <div class="content">
                        <span>May 14, 2024 / <a href="#">CLUB</a></span>
                        <h3>
                            <a href="blog-details.html">Top 10 Fitness Club in Canada</a>
                        </h3>  
                        <a href="#" class="read-more">Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="blog-card">
                    <a href="blog-details.html">
                        <img src="assets/img/blog/blog5.jpg" alt="Images">
                    </a>
                    <div class="content">
                        <span>March 14, 2024 / <a href="#">SHOPS</a></span>
                        <h3>
                            <a href="blog-details.html">The Best Coffee Shops In London</a>
                        </h3>  
                        <a href="#" class="read-more">Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="blog-card">
                    <a href="blog-details.html">
                        <img src="assets/img/blog/blog6.jpg" alt="Images">
                    </a>
                    <div class="content">
                        <span>January 22, 2024 / <a href="#">ADVICE</a></span>
                        <h3>
                            <a href="blog-details.html">Top 10 Visiting Place in England</a>
                        </h3>  
                        <a href="#" class="read-more">Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12">
                <div class="pagination-area text-center">
                    <a href="#" class="prev page-numbers">
                        <i class="bx bx-chevron-left"></i>
                    </a> 
                    
                    <span class="page-numbers current" aria-current="page">1</span>
                    <a href="#" class="page-numbers">2</a>
                    <a href="#" class="page-numbers">3</a>
                    <a href="#" class="page-numbers">4</a>
                    
                    <a href="#" class="next page-numbers">
                        <i class="bx bx-chevron-right"></i>
                    </a>
                </div>
            </div>
       </div>
   </div>
</div>
<!-- Blog Area End -->
    
@endsection