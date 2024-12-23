@extends('layouts.app')



@section('content')

<div class="inner-banner" style="background-image: url({{ asset('assets/images/banner/membership.jpg') }});">
    <div class="container">
        <div class="inner-title text-center">
            <h3>Membership</h3>
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
                <li>Membership</li>
            </ul>
        </div>
    </div>
</div>

<div class="terms-conditions-area ptb-100">
    <div class="container">
       

        <div class="single-content">
            <h3 class="text-center">Welcome to Women GRC Membership</h3>
            <p>
                Coming soon
            </p>
        </div>
    </div>
</div>

    
@endsection