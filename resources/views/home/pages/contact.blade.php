@extends('layouts.app')

@section('content')


<!-- Inner Banner -->
<div class="inner-banner" style="background-image: url({{ asset('assets/images/banner/contact.jpg') }});"> 
    <div class="container">
        <div class="inner-title text-center">
            <h3>Contact Us</h3>
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <i class='bx bx-chevron-right'></i>
                </li>
                <li>Pages</li>
                <li>
                    <i class='bx bx-chevron-right'></i>
                </li>
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
                <div class="col-lg-4 col-md-6">
                    <div class="contact-card">
                        <i class="flaticon-position"></i>
                        <h3>2nd Floor, 1 Adeola Adeoye Street, Toyin Street, Ikeja, Lagos, Nigeria.</h3>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="contact-card">
                        <i class="flaticon-email"></i>
                        <h3><a href="#">Email:<span class="__cf_email__" > info@womeningrc.com</span></a></h3>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6  ">
                    <div class="contact-card">
                        <i class="flaticon-to-do-list"></i>
                        <h3><a href="tel:+234 (0) 915-341-4314">+234 (0) 915-341-4314</a></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact Area End --> 

<!-- Map Area Two -->
<div class="contact-map">
    <div class="container-fluid m-0 p-0">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.4079674125956!2d3.342102709296962!3d6.596112122290335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b922431bb3a15%3A0xc7b0fa06a5f9ff0b!2s2nd%20Floor%2C%201%20Adeola%20Adeoye%20St%2C%20Opebi%2C%20Ikeja%20101233%2C%20Lagos!5e0!3m2!1sen!2sng!4v1733225323886!5m2!1sen!2sng"
         {{-- width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"  --}}
         {{-- referrerpolicy="no-referrer-when-downgrade" --}}
        >
        </iframe>
         <div class="contact-wrap">
            <div class="contact-form">
                <span>SEND MESSAGE</span>
                <h2>Contact With Us</h2>
                <form id="contactForm">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <i class='bx bx-user'></i>
                                <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name" placeholder="Your Name*">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <i class='bx bx-user'></i>
                                <input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email" placeholder="E-mail*">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <i class='bx bx-phone'></i>
                                <input type="text" name="phone_number" id="phone_number" required data-error="Please enter your number" class="form-control" placeholder="Your Phone">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <i class='bx bx-file'></i>
                                <input type="text" name="msg_subject" id="msg_subject" class="form-control" required data-error="Please enter your subject" placeholder="Your Subject">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <i class='bx bx-envelope'></i>
                                <textarea name="message" class="form-control" id="message" cols="30" rows="8" required data-error="Write your message" placeholder="Your Message"></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <button type="submit" class="default-btn border-radius">
                                Send Message
                                <i class='bx bx-plus'></i>
                            </button>
                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Map Area Two End -->

@endsection