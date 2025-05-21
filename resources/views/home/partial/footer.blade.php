<style>
    .footer-bg2 {
    position: relative; /* Ensure the pseudo-element is positioned correctly */
    padding-top: 20px; /* Add some padding at the top to make space for the border */
}

.footer-bg2::before {
    content: ''; /* Required for pseudo-elements */
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px; /* Height of the border */
    background: linear-gradient(90deg, #B03436, #B03436); /* Gradient border effect */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Optional: Add a shadow for depth */
}
</style>
<!-- Footer Area -->
 <footer class="footer-area footer-bg2" style="color: #000">
    <div class="footer-middle pt-45 pb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget">
                        <a href="{{ route('home')}}" class="logo" style="background-color: #fff; color:#000; padding:5px;">
                            <img
                            style="max-width: 100%; max-height:100%; object-fit:cover;
                            width:210px; height:100px "

                            src="{{ $contactUs ? asset($contactUs->footer_logo) : '' }}" alt="Logo">
                        </a>
                        <p style="color: #000">
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
                                <a href="{{ route('home.pages','blog')}}">Blog</a>
                            </li>
                            <li>
                                <a href="{{ route('home.pages','facilitators')}}">Facilitators</a>
                            </li>
                            <li>
                                <a href="{{ route('home.pages','mentorship')}}">Mentorship</a>
                            </li>
                            <li>
                                <a href="{{ route('home.pages','membership')}}">Membership</a>
                            </li>
                            <li>
                                <a href="{{ route('login')}}">Register</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget pl-5">
                        <h3>QUICK LINKS</h3>
                        <ul class="footer-list">
                             <li>
                                <a href="{{ route('home.pages','terms-of-reference') }}">Terms of Reference</a>
                            </li>
                            <li>
                                <a href="{{ route('home.pages','code-of-conduct') }}">Code of Conduct</a>
                            </li>
                            <li>
                                <a href="{{ route('home.pages','road-map') }}">Road Map</a>
                            </li>
                            <li>
                                <a href="{{ route('home.pages','about') }}">About Us</a>
                            </li>
                            <li>
                                <a href="{{ route('home.pages','faqs') }}">FAQ's</a>
                            </li>
                            <li>
                                <a href="{{ route('home.pages','contact') }}">Contact Us</a>
                            </li>
                            <li>
                                <a href="{{ route('login') }}">Login</a>
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
        <div class="row ">
            <div class="col-lg-6 col-md-6">
                <div class="copy-right-text">
                    <p><snap style="color: #B03436">© {{ date('Y') }} WGRCFP by </snap><a href="https://morgansconsulting.ng/" target="_blank" style="text-decoration: none">THE MORGANS CONSORTIUM. </a><span style="color: #B03436"> Designed by </span> <a href="https://tynesideinnovation.com/" style="text-decoration: none" target="_blank">Tyneside Innovation</a> </p>
                </div>
            </div>
            <div class="col-lg-2 col-md-2"></div>
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
 <!-- Include Google reCAPTCHA -->
 <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.key') }}"></script>

 <script src="{{ asset('js/auth.js') }}"></script>

 @if (session('recaptcha_error'))
    <script>
        $(document).ready(function() {
            toastr.error("{{ session('recaptcha_error') }}");
        });
    </script>
 @endif
