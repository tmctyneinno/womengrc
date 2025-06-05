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
                                <p>Detailed information about us will be available soon. Please check back later.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-img">
                            <img src="{{ $aboutUs->image }}" alt="'Image related to About Us section">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About Area End -->

         <!-- Application Area -->
         <div class="application-area-two" style="padding-top: 20px">
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
                                    <br><br>
                                    <b>Dr. Foluso Amusa</b> is a distinguished leader, seasoned entrepreneur, and globally recognized expert in Governance, Risk Management, Compliance (GRC), 
                                    and Financial Crime Prevention. With over two decades of professional experience, he has played a pivotal role in shaping regulatory excellence, corporate governance frameworks, and financial crime prevention strategies across key industries, including banking, insurance, fintech, healthcare, aviation, and oil & gas.
                                    <br><br>
                                    As the Founder of WGRCFP, <b>Dr. Amusa</b> is committed to fostering gender diversity and empowering women professionals in the GRC and financial crime prevention sectors. Through mentorship, thought leadership, and strategic networking, he has built a platform that supports professional development and inclusivity in these critical fields.
                                    <br><br>
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
            @php
                // Cache translations for 24 hours
        
                $chooseItems = [
                    [
                        'icon' => 'flaticon-phone-call',
                        'title_key' => 'empower_leaders_title',
                        'title_default' => 'Empower Leaders',
                        'text_key' => 'empower_leaders_text',
                        'text_default' => 'We provide mentorship, training, and resources to equip women with the skills and confidence to lead in their organizations.',
                    ],
                    [
                        'icon' => 'flaticon-web-page',
                        'title_key' => 'foster_collaboration_title',
                        'title_default' => 'Foster Collaboration',
                        'text_key' => 'foster_collaboration_text',
                        'text_default' => 'Through events, networking opportunities, and partnerships, we connect professionals to exchange insights, share best practices, and solve real-world challenges.',
                    ],
                    [
                        'icon' => 'flaticon-support',
                        'title_key' => 'drive_innovation_title',
                        'title_default' => 'Drive Innovation',
                        'text_key' => 'drive_innovation_text',
                        'text_default' => 'We stay at the forefront of industry trends, offering tools and knowledge to navigate the rapidly evolving GRC and financial crime landscape.',
                    ],
                    [
                        'icon' => 'flaticon-support',
                        'title_key' => 'promote_integrity_title',
                        'title_default' => 'Promote Integrity',
                        'text_key' => 'promote_integrity_text',
                        'text_default' => 'Upholding the highest ethical standards, we champion practices that build trust and drive sustainable change across industries.',
                    ],
                    [
                        'icon' => 'flaticon-support',
                        'title_key' => 'advocate_for_equity_title',
                        'title_default' => 'Advocate for Equity',
                        'text_key' => 'advocate_for_equity_text',
                        'text_default' => 'We work to break down barriers and ensure that women have equal opportunities to excel in their careers.', // Corrected and completed sentence
                    ]
                ];

                foreach ($chooseItems as &$item) { // Use reference to modify array directly
                    $item['title_translated'] = $item['title_default'];
                    $item['text_translated'] = $item['text_default'];
                }
                unset($item); // Unset reference to last item
            @endphp
            <div class="container">
                <div class="section-title text-center">
                    <span>Explore Insights</span>
                    <h2>What We Do</h2>
                </div>
                <div class="choose-width pt-100 pb-70">
                    <div class="row justify-content-center">
                        @foreach ($chooseItems as $item)
                            <div class="col-lg-4 col-md-6">
                                <div class="choose-card">
                                    <i class="{{ $item['icon'] }}"></i>
                                    <h3>{{ $item['title_translated'] }}</h3>
                                    <p>{{ $item['text_translated'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Choose Area End -->

        <!-- Video Area -->
        
        <div class="video-area video-area-bg">
            <div class="container">
                <div class="video-content">
                    <h2>Join us as we create a future where women are at the forefront of shaping secure, ethical, and resilient organizations and societies worldwide.</h2>
                     
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