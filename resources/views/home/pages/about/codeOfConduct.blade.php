@extends('layouts.app')



@section('content')

 
        <!-- Inner Banner -->
        <div class="inner-banner"  style="background-image: url({{ asset($aboutUs->banner_one) }});">
            <div class="container">
                <div class="inner-title text-center">
                    <h3>Code of Conduct</h3>
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
                        <li>Code of Conduct</li>
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
                                <h2>Introduction</h2>
                                <p>
                                   The Women in Governance, Risk, Compliance,
                                    and Financial Crime Prevention (WGRCFP) is
                                    committed to fostering an inclusive, professional,
                                    and ethical environment for all members and
                                    participants. This Code of Conduct outlines the
                                    expected standards of behavior and
                                    responsibilities within WGRCFP activities,
                                    engagements, and interactions.
                                </p>
                            </div>
                            
                           
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="about-img">
                            <img src="{{ asset('assets/images/code-of-conduct.png') }}" style="height: 250px; border-radius:10px" alt="image">
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
                    <div class="blog-details-area pt-50 pb-70">
                        <div class="">
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="blog-article">
                                        <div class="comments-wrap">
                                            <ul>
                                                <li class="ml-30">
                                                    <img style="border-radius: 0px; height:90px" src="{{ asset('assets/images/codeOfConduct/ethics.png')}}" alt="Image">
                                                    <h3>PROFESSIONAL BEHAVIOR & ETHICS</h3>
                                                    <p>• Maintain the highest standards of integrity, honesty, and professionalism.
                                                    </p>
                                                    <p> • Comply with all applicable laws, regulations, and professional standards.
                                                    </p>
                                                    <p> • Avoid conflicts of interest and disclose any potential conflicts to the appropriate parties.  
                                                    </p>
                                                    <p>• Uphold transparency and accountability in all dealings.
                                                    </p>
                                                </li>

                                                <li class="ml-30">
                                                    <img style="border-radius: 0px; height:90px" src="{{ asset('assets/images/codeOfConduct/inclusion.png')}}" alt="Image">
                                                    <h3>RESPECT & INCLUSION</h3>
                                                  
                                                    <p>• Treat all individuals with dignity, fairness, and respect regardless of gender,
                                                    race, ethnicity, nationality, disability, age, sexual orientation, religion, or
                                                    socioeconomic status.</p>
                                                    <p>• Foster a culture of inclusivity, diversity, and equal opportunity.</p>
                                                    <p>• Refrain from any form of harassment, discrimination, bullying, or intimidation.</p>
                                                   
                                                </li>
                                                <li class="ml-30">
                                                    <img style="border-radius: 0px; height:90px" src="{{ asset('assets/images/codeOfConduct/protection.png')}}" alt="Image">
                                                    <h3>CONFIDENTIALITY & DATA PROTECTION </h3>
                                                    <p>• Treat all individuals with dignity, fairness, and respect regardless of gender,
                                                    race, ethnicity, nationality, disability, age, sexual orientation, religion, or
                                                    socioeconomic status.</p>
                                                    <p>• Foster a culture of inclusivity, diversity, and equal opportunity.</p>
                                                    <p>• Refrain from any form of harassment, discrimination, bullying, or intimidation.</p>
                                                </li>

                                               
                                                <li class="ml-30">
                                                    <img style="border-radius: 0px; height:90px" src="{{ asset('assets/images/codeOfConduct/impartiality.png')}}" alt="Image">
                                                    <h3>CONFLICT OF INTEREST & IMPARTIALITY</h3>
                                                    <p>• Avoid engaging in activities that create conflicts of interest.</p>
                                                    <p>• Act with objectivity and impartiality in all professional dealings.</p>
                                                    <p>• Disclose any relationships or affiliations that may compromise neutrality.</p>
                                                </li> 
                                                <li class="ml-30">
                                                    <img style="border-radius: 0px; height:90px" src="{{ asset('assets/images/codeOfConduct/policies.png')}}" alt="Image">
                                                    <h3>COMPLIANCE WITH WGRCFP POLICIES</h3>
                                                    <p>• Adhere to all WGRCFP policies, procedures, and governance structures.</p>
                                                    <p>• Follow established guidelines for participation in WGRCFP programs and initiatives.</p>
                                                    <p>• Support the mission and objectives of WGRCFP in good faith.</p>
                                                </li> 
                                                <li class="ml-30">
                                                    <img style="border-radius: 0px; height:90px" src="{{ asset('assets/images/codeOfConduct/misconduct.png')}}" alt="Image">
                                                    <h3>REPORTING MISCONDUCT</h3>
                                                    <p>• Report any unethical behavior, misconduct, or violations of this Code of Conduct.</p>
                                                    <p>• Utilize WGRCFP’s established channels for grievances and dispute resolution.</p>
                                                    <p>• Maintain confidentiality and protection for individuals who report misconduct in good faith.</p>
                                                </li> 
                                                 <li class="ml-30">
                                                    <img style="border-radius: 0px; height:90px" src="{{ asset('assets/images/codeOfConduct/violations.png')}}" alt="Image">
                                                    <h3>CONSEQUENCES OF VIOLATIONS</h3>
                                                    <p>• WGRCFP reserves the right to investigate any alleged violations of this Code of Conduct.</p>
                                                    <p>• Violators may face disciplinary actions, including warnings, suspension, or termination of membership.</p>
                                                    <p>• Severe breaches may result in legal consequences where applicable.</p>
                                                </li> 
                                                <li class="ml-30">
                                                    <img style="border-radius: 0px; height:90px" src="{{ asset('assets/images/codeOfConduct/commitment.png')}}" alt="Image">
                                                    <h3>ACKNOWLEDGMENT & COMMITMENT</h3>
                                                    <p>• All members and participants of WGRCFP must acknowledge and commit to abiding by this Code of Conduct.</p>
                                                    <p>• Participation in WGRCFP programs implies acceptance of these standards.</p>
                                                </li> 
                                                <li class="ml-30">
                                                    <img style="border-radius: 0px; height:90px" src="{{ asset('assets/images/codeOfConduct/review.png')}}" alt="Image">
                                                    <h3>REVIEW & UPDATES</h3>
                                                    <p>• This Code of Conduct will be reviewed periodically to ensure its relevance and effectiveness.</p>
                                                    <p>• Any updates will be communicated to all members and stakeholders.</p>
                                                </li> 
                                            </ul>
                                            <p class="p-4 text-blod" style="font-weight: 500">
                                            By adhering to this Code of Conduct, WGRCFP members contribute to a professional, ethical, and
                                            inclusive community that upholds the highest standards of governance, risk, compliance, and financial
                                            crime prevention.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                

                            
                            </div>
                        </div>
                    </div>
                   

                    

                </div>
            </div>
        </div>
        <!-- Application Area End -->
       
        <br>



       
     
@endsection