@extends('layouts.admin')
@section('content')

<div id="main-wrapper">

   
    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row --> 
        <div class="container-fluid">
            <div class="form-head d-md-flex mb-sm-4 mb-3 align-items-start">
                <div class="me-auto d-lg-block d-block">
                    <h2 class="text-black font-w600">Dashboard</h2>
                    <p class="mb-0">Welcome to {{ $contactUs ? $contactUs->company_name : ''}} backend</p>
                </div>
                <a href="{{ route('admin.index') }}" class="btn btn-primary rounded light">Refresh</a>
            </div>
            <div class="row">
                <div class="col-xl-12 col-xxl-12"> 
                    <div class="row">
                        <div class="col-xl-3">
                            <div class="card bg-danger property-bx text-white">
                                <div class="card-body">
                                    <div class="media d-sm-flex d-block align-items-center">
                                        <span class="me-4 d-block mb-sm-0 mb-3">
                                           
                                        </span>
                                        <div class="media-body mb-sm-0 mb-3 me-5">
                                            <h4 class="fs-22 text-white">Total Users</h4>
                                            <div class="progress mt-3 mb-2" style="height:8px;">
                                                 
                                            </div>
                                            <span class="fs-13">
                                                <a href="{{ route('admin.users.index') }}" class="text-white">Click here</a>
                                            </span>

                                        </div>
                                        <span class="fs-35 font-w500">{{ $users }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="card bg-danger property-bx text-white">
                                <div class="card-body">
                                    <div class="media d-sm-flex d-block align-items-center">
                                        <span class="me-4 d-block mb-sm-0 mb-3">
                                           
                                        </span>
                                        <div class="media-body mb-sm-0 mb-3 me-5">
                                            <h4 class="fs-22 text-white">Total Advisory</h4>
                                            <div class="progress mt-3 mb-2" style="height:8px;">
                                                 
                                            </div>
                                            <span class="fs-13">
                                                <a href="{{ route('admin.users.index') }}" class="text-white">Click here</a>
                                            </span>

                                        </div>
                                        <span class="fs-35 font-w500">{{ $advisory }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                        <div class="col-sm-12 col-md-3">
                            <div class="card  property-card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="media-body me-3">
                                            <h2 class="fs-28 text-black font-w600">{{ $facilitator }}</h2>
                                            <p class="property-p mb-0 text-black font-w500">Total Facilitator </p>
                                            <span class="fs-13">
                                                <a href="{{ route('admin.users.index') }}" class="text-muted">Click here</a>
                                            </span>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <div class="card property-card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="media-body me-3">
                                            <h2 class="fs-28 text-black font-w600">{{ $guests }}</h2>
                                            <p class="property-p mb-0 text-black font-w500">Total Guests </p>
                                            <span class="fs-13">
                                                <a href="{{ route('admin.users.index') }}" class="text-muted">Click here</a>
                                            </span>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <div class="card property-card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="media-body me-3">
                                            <h2 class="fs-28 text-black font-w600"> {{ $events }} </h2>
                                            <p class="property-p mb-0 text-black font-w500">Total Events </p>
                                            <span class="fs-13"><a href="{{ route('admin.event.index') }}" class="text-muted">Click here</a></span>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <div class="card property-card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="media-body me-3">
                                            <h2 class="fs-28 text-black font-w600">{{ $blogs }}</h2>
                                            <p class="property-p mb-0 text-black font-w500">Total Blog Posts</p>
                                            <span class="fs-13"><a href="{{ route('admin.blog.index') }}" class="text-muted">Click here</a></span>
                                      
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <div class="card property-card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="media-body me-3">
                                            <h2 class="fs-28 text-black font-w600">{{ $advisory_boards }}</h2>
                                            <p class="property-p mb-0 text-black font-w500">Total  Advisory Board Member</p>
                                            <span class="fs-13"><a href="{{ route('admin.advisory.index') }}" class="text-muted">Click here</a></span>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <div class="card property-card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="media-body me-3">
                                            <h2 class="fs-28 text-black font-w600">{{ $contactForm ?? 0 }}</h2>
                                            <p class="property-p mb-0 text-black font-w500">Total  Contact Forms</p>
                                            <span class="fs-13"><a href="{{ route('admin.contactForm.index') }}" class="text-muted">Click here</a></span>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
               
                <div class="col-xl-12 col-xxl-12">
                    <div class="row">
                        
                        <div class="col-sm-12 col-md-3">
                            <div class="card property-card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="media-body me-3">
                                            <h2 class="fs-28 text-black font-w600">{{ $contactForm ?? 0 }}</h2>
                                            <p class="property-p mb-0 text-black font-w500">Total Recognition </p>
                                            <span class="fs-13"><a href="{{ route('admin.recognition.index') }}" class="text-muted">Click here</a></span>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-12 col-md-3">
                            <div class="card property-card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="media-body me-3">
                                            <h2 class="fs-28 text-black font-w600">{{ $contactForm ?? 0 }}</h2>
                                            <p class="property-p mb-0 text-black font-w500"> Total FAQs </p>
                                            <span class="fs-13"><a href="{{ route('admin.faq.index') }}" class="text-muted">Click here</a></span>
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
    <!--**********************************
        Content body end
    ***********************************-->

</div>

@endsection
