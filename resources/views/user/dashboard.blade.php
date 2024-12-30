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
                        <h2 class="welcome__content--title">Welcome to Women in GRC </h2>
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
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="currency__card">
                                        <h3 class="currency__card--title">
                                            Number of Mentor</h3>
                                        <span class="currency__card--amount">{{$mentorCount}}</span>
                                        <div class="currency__card--footer">
                                            <a class="currency__withdrawal" href="#">Click here</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="currency__card">
                                        <h3 class="currency__card--title"> Number of Mentees</h3>
                                        <span class="currency__card--amount">{{ $menteeCount }}</span>
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
                                            <span class="currency__weekly">2 Days Ago</span>
                                            <a class="currency__withdrawal" href="#">Click here</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="currency__card">
                                        <h3 class="currency__card--title"><span><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.82505 3.90805C9.7923 3.9026 9.75409 3.9026 9.72134 3.90805C8.96809 3.88076 8.36768 3.26397 8.36768 2.4998C8.36768 1.71926 8.99538 1.09155 9.77592 1.09155C10.5565 1.09155 11.1842 1.72472 11.1842 2.4998C11.1787 3.26397 10.5783 3.88076 9.82505 3.90805Z" stroke="#EF4545" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M9.26296 7.88181C10.0108 8.00735 10.835 7.87635 11.4135 7.48881C12.1832 6.97572 12.1832 6.13514 11.4135 5.62206C10.8295 5.23452 9.99437 5.10351 9.24658 5.23451" stroke="#EF4545" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M3.25854 3.90805C3.29129 3.9026 3.3295 3.9026 3.36225 3.90805C4.1155 3.88076 4.71591 3.26397 4.71591 2.4998C4.71591 1.71926 4.08821 1.09155 3.30767 1.09155C2.52712 1.09155 1.89941 1.72472 1.89941 2.4998C1.90487 3.26397 2.50529 3.88076 3.25854 3.90805Z" stroke="#EF4545" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M3.82082 7.88181C3.07303 8.00735 2.24882 7.87635 1.67024 7.48881C0.900611 6.97572 0.900611 6.13514 1.67024 5.62206C2.25428 5.23452 3.0894 5.10351 3.83719 5.23451" stroke="#EF4545" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M6.55015 7.98545C6.5174 7.97999 6.47919 7.97999 6.44644 7.98545C5.69319 7.95816 5.09277 7.34136 5.09277 6.5772C5.09277 5.79665 5.72048 5.16895 6.50102 5.16895C7.28156 5.16895 7.90927 5.80211 7.90927 6.5772C7.90382 7.34136 7.3034 7.96361 6.55015 7.98545Z" stroke="#EF4545" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M4.96174 9.70493C4.19212 10.218 4.19212 11.0586 4.96174 11.5717C5.83507 12.1557 7.26516 12.1557 8.13849 11.5717C8.90812 11.0586 8.90812 10.218 8.13849 9.70493C7.27062 9.12635 5.83507 9.12635 4.96174 9.70493Z" stroke="#EF4545" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>                                                
                                        </span> Visitor Reviews</h3>
                                        <span class="currency__card--amount">7900</span>
                                        <div class="currency__card--footer">
                                            <span class="currency__weekly">Last week</span>
                                            <span class="currency__decrease color-accent-2"><svg width="6" height="7" viewBox="0 0 6 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2.71978 6.88811L0.115159 4.36017C0.0408097 4.288 -1.83231e-07 4.19183 -1.78748e-07 4.08927C-1.7426e-07 3.98661 0.0408684 3.89049 0.115159 3.81833L0.351692 3.58881C0.425924 3.5167 0.525076 3.47698 0.630795 3.47698C0.736455 3.47698 0.838949 3.5167 0.913181 3.58881L2.43599 5.06357L2.43599 0.378168C2.43599 0.166917 2.60638 1.13929e-07 2.8241 1.23445e-07L3.15849 1.38062e-07C3.3762 1.47578e-07 3.56378 0.166917 3.56378 0.378168L3.56378 5.08031L5.09509 3.58886C5.16944 3.51676 5.26589 3.47704 5.37161 3.47704C5.47721 3.47704 5.57507 3.51676 5.64936 3.58886L5.88513 3.81838C5.95948 3.89054 6 3.98667 6 4.08933C6 4.19188 5.95896 4.28806 5.88461 4.36022L3.28004 6.88817C3.20546 6.9605 3.10589 7.00028 3.00006 7C2.89387 7.00023 2.79425 6.9605 2.71978 6.88811Z" fill="currentColor"/>
                                                </svg>                                                    
                                                01%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="currency__card">
                                        <h3 class="currency__card--title"><span><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.18542 7.50511C5.18542 8.03457 5.59481 8.46032 6.09697 8.46032H7.12313C7.55979 8.46032 7.91459 8.08916 7.91459 7.6252C7.91459 7.12849 7.69626 6.94837 7.37422 6.83374L5.73126 6.26061C5.40922 6.14599 5.19089 5.97132 5.19089 5.46916C5.19089 5.01066 5.54567 4.63403 5.98234 4.63403H7.00851C7.51067 4.63403 7.92006 5.05978 7.92006 5.58924" stroke="#9E38FF" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M6.55005 4.09375V9.00625" stroke="#9E38FF" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M12.0083 6.54989C12.0083 9.56289 9.56301 12.0082 6.55001 12.0082C3.53701 12.0082 1.09167 9.56289 1.09167 6.54989C1.09167 3.53689 3.53701 1.09155 6.55001 1.09155" stroke="#9E38FF" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M9.27917 1.63745V3.82078H11.4625" stroke="#9E38FF" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M12.0083 1.09155L9.27917 3.82072" stroke="#9E38FF" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </span>
                                            Total income</h3>
                                        <span class="currency__card--amount">$1,579,00.87</span>
                                        <div class="currency__card--footer">
                                            <span class="currency__weekly">Last week</span>
                                            <span class="currency__increase "><svg width="6" height="7" viewBox="0 0 6 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2.71978 0.111888L0.115159 2.63983C0.0408097 2.712 -1.83231e-07 2.80817 -1.78748e-07 2.91073C-1.7426e-07 3.01339 0.0408684 3.10951 0.115159 3.18167L0.351692 3.41119C0.425924 3.4833 0.525076 3.52302 0.630795 3.52302C0.736455 3.52302 0.838949 3.4833 0.913181 3.41119L2.43599 1.93643L2.43599 6.62183C2.43599 6.83308 2.60638 7 2.8241 7L3.15849 7C3.3762 7 3.56378 6.83308 3.56378 6.62183L3.56378 1.91969L5.09509 3.41114C5.16944 3.48324 5.26589 3.52296 5.37161 3.52296C5.47721 3.52296 5.57507 3.48324 5.64936 3.41114L5.88513 3.18162C5.95948 3.10946 6 3.01333 6 2.91067C6 2.80812 5.95896 2.71194 5.88461 2.63978L3.28004 0.11183C3.20546 0.0394972 3.10589 -0.000281947 3.00006 2.72989e-06C2.89387 -0.000225194 2.79425 0.0394977 2.71978 0.111888Z" fill="currentColor"></path>
                                                </svg>
                                                10%</span>
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



