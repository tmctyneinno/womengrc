<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <!-- Mirrored from templates.hibootstrap.com/downtown/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Dec 2024 12:02:48 GMT -->
  <head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css --> 
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
    <!-- Owl Carousel CSS --> 
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css')}}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/flaticon.css')}}">
    <!-- Boxicons CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/boxicons.min.css')}}">
    <!-- Magnific-Popup CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css')}}">
    <!-- Animate Min CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css')}}">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css')}}">
    <!-- Jquery Ui CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css')}}">
    <!-- Nice-Select CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.min.css')}}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css')}}">
    <!-- Theme Dark CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme-dark.css')}}">
    {{-- @viteReactRefresh  
    @vite('resources/js/app.jsx') --}}

    <!-- Add Toastr CSS --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
 
    <title>{{ $contactUs ? $contactUs->company_name : '' }}</title>
    <meta property="og:title" content="{{ $contactUs ? asset($contactUs->company_name) : '' }}">


    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ $contactUs ? asset($contactUs->favicon) : ''}}">
    <style>
        .navbar-custom{
            background-color: #fff !important;
        }
    </style>
</head>
<body>
    <x-google-translate />
    @include('home.partial.navbar')
    <div>
        @yield('content')
    </div>
    @include('home.partial.footer')

</body>
</html>
