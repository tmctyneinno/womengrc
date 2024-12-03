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
                    <img src="assets/img/login-img.jpg" alt="Images">
                </div>
            </div>

            <div class="col-lg-5 col-xl-6">
                <div class="user-section text-center">
                    <div class="user-conten ">
                        <img src="assets/img/logo/logo3.png" alt="">
                        <h2>Welcome <b>To Women GRC</b></h2>
                    </div>
                    <div class="tab user-tab">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-12">
                                <ul class="tabs active">
                                    <li class="current">
                                        <a href="#"> <i class="flaticon-contact"></i> Login</a>
                                    </li>
                                    
                                    <li>
                                        <a href="#"> <i class="flaticon-verify"></i> Register</a>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="col-lg-12 col-md-12">
                                <div class="tab_content current active">
                                    <div class="tabs_item current">
                                        <div class="user-all-form">
                                            <div class="contact-form">
                                                <form  method="POST" action="{{ route('login') }}"  >
                                                    @csrf
                                                    <div class="row justify-content-center">
                                                        <div class="col-lg-12 ">
                                                            <div class="form-group">
                                                                <i class="bx bx-user"></i>
                                                                <input type="text" name="name" id="name" class="form-control" required="" data-error="Please enter your Email" placeholder="Email" required autocomplete="email" autofocu>
                                                                @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <i class="bx bx-lock-alt"></i>
                                                                <input class="form-control" type="password" name="password" placeholder="Password" required autocomplete="current-password">
                                                                @error('password')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12 col-md-12 text-center">
                                                            <button type="submit" class="default-btn user-all-btn disabled">
                                                                Login
                                                            </button>
                                                        </div>
                
                                                        <div class="col-lg-6 col-sm-6 form-condition">
                                                            <div class="agree-label">
                                                                <input type="checkbox"  name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                                <label for="remember">
                                                                    Remember Me
                                                                </label>
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-lg-6 col-sm-6">
                                                            @if (Route::has('password.request'))
                                                                <a class="forget" href="{{ route('password.request') }}">
                                                                    {{ __('Forgot Your Password?') }}
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </form>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tabs_item">
                                        <div class="user-all-form">
                                            <div class="contact-form">
                                                <form id="contactForm">
                                                    <div class="row justify-content-center">
                                                        <div class="col-lg-12 ">
                                                            <div class="form-group">
                                                                <i class="bx bx-user"></i>
                                                                <input type="text" name="name" id="name" class="form-control" required="" data-error="Please enter your Username" placeholder="Username">
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
