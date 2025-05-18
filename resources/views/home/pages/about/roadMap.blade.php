@extends('layouts.app')



@section('content')

 
        <!-- Inner Banner -->
        <div class="inner-banner"  style="background-image: url({{ asset($aboutUs->header_image) }});">
            <div class="container">
                <div class="inner-title text-center">
                    <h3>Road Map</h3>
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
                        <li>Road Map</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Inner Banner End -->

        <!-- About Area -->
        <div class="about-area pt-45 pb-70">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6">
                        <div class="about-content">
                            <div class="section-title pb-3" style="text-align: justify">
                                <h2>WGRCFP ROADMAP</h2>
                                <p>
                                   This roadmap provides a structured approach to
                                    building and sustaining Women in Governance,
                                    Risk, Compliance, and Financial Crime Prevention
                                    (WGRCFP) as a leading force in empowering
                                    women professionals in these critical sectors.
                                </p>
                            </div>
                            
                           
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="about-img">
                            <img src="{{ asset('../assets/images/roadMap.png') }}" style="height: 250px; border-radius:10px" alt="image">
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
                        <div class="p-3">
                            <img style="border-radius: 10px" src="{{ asset('assets/images/target.png')}}" alt="Images">
                        </div>
                    </div>

                     <div class="col-lg-5">
                        <div class="application-content">
                            <div class="section-title">
                                <h3>
                                   VISION & MISSION
                                </h3>
                                <p class="mb-2" style="text-align: justify">
                                    <p>•⁠  Empower women professionals in GRC and Financial Crime Prevention fields.</p>
                                    <p>•⁠  Promote gender diversity and leadership within governance, risk, and compliance.</p>
                                    <p>•⁠  Foster knowledge sharing, mentorship, and professional growth.</p>
                                </p>
                                <br/>
                                <h3>
                                  STRATEGIC GOALS
                                </h3>
                                <p class="mb-2" style="text-align: justify">
                                    <p>•⁠  Increase female representation in GRC and financial crime prevention.</p>
                                    <p>•⁠  Provide training, certifications, and leadership development.</p>
                                    <p>•⁠  Establish mentorship and networking opportunities.</p>
                                    <p>•⁠  Influence policy and industry best practices.</p>
                                </p>
                            </div>
                           
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Application Area End -->

        <br>
        <!-- Roadmap Area  -->
        <div class="choose-area">
            <div class="container">
                <div class="section-title text-center">
                    <h2>Roadmap Timeline</h2>
                </div>
                <div class="choose-width mt-80 pb-70">
                    <br/>
                    <div class="row ">
                        <div class="col-lg-6 col-md-6">
                            <div class="application-content">
                                <div class="section-title">
                                    {{-- <div class="choose-card text-left">
                                        <i class="flaticon-web-page"></i>
                                    </div> --}}
                                    <h3>
                                   Phase 1: Foundation (0-6 months)
                                    </h3>
                                    <p class="mb-2" style="text-align: justify">
                                        <p>•⁠  Establish WGRCFP as a recognized entity.</p>
                                        <p>•⁠  Develop a comprehensive membership program.</p>
                                        <p>•⁠  Launch initial training and certification programs.</p>
                                    </p>
                                </div>
                            </div>
                        </div>

                       <div class="col-lg-6 col-md-6">
                            <div class="application-content">
                                <div class="section-title">
                                    {{-- <div class="choose-card text-left">
                                        <i class="flaticon-web-page"></i>
                                    </div> --}}
                                    <h3>
                                      Phase 3: Expansion & Impact (1-3 years)
                                    </h3>
                                    <p class="mb-2" style="text-align: justify">
                                        <p>•⁠  Scale up membership and engagement activities.</p>
                                        <p>•⁠  Advocate for policy changes promoting gender inclusion</p>
                                        <p>•⁠  Establish scholarship and funding opportunities for women in GRCFP</p>
                                        <p>•⁠  Expand global outreach and regional chapters</p>
                                    </p>
                                </div>
                            </div>
                        </div>

                          <div class="col-lg-6 col-md-6">
                            <div class="application-content">
                                <div class="section-title">
                                    {{-- <div class="choose-card text-left">
                                        <i class="flaticon-web-page"></i>
                                    </div> --}}
                                    <h3>
                                      Phase 2: Growth & Engagement (6-12 months)
                                    </h3>
                                    <p class="mb-2" style="text-align: justify">
                                        <p>•⁠  Host inaugural WGRCFP Summit and networking events.</p>
                                        <p>•⁠  Introduce mentorship and sponsorship programs.</p>
                                        <p>•⁠  Develop and launch online learning platform.</p>
                                        <p>•⁠  Partner with industry leaders and regulatory bodies.</p>
                                    </p>
                                </div>
                            </div>
                        </div>

                          <div class="col-lg-6 col-md-6">
                            <div class="application-content">
                                <div class="section-title">
                                    {{-- <div class="choose-card text-left">
                                        <i class="flaticon-web-page"></i>
                                    </div> --}}
                                    <h3>
                                        Phase 4: Sustainability & Innovation (3-5 years)
                                    </h3>
                                    <p class="mb-2" style="text-align: justify">
                                        <p>•⁠  Develop thought leadership initiatives and research publications.</p>
                                        <p>•⁠  Create a WGRCFP Certification Program.</p>
                                        <p>•⁠  Strengthen partnerships with corporate and government entities.</p>
                                        <p>•⁠  Implement technology-driven solutions for community engagement.</p>
                                    </p>
                                </div>
                            </div>
                        </div>

                        

                    </div>
                </div>
            </div>
        </div>
        <!-- Roadmap Area End -->
        <br/>
        <!-- Video Area -->
         <div class="section-title text-center">
            <h2>Key Initiatives</h2>
        </div>
        <div class="video-area " style=" ">
            <img src=" {{ asset('../assets/images/intialtive.png') }}" />
           
        </div>
        <!-- Video Area End -->

        <!-- Roadmap Area  -->
        <div class="choose-area">
            <div class="container">
               
                <div class="choose-width mt-80 pb-70">
                    <br/>
                    <div class="row ">
                        <div class="col-lg-6 col-md-6">
                            <div class="application-content">
                                <div class="section-title">
                                    {{-- <div class="choose-card text-left">
                                        <i class="flaticon-web-page"></i>
                                    </div> --}}
                                    <h3>
                                   Performance Metrics
                                    </h3>
                                    <p class="mb-2" style="text-align: justify">
                                        <p>•⁠  Growth in membership and active engagement.</p>
                                        <p>•⁠  Number of training and certification completions.</p>
                                        <p>•⁠  Impact of mentorship and sponsorship programs.</p>
                                        <p>•⁠  Policy changes and industry influence.</p>
                                        <p>•⁠  Diversity and inclusion benchmarks in partner organizations.</p>
                                    </p>
                                </div>
                            </div>
                        </div>

                       <div class="col-lg-6 col-md-6">
                            <div class="application-content">
                                <div class="section-title">
                                    {{-- <div class="choose-card text-left">
                                        <i class="flaticon-web-page"></i>
                                    </div> --}}
                                    <h3>
                                      Partnerships & Collaborations
                                    </h3>
                                    <p class="mb-2" style="text-align: justify">
                                        <p>•⁠  Engage with corporate organizations, regulatory bodies, and academic institutions.</p>
                                        <p>•⁠  Foster collaborations with global GRC and financial crime prevention forums.</p>
                                        <p>•⁠  Build strategic alliances with women empowerment groups and initiatives.</p>
                                    </p>
                                </div>
                            </div>
                        </div>

                          <div class="col-lg-6 col-md-6">
                            <div class="application-content">
                                <div class="section-title">
                                    {{-- <div class="choose-card text-left">
                                        <i class="flaticon-web-page"></i>
                                    </div> --}}
                                    <h3>
                                      Communication & Outreach
                                    </h3>
                                    <p class="mb-2" style="text-align: justify">
                                        <p>•⁠  Utilize digital platforms for awareness and engagement.</p>
                                        <p>•⁠  Develop a WGRCFP newsletter and online community forums.</p>
                                        <p>•⁠  Leverage social media and webinars to educate and connect members. </p>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="application-content">
                                <div class="section-title">
                                    {{-- <div class="choose-card text-left">
                                        <i class="flaticon-web-page"></i>
                                    </div> --}}
                                    <h3>
                                        Sustainability Plan
                                    </h3>
                                    <p class="mb-2" style="text-align: justify">
                                        <p>•⁠  Secure funding through memberships, sponsorships, and grants.</p>
                                        <p>•⁠  Develop long-term revenue models including training fees and corporate partnerships.</p>
                                        <p>•⁠  Establish a governance framework to ensure accountability and transparency.</p>
                                    </p>
                                </div>
                            </div>
                        </div>

                         <div class="col-lg-6 col-md-6">
                            <div class="application-content">
                                <div class="section-title">
                                    {{-- <div class="choose-card text-left">
                                        <i class="flaticon-web-page"></i>
                                    </div> --}}
                                    <h3>
                                        Call to Action
                                    </h3>
                                    <p class="mb-2" style="text-align: justify">
                                        <p>•⁠  Encourage professionals to join and support WGRCFP.</p>
                                        <p>•⁠  Promote active participation in mentorship and leadership programs.</p>
                                        <p>•⁠  Advocate for gender inclusion within GRC and financial crime prevention sectors.</p>
                                    </p>
                                </div>
                            </div>
                        </div>

                        

                    </div>
                </div>
            </div>
        </div>
        <!-- Roadmap Area End -->
        <br>



       
     
@endsection