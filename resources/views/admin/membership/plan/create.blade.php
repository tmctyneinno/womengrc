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
                    <h2 class="text-black font-w600">Membership Plan</h2>
                    <p class="mb-0">Welcome to {{ $contactUs->company_name}} backend</p>
                </div>
                <a href="{{route('admin.membership.plan.index')}}" class="btn btn-primary rounded light">View Projects status</a>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-12 align-center">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Membership Plan </h4>
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
                                <div class="compose-content">
                                    <form method="POST" action="{{ route('admin.membership.plan.store') }}" enctype="multipart/form-data" class="">
                                        @csrf
                                        
                                        <div class="mb-3 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label">Membership Type</label>
                                            <div class="col-sm-9">
                                                <select class="form-select" name="type" id="type" required>
                                                    <option value="individual" {{ isset($membership) && $membership->type == 'individual' ? 'selected' : '' }}>Individual</option>
                                                    <option value="corporate" {{ isset($membership) && $membership->type == 'corporate' ? 'selected' : '' }}>Corporate</option>
                                                </select>
                                            </div>
                                        </div>
                                       
                                        <div class="mb-3 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label">Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="Name" name="name" id="name" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label">Description (Target Audience)</label>
                                            <div class="col-sm-9">
                                                <textarea cols="4" type="text" class="form-control" name="target_audience" id="video_link" required></textarea>
                                               
                                            </div>
                                        </div>
                    
                                        <div class="mb-3 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label">Key Benefits (One per line)</label>
                                            <div class="col-sm-9">
                                                <textarea cols="4" type="text" class="form-control" name="key_benefits" id="video_link" required></textarea>
                                               
                                            </div>
                                        </div>
                    
                                        <div class="mb-3 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label">Annual Fee (£)</label>
                                            <div class="col-sm-9">
                                                <input  type="number" class="form-control" placeholder="0.00" name="annual_fee" id="maxStaffInput" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label">Max Staff Accounts</label>
                                            <div class="col-sm-9">
                                               <input type="number" class="form-control" placeholder="Only for corporate" name="max_staff_accounts" id="maxStaffInput" value="{{ $membership->max_staff_accounts ?? old('max_staff_accounts') }}" disabled>
                                            </div>
                                        </div>

                                        <div class="mb-3 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label">Status</label>
                                            <div class="col-sm-9">
                                                <select class="form-select" name="is_active" required>
                                                    <option value="1" {{ isset($membership) && $membership->is_active ? 'selected' : '' }}>Active</option>
                                                    <option value="0" {{ isset($membership) && !$membership->is_active ? 'selected' : '' }}>Inactive</option>
                                                </select>
                                            </div>
                                        </div>  
                                        
                                        
                                        <div class="text-start mt-4 mb-2">
                                            <button class="btn btn-primary btn-sl-sm me-2" type="submit" ><span class="me-2"></span>Send</button>
                                        </div>
                    
                                    </form>
                                   
                                </div>
                                <script>
                                    function submitForm() {
                                        document.querySelector('.dropzone').submit();
                                    }
                                </script>
                                <script>
                                    function previewImage(event) {
                                        var preview = document.getElementById('image-preview');
                                        preview.innerHTML = ''; // Clear any existing previews
                                        
                                        var files = event.target.files;
                                        var imagesCount = files.length;
                                    
                                        for (var i = 0; i < imagesCount; i++) {
                                            var file = files[i];
                                            var reader = new FileReader();
                                    
                                            reader.onload = (function(file) {
                                                return function(e) {
                                                    var img = document.createElement('img');
                                                    img.src = e.target.result;
                                                    img.style.maxWidth = '200px'; // Adjust max width as needed
                                                    img.style.margin = '5px';
                                                    img.classList.add('img-thumbnail');
                                                    preview.appendChild(img);
                                                };
                                            })(file);
                                    
                                            reader.readAsDataURL(file);
                                        }
                                    }
                                    </script>
                                    
                            
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