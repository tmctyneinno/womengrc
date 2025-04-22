@extends('layouts.facilitatorDashboard')

@section('content')
<div class="page__body--wrapper" id="dashbody__page--body__wrapper">
    <main class="main__content_wrapper">
        <!-- dashboard container -->
        <div class="dashboard__container ">
            <div class="">
                <div class="">
                    <!-- Welcome section -->
                    <div class="welcome__section align-items-center">
                       
                        {{-- <h2 class="welcome__content--title">Welcome {{ Auth::user()->name}}</h2> --}}
                        <h2 class="welcome__content--title text-center">Welcome to Women in GRC Facilitator </h2>
                        <p class="welcome__content--desc">
                            We are a community dedicated to empowering women in Governance, Risk, Compliance, Financial Crime, and Fraud Prevention.
                            Join us to connect with mentors, access resources, and drive positive change. Together, we are shaping a more ethical and inclusive future.
                            Welcome aboard!
                        </p>
                        <div class="text-center">
                            <a class="welcome__content--btn solid__btn" href="{{ route('facilitator.create.event')}}">Create Event</a>
                            {{-- <a class="welcome__content--btn solid__btn" href="#">View Benefits</a> --}}
                            {{-- <a class="welcome__content--btn solid__btn" href="#">Renew Membership</a> --}}
                        </div>
                        
                       
                    </div>
                    <!-- Welcome section .\ -->

                    <!-- Currency section -->
                    <div class="currency__section mb-30">
                        <div class="currency__column4 swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="currency__card">
                                        <h3 class="currency__card--title">
                                            Number of Mentor</h3>
                                        <span class="currency__card--amount">0</span>
                                        <div class="currency__card--footer">
                                            <a class="currency__withdrawal" href="{{ route('user.chat.index')}}">Click here</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="currency__card">
                                        <h3 class="currency__card--title"> Number of Mentees</h3>
                                        <span class="currency__card--amount">0</span>
                                        <div class="currency__card--footer">
                                            <a class="currency__withdrawal" href="#">Click here</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="currency__card">
                                        <h3 class="currency__card--title">
                                            Recent Activity
                                        </h3>
                                        <span class="currency__card--amount">0</span>
                                        <div class="currency__card--footer">
                                            <span class="currency__weekly">0 Days Ago</span>
                                            <a class="currency__withdrawal" href="#">Click here</a>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- Currency section .\ -->

                   
                </div>
            </div>
           
        </div>
        <!-- dashboard container .\ -->

    
    </main>
</div>
@endsection



