@extends('layouts.app')



@section('content')

@php
    // Cache translations for the inner banner and membership criteria section
    $criteriaTitle = 'WGRCFP Membership Plans';
    $homeText = 'Home';
    $pagesText = 'Pages';

    // Handle dynamic content and image with fallbacks and translation
    // Header image from $membershipContent (assuming it's passed for the banner)
    $headerImageUrl = asset('images/default-header-placeholder.jpg'); // Default fallback header image
    if (isset($membershipContent) && !empty($membershipContent->image)) {
        $headerImageUrl = asset($membershipContent->image);
    }

    // Content from $membershipCriteria
    $criteriaContentText = 'Membership criteria details will be available soon. Please check back later.';
  

    if (isset($membershipCriteria) && $membershipCriteria) {
        // Use ID in cache key if available, otherwise use 'static'
        $criteriaId = $membershipCriteria->id ?? 'static';


        $criteriaContentText = $membershipCriteria->content ?? '';
    }
@endphp

<div class="inner-banner" style="background-image: url({{ $headerImageUrl }});">
    <div class="container">
        <div class="inner-title text-center">
            <h3>{{ $criteriaTitle }}</h3>
            <ul>
                <li>
                    <a href="{{ route('home')}}">{{ $homeText }}</a>
                </li>
                <li> 
                    <i class="bx bx-chevron-right"></i>
                </li>
                <li>{{ $pagesText }}</li>
                <li>
                    <i class="bx bx-chevron-right"></i>
                </li>
                <li>{{ $criteriaTitle }}</li>
            </ul>
        </div>
    </div>
</div>

<div class="terms-conditions-area ptb-100"> {{-- Consider renaming this class for specificity --}}
    <div class="container">
        <div class="single-content"> {{-- Consider renaming this class for specificity --}}
            <h3 class="text-center">Empowering Women in Governance, Risk, Compliance & Financial Crime Prevention Across the Globe</h3>
            
        
            <div class="single-content">
                <h3>Overview</h3>
                <p> 
                    WGRCFP membership is designed to foster professional growth, visibility, and impact for women working in or aspiring to lead within the fields of governance, risk management, compliance (GRC), financial crime prevention, fraud, cyber risk, and ESG. 
                </p>
                <p>Our plans are tailored to meet the needs of individuals at different stages of their career and organisations committed to gender equity in risk and compliance leadership.</p>

                <h3>Individual Membership Tiers</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Tier</th>
                            <th>Annual Fee</th>
                            <th>Target Audience</th>
                            <th>Key Benefits</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Student Member</td>
                            <td>£25</td>
                            <td>University students or recent graduates</td>
                            <td>Access to entry-level GRC and Financial Crime Prevention resources, internship/job board, career support</td>
                        </tr>
                        <tr>
                            <td>Associate Member</td>
                            <td>£75</td>
                            <td>Early career professionals (0–5 years’ experience)</td>
                            <td>Monthly webinars, WGRCFP newsletter, member badge, discounted events</td>
                        </tr>
                        <tr>
                            <td>Professional Member</td>
                            <td>£150</td>
                            <td>Mid-career professionals & specialists</td>
                            <td>Full event access, member directory listing, speaker opportunities</td>
                        </tr>
                        <tr>
                            <td>Senior Fellow</td>
                            <td>£250</td>
                            <td>Senior executives, directors, partners</td>
                            <td>Priority speaking roles, leadership roundtables, mentor opportunities</td>
                        </tr>
                        <tr>
                            <td>Chartered Member</td>
                            <td>£300 (by invitation or assessment)</td>
                            <td>Accredited senior experts & contributors</td>
                            <td>Voting rights, governance roles, advisory participation, advanced credentials</td>
                        </tr>
                    </tbody>
                </table>


                <h3>Corporate & Institutional Membership</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Annual Fee</th>
                            <th>Ideal For</th>
                            <th>Key Benefits</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>SME Partner</td>
                            <td>£750</td>
                            <td>Small–medium enterprises (up to 250 employees)</td>
                            <td>2 staff accounts, company logo on partner page, discounted training bundles</td>
                        </tr>
                        <tr>
                            <td>Corporate Member</td>
                            <td>£2,000</td>
                            <td>Large organisations or regional offices</td>
                            <td>5 staff accounts, free event passes, internal workshop session, DEI support tools</td>
                        </tr>
                        <tr>
                            <td>Strategic Partner</td>
                            <td>£5,000+</td>
                            <td>Multinationals, government, academic or regulatory institutions</td>
                            <td>Co-branded initiatives, 10 accounts, policy roundtable access, joint publications</td>
                        </tr>
                    </tbody>
                </table>

                <h3>Universal Membership Benefits</h3>
                <p>All membership tiers include access to:</p>
                <ul>
                    <li>Exclusive WGRCFP LinkedIn group</li>
                    <li>Global monthly newsletter</li>
                    <li>Women’s Leadership Series and Career Talks</li>
                    <li>Nomination eligibility for WGRCFP Awards</li>
                    <li>Member discounts on summits, masterclasses, and partner programs</li>
                    <li>Early access to publications and toolkits</li>
                    <li>Free participation in annual “Voice of Governance” Forum</li>
                </ul>

                <h3>Optional Add-ons (Fee-Based)</h3>
                <ul>
                    <li>Mentoring programme – structured cohort-based leadership mentoring (£50/year)</li>
                    <li>Professional certification discounts – via training partners and academic institutions</li>
                    <li>Directory Listing Verification Badge – verified expert or service provider endorsement (£30/year)</li>
                    <li>Coaching and Career Strategy Clinics – quarterly sessions with senior GRC leaders</li>
                </ul>

                <h3>Eligibility and Code of Conduct</h3>
                <p>All members are expected to:</p>
                <ul>
                    <li>Adhere to WGRCFP’s Code of Professional Conduct</li>
                    <li>Promote ethical governance and financial integrity</li>
                    <li>Support women’s advancement and equity in leadership</li>
                    <li>Participate in annual ethics and compliance declaration</li>
                </ul>

                <h3>Join Us</h3>
                <p>To register, visit: <a href="http://www.wgrcfp.org/membership" target="_blank">www.wgrcfp.org/membership</a></p>
                <p>For bulk or organisational registrations, contact: <a href="mailto:membership@wgrcfp.org">membership@wgrcfp.org</a></p>
                <p>Women in GRCFP</p>
                
            </div>
        </div>
    </div>
</div>

@endsection