@extends('layouts.app')



@section('content')

 
        <!-- Inner Banner -->
        <div class="inner-banner"  style="background-image: url({{ asset($aboutUs->banner_one) }});">
            <div class="container">
                <div class="inner-title text-center">
                    <h3>Terms Of Reference</h3>
                    <ul>
                        <li>
                            <a href="{{ route('home')}}">Home</a>
                        </li>
                        <li>
                            <i class='bx bx-chevron-right'></i>
                        </li>
                        <li>Pages</li>
                        <li>
                            <i class='bx bx-chevron-right'></i>
                        </li>
                        <li>Terms Of Reference</li>
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
                                   The <b> Women in Governance, Risk, Compliance & Financial Crime Prevention
                                    (WGRCFP)</b> is a professional network dedicated to advancing the leadership,
                                    visibility, and expertise of women in governance, risk management,
                                    compliance, and financial crime prevention across various sectors.
                                </p>
                                <p>
                                    This <b>Terms of Reference (ToR)</b> outlines the purpose, structure, roles, and
                                    responsibilities of WGRCFP’s governance and operational bodies to ensure
                                    effective management, transparency, and alignment with the organisation’s
                                    mission and objectives
                                </p>
                            </div>
                            
                           
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="about-img">
                            <img src="{{ asset('assets/images/termsOfReference/img1.png')}}" style="height: 300px; border-radius:10%" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About Area End -->

         <!-- Purpose Area -->
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
                                  Purpose
                                </h3>
                                <h5>The purpose of WGRCFP is to:</h5>
                                <p class="mb-2" style="text-align: justify">
                                    <p>•⁠  Foster a collaborative platform for knowledge exchange, networking, and professional development.</p>
                                    <p>•⁠  Promote gender equity and leadership opportunities for women in GRC and financial crime prevention fields.</p>
                                    <p>•⁠  Establish a governance structure that ensures accountability, ethical leadership, and transparency.</p>
                                </p>
                                <br/>
                                
                            </div>
                           
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Purpose Area End -->

        <!-- Governance Structure Area -->
        <section class="pricing-area pb-70 pt-45">
            <div class="container">
                <div class="section-title text-center">
                    <h2>Governance Structure</h2>
                </div>
                <div class="row pt-45">
                    <div class="col-lg-4 col-md-6">
                        <div class="price-card" style="text-align: left;padding-left:5px">
                            <div class="content">
                                <h3>Advisory Council</h3>
                            </div>
                            <p>
                                The Advisory Council serves as the
                                strategic and oversight body responsible
                                for guiding the long-term vision,
                                governance, and sustainability of
                                WGRCFP.
                            </p>
                            <b>Responsibilities</b>
                            <ul>
                                <li>Provide strategic direction and ensure alignment with WGRCFP’s objectives.</li>
                                <li>Review and approve policies, strategic plans, and budgets.</li>
                                <li>Monitor organisational performance and risk management.</li>
                                <li>Ensure ethical governance, diversity, and inclusivity.</li>
                                <li>Represent WGRCFP at external engagements and partnerships.</li>
                            </ul>
                            
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="price-card"  style="text-align: left;padding-left:5px">
                            <div class="content">
                                <h3> Committees</h3>
                            </div>
                            <p>
                                WGRCFP will establish specialised
                                committees to support core
                                workstreams. Each committee will report
                                to the Advisory Council.
                            </p>
                            <b>Committees may include:</b>
                            <ul>
                                <li>Strategy & Governance Committee. </li>
                                <li>Ethics & Compliance Committee.</li>
                                <li>Membership & Outreach Committee</li>
                                <li>Events & Programmes Committee</li>
                                <li>Financial Oversight & Audit Committee</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6  ">
                        <div class="price-card"  style="text-align: left;padding-left:5px;">
                            <div class="content">
                                <h3>Executive Leadership Team</h3>
                            </div>
                            <p>
                                The Executive Leadership Team is
                                responsible for the day-to-day
                                operations, delivery of programmes, and
                                implementation of the strategic plan
                            </p>
                            <b>Responsibilities:</b>
                            <ul>
                                <li>Execute strategic plans approved by the Advisory Council.</li>
                                <li>Manage operational processes,
                                    programmes, and stakeholder
                                    engagements.
                                </li>
                                <li>Provide regular performance reports to the Advisory Council.</li>
                                <li>Ensure effective coordination between committees and governance bodies.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Governance Structure Area End -->

        <!-- Membership and Participation Area -->
         <div class="application-area-two pt-45 pb-70">
            <div class="container">
                <div class="section-title text-center">
                    <h2>Membership and Participation Area</h2>
                </div>
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6">
                        <div class="p-3">
                            <img style="border-radius: 10px" src="{{ asset('assets/images/termsOfReference/img2.png')}}" alt="Images">
                        </div>
                    </div>

                     <div class="col-lg-6">
                        <div class="application-content">
                            <div class="section-title">
                                <h3>
                                  Membership Eligibility
                                </h3>
                                <p>WGRCFP membership is open to:`</p>
                                <p class="mb-2" style="text-align: justify">
                                    <p>•⁠  Women professionals in governance, risk management, compliance, and financial crime prevention.</p>
                                    <p>•⁠  Industry leaders, consultants, academics, regulators, and policymakers who support WGRCFP’s mission.</p>
                                </p>
                                <br/>
                                <h3>
                                  Member Rights and Responsibilities
                                </h3>
                                <p>WGRCFP membership is open to:`</p>
                                <p class="mb-2" style="text-align: justify">
                                    <p>•⁠  Participate in WGRCFP events, programmes, and networking activities.</p>
                                    <p>•⁠  Contribute expertise through committees, working groups, and mentoring programmes.</p>
                                    <p>•⁠  Uphold the values and ethical standards of WGRCFP.</p>
                                </p>
                                
                            </div>
                           
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Membership and Participation Area End -->
       
        <!-- Roadmap Area  -->
        <div class="choose-area pt-45">
            <div class="container">
                <div class="section-title text-center">
                    <h2>WGRCFP Meetings and Communication</h2>
                </div>
                <div class="choose-width mt-80 pb-70">
                    <br/>
                    <div class="row ">
                        <div class="col-lg-6 col-md-6">
                            <div class="application-content">
                                <div class="section-title">
                                    <h3>
                                        Advisory Council Meetings
                                    </h3>
                                    <p class="mb-2" style="text-align: justify">
                                        <p>•⁠  <b>Frequency:</b> Quarterly (or as required).</p>
                                        <p>•⁠  <b>Purpose:</b> Review progress, approve plans
                                            and budgets, address strategic matters,
                                            and oversee risk and governance.</p>
                                    </p>
                                </div>
                            </div>
                        </div>

                       <div class="col-lg-6 col-md-6 mb-3">
                            <div class="application-content">
                                <div class="section-title">
                                    <h3>
                                      Committee Meetings
                                    </h3>
                                    <p class="mb-2" style="text-align: justify">
                                        <p>•⁠  <b>Frequency:</b> Monthly (or as required).</p>
                                        <p>•⁠  <b>Purpose:</b> Advance committee-specific
                                            workstreams and report progress to the
                                            Advisory Council.</p>
                                     </p>
                                </div>
                            </div>
                        </div>

                          <div class="col-lg-6 col-md-6">
                            <div class="application-content">
                                <div class="section-title">
                                    <h3>
                                      Member Forums
                                    </h3>
                                    <p class="mb-2" style="text-align: justify">
                                        <p>•⁠  <b>Frequency:</b> Periodic (e.g., bi-annual or annual).</p>
                                        <p>•⁠  <b>Purpose:</b> Provide updates on WGRCFP’s
                                                activities and gather member feedback.</p>
                                     </p>
                                </div>
                            </div>
                        </div>

                          <div class="col-lg-6 col-md-6">
                            <div class="application-content">
                                <div class="section-title">
                                    <h3>
                                        Communication Channels
                                    </h3>
                                    <p class="mb-2" style="text-align: justify">
                                        <p>•⁠  <b>Primary Platforms:</b> Microsoft Teams,
                                                Email, WGRCFP Website, and Social
                                                Media</p>
                                        <p>•⁠  Regular newsletters, updates, and
                                            governance communiqués will be
                                            circulated.</p>
                                    </p>
                                </div>
                            </div>
                        </div>

                        

                    </div>
                </div>
            </div>
        </div>
        <!-- Roadmap Area End -->
       
        <!-- Decision-Making Process -->
         <div class="application-area-two pt-45 pb-70">
            <div class="container">
                <div class="section-title text-center">
                    <h2>Decision-Making Process</h2>
                </div>
                <div class="row align-items-center justify-content-center">
                   
                     <div class="col-lg-6">
                        <div class="application-content">
                            <div class="section-title">
                               
                                <p class="mb-2" style="text-align: justify">
                                    <p class="mb-2">•⁠  <b>Consensus-Based:</b> Efforts will be made to achieve consensus on key decisions.</p>
                                    <p class="mb-2">•⁠   <b>Voting:</b> Where consensus is not possible,
                                        decisions may be taken by a simple
                                        majority vote (with the Chair holding a
                                        casting vote if needed).</p>
                                    <p class="mb-2">
                                        • <b>Conflict of Interest:</b> Members must
                                        declare conflicts of interest and recuse
                                        themselves where necessary.
                                    </p>
                                </p>
                                
                                
                            </div>
                           
                        </div>
                    </div>

                     <div class="col-lg-6">
                        <div class="p-3">
                            <img style="border-radius: 10px" src="{{ asset('assets/images/termsOfReference/decision-making.png')}}" alt="Images">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Decision-Making Process End -->

        <!-- Ethical Conduct & Compliance -->
        <div class="application-area-two pt-45 pb-70" style="background-color: white">
            <div class="container">
                <div class="section-title text-center">
                    <h2>Ethical Conduct & Compliance</h2>
                </div>
                <div class="row align-items-center justify-content-center">
                   
                    <div class="col-lg-6">
                        <div class="p-3">
                            <img style="border-radius: 10px" src="{{ asset('assets/images/termsOfReference/compliance.png')}}" alt="Images">
                        </div>
                    </div>
                     <div class="col-lg-6">
                        <div class="application-content">
                            <div class="section-title">
                               
                                <p class="mb-2" style="text-align: justify">
                                    <p class="mb-2">•⁠  All governance members, committee
                                            members, and participants are
                                            expected to adhere to the 
                                            <b>WGRCFP Code of Conduct.</b>
                                    </p>
                                    <p class="mb-2">•⁠   Ethical considerations, diversity,
                                            inclusion, and integrity shall guide all
                                            decisions and actions.
                                    </p>
                                    <p class="mb-2">
                                        • Any suspected misconduct will be
                                            reviewed under the <b>Ethics &
                                            Compliance Committee</b> oversight.
                                    </p>
                                </p>
                                
                                
                            </div>
                           
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Ethical Conduct & Compliance End -->

        <!-- Reporting and Accountability -->
        <div class="application-area-two pt-45 pb-70" >
            <div class="container">
                <div class="section-title text-center">
                    <h2>Reporting and Accountability</h2>
                </div>
                <div class="row align-items-center justify-content-center">
                   
                   
                     <div class="col-lg-6">
                        <div class="application-content">
                            <div class="section-title">
                               
                                <p class="mb-2" style="text-align: justify">
                                    <p class="mb-2">•⁠  <b>Annual Report:</b> WGRCFP will publish an
                                        annual report summarising activities,
                                        achievements, financial performance, and
                                        governance matters.
                                    </p>
                                    <p class="mb-2">•⁠  <b>Performance Reviews:</b> Annual performance
                                        reviews will assess the effectiveness of the
                                        Advisory Council, committees, and
                                        leadership team.</p>
                                    <p class="mb-2">
                                        •   <b>Public Disclosure:</b> Key governance
                                            documents will be accessible to members
                                            and stakeholders (where appropriate).
                                    </p>
                                </p>
                                
                                
                            </div>
                           
                        </div>
                    </div>

                     <div class="col-lg-6">
                        <div class="p-3">
                            <img style="border-radius: 10px" src="{{ asset('assets/images/termsOfReference/accountability.png')}}" alt="Images">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Reporting and Accountability End -->

         <!-- Review and Amendments -->
        <div class="application-area-two pt-45 pb-70" style="background-color: white">
            <div class="container">
                <div class="section-title text-center">
                    <h2>Review and Amendments</h2>
                </div>
                <div class="row align-items-center justify-content-center">
                     <div class="col-lg-6">
                        <div class="application-content">
                            <div class="section-title">
                               
                                <p class="mb-2" style="text-align: justify">
                                    <p class="mb-2">•⁠  This Terms of Reference will be reviewed
                                        <b>annually</b> by the Strategy & Governance
                                        Committee
                                    </p>
                                    <p class="mb-2">•⁠  Amendments require approval by the Advisory Council.</p>
                                    <p class="mb-2">
                                        •   Changes will be communicated to all members and stakeholders
                                    </p>
                                </p>
                            </div>
                           
                        </div>
                    </div>

                     <div class="col-lg-6">
                        <div class="p-3">
                            <img style="border-radius: 10px" src="{{ asset('assets/images/termsOfReference/amendments.png')}}" alt="Images">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Review and Amendments End -->

         <!-- Document Control -->
        <div class="application-area-two pt-45 pb-70" >
            <div class="container">
                <div class="section-title text-center">
                    <h2>Document Control</h2>
                </div>
                <div class="row align-items-center justify-content-center">
                     <div class="col-lg-6">
                        <div class="p-3">
                            <img style="border-radius: 10px" src="{{ asset('assets/images/termsOfReference/control.png')}}" alt="Images">
                        </div>
                    </div>

                     <div class="col-lg-6">
                        <div class="application-content">
                            <div class="section-title">
                               
                                <p class="mb-2" style="text-align: justify">
                                    <p class="mb-2">Document Title: </p>
                                    <b>GRCFP Terms of Reference</b>
                                    <br>

                                    <p><b class="mb-4">Version 1.0</b></p>
                                    <br>
                                    <p class="mb-2">Date: <b>March 2025</b></p>
                                    <br>

                                    <p class="mb-2">Approved By: <b>Advisory Council</b> </p>
                                    <br>
                                    <p class="mb-2">Review Date: <b>March 2026</b> </p>
                                </p>
                            </div>
                           
                        </div>
                    </div>

                    

                </div>
            </div>
        </div>
        <!-- Document Control End -->
     
@endsection