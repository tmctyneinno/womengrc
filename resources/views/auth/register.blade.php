@extends('layouts.app')
<style>
    .navbar-custom{
        background-color: #2a2a2a !important;
    }
</style>
@section('content')

<div class="user-area">
    <div class="container-fluid m-0">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-7 col-xl-6  p-0">
                <div class="user-img">
                    <img src="{{ asset('assets/img/login-img.jpg')}}" alt="Images">
                </div> 
            </div>

            <div class="col-lg-5 col-xl-6">
                <div class="user-section text-center">
                    <div class="user-conten ">
                        <img src="{{ $contactUs ? asset($contactUs->site_logo) : '' }}" alt="">
                        <h2>Welcome To <b>Women GRC & Financial Crime Prevention</b> (WGRCFP)</h2> 
                    </div>
                    <div class="tab user-tab">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-12">
                                <ul class="tabs active">
                                    <li class="current">
                                        <a href="#"> <i class="flaticon-contact"></i> Register </a>
                                    </li>
                                    
                                    <li>
                                        <a href="#"> <i class="flaticon-verify"></i> Login</a>
                                    </li>
                                </ul>
                            </div>
                             
                            @include('auth.login_register')



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
