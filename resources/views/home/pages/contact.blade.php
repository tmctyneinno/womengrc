@extends('layouts.app')

@section('content')

<!-- Inner Banner -->
<div class="inner-banner" style="background-image: url({{ asset('assets/images/banner/conference.jpg') }});">
    <div class="container">
        <div class="inner-title text-center">
            <h3>Contact Us</h3>
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li> 
                <li><i class='bx bx-chevron-right'></i></li>
                <li>Pages</li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>Contact</li>
            </ul>
        </div>
    </div>
</div>
<!-- Inner Banner End -->

<!-- Contact Area -->
<div class="contact-area">
    <div class="container">
        <div class="contact-max">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6">
                    <div class="contact-card">
                        <i class="flaticon-position"></i>
                        <h3>{!! $contactUs ? $contactUs->first_address : '' !!}</h3>
                        <h3>{!! $contactUs ? $contactUs->second_address : '' !!}</h3>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="contact-card">
                        <i class="flaticon-email"></i>
                        <h3>
                            <a href="mailto:{{ $contactUs ? $contactUs->first_email : '' }}">
                                Email: {{ $contactUs ? $contactUs->first_email : '' }}
                            </a>
                        </h3>
                    </div>
                </div>

                {{-- Optional phone section --}}
                {{-- 
                <div class="col-lg-4 col-md-6">
                    <div class="contact-card">
                        <i class="flaticon-to-do-list"></i>
                        <h3>
                            <a href="tel:{{ $contactUs ? $contactUs->first_phone : '' }}">
                                {{ $contactUs ? $contactUs->first_phone : '' }}
                            </a>
                        </h3>
                    </div>
                </div> 
                --}}
            </div>
        </div>
    </div>
</div>
<!-- Contact Area End --> 

<!-- Map Area Two -->
<div class="contact-map">
    <div class="container-fluid m-0 p-0">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.4079674125956!2d3.342102709296962!3d6.596112122290335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b922431bb3a15%3A0xc7b0fa06a5f9ff0b!2s2nd%20Floor%2C%201%20Adeola%20Adeoye%20St%2C%20Opebi%2C%20Ikeja%20101233%2C%20Lagos!5e0!3m2!1sen!2sng!4v1733225323886!5m2!1sen!2sng"
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>

        <div class="contact-wrap">
            <div class="contact-form">
                <span>SEND MESSAGE</span>
                <h2>Contact With Us</h2>
                <form id="contactForm" method="POST" action="{{ route('contact.submit') }}">
                    @csrf
                    <input type="hidden" name="recaptcha_token" id="recaptcha_token">

                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <i class='bx bx-user'></i>
                                <input type="text" name="name" id="name" class="form-control" required placeholder="Your Name*">
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <i class='bx bx-user'></i>
                                <input type="email" name="email" id="email" class="form-control" required placeholder="E-mail*">
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <i class='bx bx-phone'></i>
                                <input type="text" name="phone_number" id="phone_number" class="form-control" required placeholder="Your Phone">
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <i class='bx bx-file'></i>
                                <input type="text" name="msg_subject" id="msg_subject" class="form-control" required placeholder="Your Subject">
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <i class='bx bx-envelope'></i>
                                <textarea name="message" id="message" class="form-control" rows="8" required placeholder="Your Message"></textarea>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <button id="submitBtn" type="submit" class="default-btn border-radius">
                                Send Message <i class='bx bx-plus'></i>
                            </button>
                            {{-- Success/Error messages will be shown via Toastr after redirect --}}
                        </div>
                    </div>
                </form>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const contactForm = document.getElementById('contactForm');
                        const submitBtn = document.getElementById('submitBtn');
                        // const msgSubmit = document.getElementById('msgSubmit'); // No longer needed for inline messages

                        if (!contactForm || !submitBtn) return;

                        contactForm.addEventListener('submit', function (e) {
                            e.preventDefault(); // Prevent default submission to run reCAPTCHA first
                            submitBtn.disabled = true; // Disable button during processing
                            submitBtn.innerHTML = 'Sending... <i class="bx bx-loader bx-spin"></i>';
 
                            grecaptcha.ready(function () {
                                grecaptcha.execute('{{ config("services.recaptcha.key") }}', { action: 'submit' }).then(function (token) {
                                    document.getElementById('recaptcha_token').value = token;

                                    const formData = new FormData(contactForm);

                                    // Submit the form using standard browser submission
                                    contactForm.submit();

                                }).catch(function (error) {
                                    // Handle potential errors during reCAPTCHA execution
                                    console.error('reCAPTCHA execution failed:', error);
                                    toastr.error('reCAPTCHA verification failed. Please try again.'); // Use Toastr for errors
                                    // Re-enable the button if reCAPTCHA fails before submission
                                    submitBtn.disabled = false;
                                    submitBtn.innerHTML = 'Send Message <i class="bx bx-plus"></i>';
                                });
                            });
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</div>
<!-- Map Area Two End -->

<!-- Social Media Section -->
<div class="contact-area">
    <div class="container">
        @include('home.pages.social-media')
    </div>
</div>

@endsection
