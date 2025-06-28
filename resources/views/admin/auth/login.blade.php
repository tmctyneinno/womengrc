<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
	<title>{{  $contactUs ? asset($contactUs->company_name) : ''}}</title>
 
	<!-- Meta --> 
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="DexignZone">
	<meta name="robots" content="index, follow">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/logo/CIFPN_favi.jpg')}}">
	<meta name="keywords" content="admin, dashboard, admin dashboard, admin template, template, admin panel, administration, analytics, bootstrap, hospital admin, modern, property, real estate, responsive, creative, retina ready, modern Dashboard">
	<meta name="description" content="Your Ultimate Real Estate Admin Dashboard Template. Streamline property management, analyze market trends, and boost productivity with our intuitive and feature-rich solution. Elevate your real estate business today!">
   
	<meta property="og:description" content="Your Ultimate Real Estate Admin Dashboard Template. Streamline property management, analyze market trends, and boost productivity with our intuitive and feature-rich solution. Elevate your real estate business today!">
	<meta property="og:image" content="https://omah.dexignzone.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">
   

	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{  $contactUs ? asset($contactUs->company_name) : '' }}">
    <link href="{{ asset('/backend/css/style.css')}}" rel="stylesheet">

</head>

<body>
    <div class="fix-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6">
                    <div class="card mb-0 h-auto">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <a href="#">
                                    <img class="logo-auth"src="{{ $contactUs ? asset($contactUs->site_logo) : ''}}" width="20" alt="">
                                </a> 
                            </div> 

                            @if(session('success'))
                                <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <h4 class="text-center mb-4">Admin sign in</h4>
                            <form action="{{route('admin.login.submit')}}" method="POST">
                                @csrf
                                <div class="form-group mb-4">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" id="email" placeholder="Enter email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> 
                            
                               <div class="form-group mb-3 mb-sm-4">
                                    <label class="form-label" for="password">Password</label>
                                    <div class="position-relative">
                                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
                                        <span class="show-pass eye">
                                            <i class="fa fa-eye-slash"></i>
                                            <i class="fa fa-eye"></i>
                                        </span>
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            
                               
                            
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                                </div>
                            </form>
                            
                            {{-- <div class="new-account mt-3">
                                <p>Don't have an account? <a class="text-primary" href="./page-register.html">Sign up</a></p>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('backend/vendor/global/global.min.js')}}"></script>
	<script src="{{ asset('backend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{ asset('backend/js/custom.min.js')}}"></script>
    <script src="{{ asset('backend/js/deznav-init.js')}}"></script>

</body>

</html>