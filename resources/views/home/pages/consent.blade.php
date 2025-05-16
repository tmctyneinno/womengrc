@extends('layouts.app')



@section('content')


<div class="inner-banner" style="background-image: url({{ asset('assets/images/banner/conference.jpg') }});">
    <div class="container">
        <div class="inner-title text-center">
            <h3>WGRCFP GDPR Compliance Consent Notice</h3>
            <ul>
                <li>
                    <a href="{{ route('home')}}">Home</a>
                </li>
                <li>
                    <i class="bx bx-chevron-right"></i>
                </li>
                <li>Pages</li>
                <li>
                    <i class="bx bx-chevron-right"></i>
                </li>
                <li>WGRCFP GDPR Compliance Consent Notice</li>
            </ul>
        </div>
    </div>
</div>

<div class="privacy-policy-area ptb-100">
    <div class="container">
       
        <div class="single-content">
            <h3 class="text-center">WGRCFP GDPR Compliance Consent Notice</h3>
            
            <p style="text-align: justify; color: #000;">
                
                {!! $consentNote ? $consentNote->content : 'Coming soon' !!}
            </p>
        </div>

        

       
    </div>
</div>
       
    
@endsection