@extends('layouts.dashboard')

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
                        <h2 class="welcome__content--title">Welcome to Women in GRC & Financial Crime Prevention (WGRCFP) </h2>
                        <p class="welcome__content--desc">
                            We are a community dedicated to empowering women in Governance, Risk, Compliance, Financial Crime, and Fraud Prevention.
                            Join us to connect with mentors, access resources, and drive positive change. Together, we are shaping a more ethical and inclusive future.
                            Welcome aboard!
                        </p>
                        <div class="text-center">
                            <a class="welcome__content--btn solid__btn" href="{{ route('user.findMentor')}}">Find a Mentor</a>
                            {{-- <a class="welcome__content--btn solid__btn" href="#">View Benefits</a> --}}
                            {{-- <a class="welcome__content--btn solid__btn" href="#">Renew Membership</a> --}}
                        </div>
                        
                       
                    </div>
                    <!-- Welcome section .\ -->

                    <!-- Currency section -->
                    <div class="currency__section mb-30">
                        <div class="currency__column4 swiper">
                            <div class="row mb-3">
                                <div class="col-md-6 col-lg-3">
                                    <div class="card stat-card bg-info text-white mb-4">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6 class="stat-title">New Messages</h6>
                                                    <h3 class="stat-value">{{ $recentMessages->count() }}</h3>
                                                </div>
                                                <i class="fas fa-envelope fa-3x opacity-50"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-md-6 col-lg-3">
                                    <div class="card stat-card bg-warning text-dark mb-4">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6 class="stat-title">Your Groups</h6>
                                                    <h3 class="stat-value">{{ $userGroups->count() }}</h3>
                                                </div>
                                                <i class="fas fa-users fa-3x opacity-50"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3"> 
                                <div class="col-md-6 mb-3">
                                    <div class="currency__card">
                                        <h3 class="currency__card--title"> Upcoming Events</h3>
                                        <span class="currency__card--amount">{{ $upcomingEvents->count() }}</span>
                                        <div class="currency__card--footer">
                                            <a class="currency__withdrawal" href="{{ route('user.events.upcoming') }}">Click here</a>
                                        </div>
                                    </div>
                                </div>
                              
                                <div class="col-md-6 mb-3">
                                    <div class="currency__card">
                                        <h3 class="currency__card--title"> Training</h3>
                                        <span class="currency__card--amount">{{ $trainingCertifications->count() }}</span>
                                        <div class="currency__card--footer">
                                            <a class="currency__withdrawal" href="{{ route('user.training.index') }}">Click here</a>
                                        </div>
                                    </div>
                                </div>

                               
                                
                                <div class="col-md-6">
                                    <div class="currency__card">
                                        <h3 class="currency__card--title"> Number of Mentees</h3>
                                        <span class="currency__card--amount">{{ $menteeCount }}</span>
                                        <div class="currency__card--footer">
                                            <a class="currency__withdrawal" href="#">Click here</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
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



