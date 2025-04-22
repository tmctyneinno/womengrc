@extends('layouts.app')



@section('content')

<div class="inner-banner" style="background-image: url({{ asset('assets/images/banner/conference.jpg') }});">
   
    <div class="container">
        <div class="inner-title text-center">
            <h3>Terms &amp; Conditions</h3>
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <i class="bx bx-chevron-right"></i>
                </li>
                <li>Pages</li>
                <li>
                    <i class="bx bx-chevron-right"></i>
                </li>
                <li>Terms &amp; Condition</li>
            </ul>
        </div>
    </div>
</div>

<div class="terms-conditions-area ptb-100">
    <div class="container">
       

        <div class="single-content">
            <h3 class="text-center">Welcome to Women GRC Terms and Condition</h3>
            <p>
                {!! $termsCondition ? $termsCondition->content : 'Coming soon' !!}
            </p>
        </div>
    </div>
</div>

    
@endsection