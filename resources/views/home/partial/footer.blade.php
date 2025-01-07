 <!-- Footer Area -->
 <footer class="footer-area footer-bg2">
    <div class="footer-middle pt-100 pb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget">
                        <a href="index-4.html" class="logo" style="background-color: #fff; padding:5px;">
                            <img 
                            style="max-width: 100%; max-height:100%; object-fit:cover; 
                            width:210px; height:100px "
                     
                            src="{{ $contactUs ? asset($contactUs->footer_logo) : '' }}" alt="Logo">
                        </a> 
                        <p>
                            {!! $contactUs ? ($contactUs->first_address) : '' !!}
                        </p>
                        <p>
                            {{ $contactUs ? ($contactUs->second_address) : '' }}
                        </p>
                        <ul class="footer-contact-list">
                            {{-- <li>
                                <span>Phone :</span> <a href="tel:+234 (0) 915-341-4314"> +234 (0) 915-341-4314</a>
                            </li>  --}}
                            <li>
                                <span>Email :</span> <a href="{{ $contactUs ? ($contactUs->first_email) : '' }}"> 
                                    {{ $contactUs ? ($contactUs->first_email) : '' }}
                                </a>
                            </li> 
                        </ul>

                        @include('home.pages.social_link')
                    </div>
                </div>

                <div class="col-lg-2 col-md-6">
                    <div class="footer-widget pl-1">
                        <h3>SUPPORT</h3>
                        <ul class="footer-list">
                            <li>
                                 <a href="login-register.html">My Account</a>
                            </li>
                            <li>
                                <a href="f{{ route('home.pages','mentorship')}}">Mentorship</a>
                            </li>
                            <li>
                                <a href="f{{ route('home.pages','membership')}}">Membership</a>
                            </li>
                            <li>
                                <a href="{{ route('register')}}">Register</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget pl-5">
                        <h3>QUICK LINKS</h3>
                        <ul class="footer-list">
                            <li>
                                <a href="{{ route('home.pages','about') }}">About Us</a>
                            </li>
                            <li>
                                <a href="{{ route('home.pages','event') }}">FAQ's</a>
                            </li>
                            <li>
                                <a href="{{ route('home.pages','contact') }}">Contact Us</a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}">Register</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h3>NEWSLETTER</h3>
                        <p>To get the latest news and latest updates from us</p>
                        <div class="footer-form">
                            <form>
                                <div class="row justify-content-center">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" class="form-control" required="" data-error="Please enter your email" placeholder="Your Email*">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="default-btn">
                                            SUBSCRIBE now
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Area End -->

<!-- Copy Right -->
<div class="copy-right-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8">
                <div class="copy-right-text">
                    <p>© {{ date('Y') }} WomeninGRC is Proudly Owned by <a href="https://morgansconsulting.ng/" target="_blank">Morgans Consulting</a></p>
                </div>
            </div> 

            <div class="col-lg-4 col-md-4">
                <div class="copy-right-list">
                    <ul>
                        <li>
                            <a href="{{ route('termsCondition') }}" >
                                Terms of Use
                            </a>
                        </li> 
                        <li>
                            <a href="{{ route('privacyPolicy') }}">
                                Privacy Policy
                            </a>
                        </li> 
                        <li>
                            <a href="{{'blog'}}">
                                Blog
                            </a>
                        </li> 
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Copy Right End -->


<!-- Jquery Min JS -->
<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery.min.js"></script>
 <!-- Bootstrap Bundle JS -->
<script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<!-- Owl Carousel Min JS -->
<script src="{{ asset('assets/js/owl.carousel.min.js')}}"></script>
<!-- Magnific Popup Min JS -->
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
<!-- Wow Min JS -->
<script src="{{ asset('assets/js/wow.min.js')}}"></script>
<!-- Jquery Ui JS -->
<script src="{{ asset('assets/js/jquery-ui.js')}}"></script>
<!-- Meanmenu JS -->
<script src="{{ asset('assets/js/meanmenu.js')}}"></script>
<!-- Nice Select JS -->
<script src="{{ asset('assets/js/jquery.nice-select.min.js')}}"></script>
<!-- Ajaxchimp Min JS -->
<script src="{{ asset('assets/js/jquery.ajaxchimp.min.js')}}"></script>
<!-- Form Validator Min JS -->
<script src="{{ asset('assets/js/form-validator.min.js')}}"></script>
<!-- Contact Form JS -->
<script src="{{ asset('assets/js/contact-form-script.js')}}"></script>
<!-- Custom JS -->
<script src="{{ asset('assets/js/custom.js')}}"></script>

<script>
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "timeOut": "5000"
    };
</script>
<script>
    @if (session('success'))
        toastr.success("{{ session('success') }}");
    @endif
    @if (session('status'))
        toastr.success("{{ session('status') }}");
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>
