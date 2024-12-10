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
                    <h2 class="text-black font-w600">Booking Inspection</h2>
                    <p class="mb-0">Welcome to {{ $contactUs->company_name}} backend</p>
                </div>
                <a href="{{route('admin.inspection.index')}}" class="btn btn-primary rounded light">View Booking Inspection</a>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-12 align-center">
                    <div class="card">
                    
                        <div class="card-body">
                            <div class="basic-form">
                              
                                
                                <form method="POST"  action="#" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Full Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Title" name="title" id="title" disabled value="{{ $inspection->full_name}}" >
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Email" name="email" id="email" disabled value="{{ $inspection->email}}" >
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Phone Number</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Phone" name="phone" id="phone" disabled value="{{ $inspection->phone}}" >
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Inspection Date</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Inspection Date" name="date_of_birth" id="date_of_birth" disabled value="{{ $inspection->inspection_date ? \Carbon\Carbon::parse($inspection->inspection_date)->format('d F Y')  : '' }}" >
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Project</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Project" name="project" id="project" disabled value="{{ $inspection->project}}" >
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
@endsection