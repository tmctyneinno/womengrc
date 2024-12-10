@extends('layouts.app')



@section('content')


        <!-- Inner Banner -->
        <div class="inner-banner inner-bg6">
            <div class="container">
                <div class="inner-title text-center">
                    <h3>Mission</h3>
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
                        <li>Mission</li>
                    </ul>
                </div>
            </div> 
        </div>
        <!-- Inner Banner End -->

        
        <div class="application-area-two pt-100 pb-70">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-7">
                        <div class="application-content">
                            <div class="section-title" style="text-align: justify">
                                <h2>
                                    Mission statement
                                </h2>
                                <p>
                                    {!! $visionMission->mission  !!}
                                </p>

                               
                            </div>
                           
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="application-img-two">
                            <img src="assets/img/mobile2.png" alt="Images">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <!-- Client Area -->
        <div class="client-area pt-100">
            <div class="container">
                <div class="client-bg">
                    <div class="client-slider owl-carousel owl-theme">
                        <div class="client-item">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-lg-6">
                                    <div class="client-img">
                                        <img src="assets/img/testimonial/testimonial1.png" alt="Images">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="client-content">
                                        <h3>Oli Rubion</h3>
                                        <span>Rubion Inc</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing  sit ut fugit sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="client-item">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-lg-6">
                                    <div class="client-img">
                                        <img src="assets/img/testimonial/testimonial2.png" alt="Images">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="client-content">
                                        <h3>Sanaik Tubi</h3>
                                        <span>Arbon Restaurant</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing  sit ut fugit sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="client-item">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-lg-6">
                                    <div class="client-img">
                                        <img src="assets/img/testimonial/testimonial3.png" alt="Images">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="client-content">
                                        <h3>Mashrof Ruin</h3>
                                        <span>Pice Cafe</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing  sit ut fugit sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Client Area End -->

       
     
@endsection