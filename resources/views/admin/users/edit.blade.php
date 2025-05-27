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
                    <h2 class="text-black font-w600">Users </h2>
                    <p class="mb-0">Welcome to {{ $contactUs->company_name}} Backend</p>
                </div>
                <a href="{{route('admin.users.index')}}" class="btn btn-primary rounded light">View Users</a>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6 align-center">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit User </h4>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back</a>

                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                @if(session('success'))
                                    <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                
                                
                                <form method="POST" action="{{ route('admin.users.update', $user) }}">
                                    @csrf 
                                    @method('PUT')
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Full Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" disabled placeholder="Enter Full name" name="name" id="name" value="{{ $user->name}}" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label"> Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" disabled placeholder="Enter Email" name="email" id="name" value="{{ $user->email }}" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label"> Role</label>
                                        <div class="col-sm-9"> 
                                            <select name="role" id="role" class="form-control">
                                                <option value="" selected>--Select --</option>
                                                <option value="advisory_member" {{ $user->role == 'advisory_member' ? 'selected' : '' }}>Advisory Member</option>
                                                <option value="guests" {{ $user->role == 'guests' ? 'selected' : '' }}>Guest</option>
                                                <option value="mentor" {{ $user->role == 'mentor' ? 'selected' : '' }}>Mentor</option>
                                                <option value="mentee" {{ $user->role == 'mentee' ? 'selected' : '' }}>Mentee</option>
                                            </select> 
                                        </div>
                                    </div> 
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label"> LinkedIn Profile</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" disabled placeholder="Enter Email" name="email" id="name" value="{{ $user->linkedin }}" required>
                                        </div>
                                    </div>
                                     <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label"> Twitter Profile</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" disabled placeholder="Enter Email" name="email" id="name" value="{{ $user->twitter_profile }}" required>
                                        </div>
                                    </div>
                                    
                                   
                                    <div class="mb-3 row">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Update Role</button>
                                        </div> 
                                    </div>
   
                                </form>
                                
                                <script>
                                    function previewImage(event) {
                                        const input = event.target;
                                        const preview = document.getElementById('image-preview');
                                        
                                        if (input.files && input.files[0]) {
                                            const reader = new FileReader();
                                            
                                            reader.onload = function(e) {
                                                preview.src = e.target.result;
                                                preview.style.display = 'block';
                                            };
                                            
                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }
                                </script>
                                <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
                                <script>
                                    CKEDITOR.replace('content');
                                </script>

                             
                            </div>
                            
                        </div>
                    </div>
                </div>
                 <div class="col-xl-6 col-lg-6 align-center">
                    <div class="card">
                        <div class="card-header">
                            {{-- <h4 class="card-title">Edit User </h4> --}}
                            @if(!$user->is_admin)
                                <form method="POST" action="{{ route('admin.users.make-admin', $user->id) }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-success">Make Admin</button>
                                </form>
                            @else
                                <form method="POST" action="{{ route('admin.users.remove-admin', $user->id) }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Remove Admin</button>
                                </form>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                              
                                <div class="mb-3 row align-items-center">
                                    <label class="col-sm-3 col-form-label form-label"> LinkedIn Profile</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" disabled placeholder="Enter Email" name="email" id="name" value="{{ $user->linkedin_profile }}" required>
                                    </div>
                                </div>
                                <div class="mb-3 row align-items-center">
                                    <label class="col-sm-3 col-form-label form-label"> Twitter Profile</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" disabled placeholder="Enter Email" name="email" id="name" value="{{ $user->twitter_profile }}" required>
                                    </div>
                                </div>
                                <div class="mb-3 row align-items-center">
                                    <label class="col-sm-3 col-form-label form-label"> Facebook Profile</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" disabled placeholder="Enter Email" name="email" id="name" value="{{ $user->facebook_profile }}" required>
                                    </div>
                                </div>
                                 <div class="mb-3 row align-items-center">
                                    <label class="col-sm-3 col-form-label form-label"> Bio</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control"  id="bio" name="bio" rows="5">{{ old('bio', $user->bio ?? '') }}</textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row align-items-center">
                                    <label class="col-sm-3 col-form-label form-label"> Expertise</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" disabled placeholder="" name="email" id="name" value="{{ $user->expertise }}" required>
                                    </div>
                                </div>
                                <div class="mb-3 row align-items-center">
                                    <label class="col-sm-3 col-form-label form-label"> Years of Experience</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" disabled placeholder="" name="email" id="name" value="{{ $user->years_of_experience }}" required>
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
@endsection

