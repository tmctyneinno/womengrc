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
                    <h2 class="text-black font-w600">Contact</h2>
                    <p class="mb-0">Welcome to {{ $contactUs->company_name}} backend</p>
                </div> 
                <a href="{{route('admin.contactForm.index')}}" class="btn btn-primary rounded light">View Contact</a>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-12 align-center">
                    <div class="card">
                    
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="POST"  action="#" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">First Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Title" name="title" id="title" disabled value="{{ $contact->first_name}}" >
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Last Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Title" name="title" id="title" disabled value="{{ $contact->first_name}}" >
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Email" name="email" id="email" disabled value="{{ $contact->email}}" >
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Phone Number</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Phone" name="phone" id="phone" disabled value="{{ $contact->phone}}" >
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Message</label>
                                        <div class="col-sm-9">
                                            <textarea name="content" id="content" class="form-control" required>{{ $contact->message}}</textarea>
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