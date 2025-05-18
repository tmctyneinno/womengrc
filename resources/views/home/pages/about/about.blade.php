@extends('layouts.app')



@section('content')

 
        <!-- Inner Banner -->
        <div class="inner-banner"  style="background-image: url({{ asset($aboutUs->header_image) }});">
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

         <!-- Application Area -->
         <div class="application-area-two">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-7">
                        <div class="application-content">
                            <div class="section-title">
                                <span> Founder / President - WGRCFP</span>
                                {{-- <h2>
                                    Founder / President - WGRCFP
                                </h2> --}}
                                <p class="mb-2" style="text-align: justify">
                                    Founder, Women in Governance, Risk, Compliance & Financial Crime Prevention (WGRCFP)

                                    <b>Dr. Foluso Amusa</b> is a distinguished leader, seasoned entrepreneur, and globally recognized expert in Governance, Risk Management, Compliance (GRC), 
                                    and Financial Crime Prevention. With over two decades of professional experience, he has played a pivotal role in shaping regulatory excellence, corporate governance frameworks, and financial crime prevention strategies across key industries, including banking, insurance, fintech, healthcare, aviation, and oil & gas.

                                    As the Founder of WGRCFP, <b>Dr. Amusa</b> is committed to fostering gender diversity and empowering women professionals in the GRC and financial crime prevention sectors. Through mentorship, thought leadership, and strategic networking, he has built a platform that supports professional development and inclusivity in these critical fields.

                                    Dr. Amusa is also the visionary behind THE MORGANS Consortium (established in 2014), a leading firm specializing in risk, compliance, and financial crime advisory services. His strategic initiatives include:
                                </p>
                                  
                                    <p>•⁠  ⁠The GRC & Financial Crime Prevention Awards & Summit – Africa & Europe</p>
                                    <p>•⁠  ⁠Women in GRC & Financial Crime Prevention (WGRCFP), a platform advocating for gender diversity and leadership.</p>
                                    <p>•⁠  ⁠The Institute of Financial Crime and Fraud Prevention of Nigeria (IFPN), a premier institution dedicated to advancing compliance, financial crime prevention, and professional education in Nigeria.</p>
                                    <p>•⁠  ⁠GRC and Financial Crime Today Magazine, a leading publication providing insights into global regulatory and compliance trends.</p>
                                    <p>•⁠  ⁠GRC and Financial Crime Today TV , a digital platform...</p>
                              
                                <p class="mt-4">
                                    A sought-after speaker, thought leader, and consultant, Dr. Amusa continues to shape regulatory policies, corporate best practices, and financial crime prevention strategies globally. His mission is to elevate industry standards, drive innovation, and support the professional growth of practitioners in the GRC & Financial Crime Preventionecosystem.
                                </p>
                                <p>
                                    For more about his work and contributions, visit WGRCFP Website.
                                </p>
                                <br>
                                
                            </div>
                            <div class="application-btn">
                            
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="application-img-two">
                            <img src="{{ asset('assets/img/MD_img.png')}}" alt="Images">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Application Area End -->
        <br>
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
        @include('home.pages.counter')
        <!-- Counter Area End -->

      

    
    
<!-- Testimonial Area -->
@include('home.pages.testimonial')
<!-- Testimonial Area End -->


       
     
@endsection