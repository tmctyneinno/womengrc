@extends('layouts.guestDashboard')

@section('content')
<div class="page__body--wrapper" id="dashbody__page--body__wrapper">
    <main class="main__content_wrapper mb-30">
        <!-- dashboard container -->
        <div class="dashboard__container mb-30">
            <div class="mb-30">
                <div class="mb-30">
                    <!-- Welcome section -->
                    <div class="welcome__section align-items-center">
                       
                        {{-- <h2 class="welcome__content--title">Welcome {{ Auth::user()->name}}</h2> --}}
                        <h2 class="welcome__content--title text-center">Welcome to Women in GRC & Financial Crime Prevention (WGRCFP) </h2>
                        <p class="welcome__content--desc">
                            We are a community dedicated to empowering women in Governance, Risk, Compliance, Financial Crime, and Fraud Prevention.
                            Join us to connect with mentors, access resources, and drive positive change. Together, we are shaping a more ethical and inclusive future.
                            Welcome aboard!
                        </p>
                        <div class="text-center">
                            <a class="welcome__content--btn solid__btn" href="{{ route('guests.profile.edit')}}">View Profile</a>
                            {{-- <a class="welcome__content--btn solid__btn" href="#">View Benefits</a> --}}
                            {{-- <a class="welcome__content--btn solid__btn" href="#">Renew Membership</a> --}}
                        </div>
                        
                       
                    </div>
                    <!-- Welcome section .\ -->

                </div>
            </div>
           
        </div>
        <!-- dashboard container .\ -->
<br>
<br>
<br>
<br>
<br>
<br>
<br>
    
    </main>
</div>
@endsection



