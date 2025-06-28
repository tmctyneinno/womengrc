@extends('layouts.app')



@section('content')


        <!-- Inner Banner -->
        <div class="inner-banner" style="background-image: url({{ asset('assets/images/faq/faq.jpg') }});">
   
            <div class="container">
                <div class="inner-title text-center">
                    <h3>Frequently Asked Questions</h3>
                    <ul>
                        <li>
                            <a href="{{ route('home')}}">Home</a>
                        </li>
                        <li>
                            <i class='bx bx-chevron-right'></i>
                        </li>
                        <li>Pages</li>
                        <li>
                            <i class='bx bx-chevron-right'></i>
                        </li>
                        <li>FAQ</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Inner Banner End -->

       
        <div class="faq-area pt-100 pb-70">
            <div class="container">
                <div class="section-title text-center">
                    <span>FAQ</span>
                    <h2>Frequently Asked Questions</h2>
                </div>
                <div class="row pt-45">
                    @forelse ($faqs as $faq)
                        <div class="col-lg-6">
                            <div class="faq-item">
                                <h3>Q: {{ $faq->question }}</h3>
                                <p>
                                    {!! $faq->answer !!}
                                </p>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p class="text-center">No FAQs available at the moment.</p>
                        </div>
                    @endforelse
                </div>
                @if ($faqs->hasPages())
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="pagination-area text-center">
                                @if ($faqs->onFirstPage())
                                    <span class="prev page-numbers disabled">
                                        <i class="bx bx-chevron-left"></i>
                                    </span>
                                @else
                                    <a href="{{ $faqs->previousPageUrl() }}" class="prev page-numbers">
                                        <i class="bx bx-chevron-left"></i>
                                    </a>
                                @endif
        
                                @foreach ($faqs->links()->elements[0] as $page => $url)
                                    @if ($page == $faqs->currentPage())
                                        <span class="page-numbers current" aria-current="page">{{ $page }}</span>
                                    @else
                                        <a href="{{ $url }}" class="page-numbers">{{ $page }}</a>
                                    @endif
                                @endforeach
        
                                @if ($faqs->hasMorePages())
                                    <a href="{{ $faqs->nextPageUrl() }}" class="next page-numbers">
                                        <i class="bx bx-chevron-right"></i>
                                    </a>
                                @else
                                    <span class="next page-numbers disabled">
                                        <i class="bx bx-chevron-right"></i>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        


        <div class="faq-section pt-100 pb-70">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-4">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-6">
                                <div class="contact-card">
                                    <i class="flaticon-position"></i>
                                    <p>
                                        {!! $contactUs ? ($contactUs->first_address) : '' !!}
                                    </p>
                                    <p>
                                        {{ $contactUs ? ($contactUs->second_address) : '' }}
                                    </p>
                                </div>
                            </div> 

                            <div class="col-lg-12 col-md-6">
                                <div class="contact-card">
                                    <i class="flaticon-email"></i>
                                    <p>
                                    <b>Email :</b> 
                                    <a > 
                                        {{ $contactUs ? ($contactUs->first_email) : '' }}
                                        {{ $contactUs ? ($contactUs->second_email) : '' }}
                                    </a>
                                    </p>
                                    {{-- <p><a href="mailto:info@womeningrc.com">Email:info@womeningrc.com</a></p> --}}
                                </div>
                            </div>

                            {{-- <div class="col-lg-12 col-md-6  ">
                                <div class="contact-card">
                                    <i class="flaticon-to-do-list"></i>
                                    <h3><a href="tel:+234 (0) 915-341-4314">+234 (0) 915-341-4314</a></h3>
                                </div>
                            </div> --}}
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="faq-contact">
                            <div class="contact-form">
                                <span>FAQ</span>
                                <h2>Drop A Questions</h2>
                                <form  action="{{ route('faq.submit') }}" method="POST">
                                    @csrf
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <i class="bx bx-user"></i>
                                                <input type="text" name="name" id="name" class="form-control" required="" data-error="Please enter your name" placeholder="Your Name*">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
        
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <i class="bx bx-user"></i>
                                                <input type="email" name="email" id="email" class="form-control" required="" data-error="Please enter your email" placeholder="E-mail*">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
        
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <i class="bx bx-phone"></i>
                                                <input type="text" name="phone_number" id="phone_number" required="" data-error="Please enter your number" class="form-control" placeholder="Your Phone">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
        
                                      
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <i class="bx bx-file"></i>
                                                <select name="msg_subject" id="msg_subject" class="form-control" required data-error="Please select a subject">
                                                    <option value="" disabled selected>Select a Subject*</option>
                                                    @foreach ($faqs as $faq)
                                                        <option value="{{ $faq->id }}">{{ $faq->question }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
        
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <i class="bx bx-envelope"></i>
                                                <textarea name="message" class="form-control" id="message" cols="30" rows="8" required="" data-error="Write your message" placeholder="Your Message"></textarea>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
        
                                        <div class="col-lg-12 col-md-12">
                                            <button type="submit" class="default-btn border-radius disabled">
                                                Send Message
                                                <i class="bx bx-plus"></i>
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
            </div>
        </div>
       
     
@endsection