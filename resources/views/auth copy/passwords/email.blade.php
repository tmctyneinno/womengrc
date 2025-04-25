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
                    <div class="user-conten pt-5">
                        <img 
                        style="max-width: 100%; max-height:100%; object-fit:cover; 
                            width:100px; height:70px "
                        src="{{ $contactUs ? asset($contactUs->site_logo) : '' }}" alt="">
                        <h2>Welcome To <b>Women GRC & Financial Crime Prevention</b> (WGRCFP)</h2>  
                    </div> 
                    <div class="tab user-tab">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-12">
                                <ul class="tabs active">
                                    <li class="current">
                                        <a href="#">  {{ __('Reset Password') }}</a>
                                    </li>
                                </ul>
                            </div>
                             
                            <div class="col-lg-12 col-md-12">
                                <div class="tab_content current active">
                                    <div class="tabs_item current"> 
                                        <div class="user-all-form">
                                            <div class="contact-form">
                                                <form method="POST" action="{{ route('password.email') }}">
                                                    @csrf
                                                    <div class="row justify-content-center">
                                                        <!-- Email Input -->
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <i class="bx bx-user"></i>
                                                                <input 
                                                                    id="email"
                                                                    placeholder="Email"  type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                            </div>
                                                           
                                                        </div>
                                                
                                                        <!-- Submit Button -->
                                                        <div class="col-lg-12 col-md-12 text-center">
                                                            <button type="submit" class="default-btn user-all-btn">
                                                                {{ __('Send Password Reset Link') }}
                                                            </button>
                                                        </div>
                                                
                                                       
                                                
                                                       
                                                    </div>
                                                </form>
                                                
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tabs_item">
                                        <div class="user-all-form">
                                            <div class="contact-form">
                                                <form  method="POST" action="{{ route('register.post') }}">
                                                    @csrf
                                                    <div class="row justify-content-center">
                                                        <div class="col-lg-12 ">
                                                            <div class="form-group">
                                                                <i class="bx bx-user"></i>
                                                                <input type="text" name="name" id="name" class="form-control" required="" 
                                                                data-error="Please enter your Username" placeholder="Username" autocomplete="off">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <i class="flaticon-email-2"></i>
                                                                <input type="email" name="email" id="email" class="form-control" required="" data-error="Please enter email" placeholder="Email">
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <i class="bx bx-lock-alt"></i>
                                                                <input class="form-control" type="password" name="password" placeholder="Password">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <i class="bx bx-lock-alt"></i>
                                                                <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12 col-md-12 text-center">
                                                            <button type="submit" class="default-btn  user-all-btn">
                                                                Register 
                                                            </button>
                                                        </div>

                                                        <div class="col-12">
                                                            <p class="account-desc">
                                                                Already have an account? 
                                                                <a href="#">Login</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </form>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
