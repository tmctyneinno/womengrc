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
                    <h2 class="text-black font-w600">Project</h2>
                    <p class="mb-0">Welcome to Archway Home backend</p>
                </div>
                <a href="{{route('admin.project.index')}}" class="btn btn-primary rounded light">View Project</a>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-12 align-center">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Update Project</h4>
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
                
                                
                                <form method="POST"  action="{{ route('admin.project.update',  $project->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @if(isset($project))
                                        @method('PUT')
                                    @endif
                                     <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Title"  value="{{ old('title', $project->title ?? '') }}"  name="title" id="title" required>
                                        </div>
                                    </div>
                                   <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Sub title</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Sub title" value="{{ old('title', $project->sub_title ?? '') }}" name="sub_title" id="sub_title" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Location</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Location" name="location" id="location" value="{{ $project->location }}"  required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">First Land Size</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Land size" name="land_size"  id="land_size" value="{{ $project->land_size }}"  required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">First Land Price</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="First Land Price" name="land_price"  id="land_price" value="{{ $project->land_price }}"  required>
                                        </div> 
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Upload First Land Payment Plan</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" placeholder="" name="land_payment_plan" id="land_payment_plan" accept="image/png, image/jpeg, image/gif" >
                                            @if(isset($project) && $project->land_payment_plan)
                                                <img id="image-preview" src="{{ isset($project) ? asset($project->land_payment_plan) : '' }}" alt="Image" class="img-thumbnail mt-2" style="{{ isset($project) ? '' : 'display:none;' }} max-width: 200px;">
                                            @endif
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Second Land Size</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Second Land size" name="second_land_size"  id="second_land_size" value="{{ $project->second_land_size }}"  required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Second Land Price</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Second Land Price" name="second_land_price"  id="second_land_price" value="{{ $project->second_land_price }}"  required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Upload Land Second Payment Plan</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" placeholder="" name="second_land_payment_plan" id="land_payment_plan" accept="image/png, image/jpeg, image/gif" >
                                            @if(isset($project) && $project->second_land_payment_plan)
                                                <img id="image-preview" src="{{ isset($project) ? asset($project->second_land_payment_plan) : '' }}" alt="Image" class="img-thumbnail mt-2" style="{{ isset($project) ? '' : 'display:none;' }} max-width: 200px;">
                                            @endif
                                        </div>
                                    </div>
                                    <hr>
                                    
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Select Project type</label>
                                        <div class="col-sm-9">
                                            <select class="form-control  mb-3" name="project_menu_id" required>
                                                <option  selected disabled>Select Project type</option>
                                                @foreach ($projectMenus as $menu) 
                                                    <option value="{{ $menu->id }}" {{ $menu->id == $project->project_menu_id ? 'selected' : '' }}>
                                                        {{ $menu->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Content</label>
                                        <div class="col-sm-9">
                                            <div class="">
                                                <textarea name="content" id="ckeditor" class="form-control" required>{{ old('content', $project->content ?? '') }}</textarea>
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="mb-3 row ">
                                        <label class="col-sm-3 col-form-label form-label"> Amenities Image</label>
                                        <div class="col-sm-9">
                                            <input id="amenities" type="file" class="form-control @error('amenities') is-invalid @enderror" name="amenities_image" accept="image/jpeg,image/png,image/gif" onchange="previewProjectAmenities(event)">
                                            @error('amenities')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <small class="text-danger">Maximum file size: 2MB. Allowed file types: JPEG, PNG, JPG, GIF.</small>
                                            <img id="amenities-project-preview" src="{{ isset($project) ? asset($project->amenities_image) : '' }}" alt="Image Preview" class="img-thumbnail mt-2" style="{{ isset($project) ? '' : 'display:none;' }} max-width: 200px;">
                                        </div>
                                    </div>

                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Upload Brochure</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" name="brochure" id="brochure" accept="application/pdf">
                                            @if(isset($project) && $project->brochure)
                                                <a href="{{ asset($project->brochure) }}" target="_blank" class="text-primary">View current brochure</a>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Upload Subcription Form</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control"  name="subscription_form" id="subscription_forms" accept="application/pdf" >
                                            @if(isset($project) && $project->subscription_form)
                                               <a href="{{ asset($project->subscription_form) }}" target="_blank" class="text-primary">View Subcription Form</a>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label"> Video Link</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Video link" value="{{ old('title', $project->video_link ?? '') }}" name="video_link" id="video_link" >
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="mb-3 row ">
                                        <label class="col-sm-3 col-form-label form-label">Banner Image</label>
                                        <div class="col-sm-9">
                                            <input id="image_banner" type="file" class="form-control @error('image_banner') is-invalid @enderror" name="image_banner" accept="image/jpeg,image/png,image/gif" onchange="previewProjectImageBanner(event)">
                                            @error('image_banner')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <small class="text-danger">Maximum file size: 2MB. Allowed file types: JPEG, PNG, JPG, GIF.</small>
                                            <img id="image-banner" src="{{ isset($project) ? asset($project->image_banner) : '' }}" alt="Image Preview" class="img-thumbnail mt-2" style="{{ isset($project) ? '' : 'display:none;' }} max-width: 200px;">
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3 row ">
                                        <label class="col-sm-3 col-form-label form-label">Flyer Image</label>
                                        <div class="col-sm-9">
                                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" accept="image/jpeg,image/png,image/gif" onchange="previewProjectImage(event)">
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <small class="text-danger">Maximum file size: 2MB. Allowed file types: JPEG, PNG, JPG, GIF.</small>
                                            <img id="image-project-preview" src="{{ isset($project) ? asset($project->image) : '' }}" alt="Image Preview" class="img-thumbnail mt-2" style="{{ isset($project) ? '' : 'display:none;' }} max-width: 200px;">
                                        </div>
                                    </div>
                                  
                                    <div class="mb-3 row">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Update Project</button>
                                        </div>
                                    </div>
                                   
                                </form>
                                <script>
                                    // Initialize CKEditor
                                    function previewProjectAmenities(event){
                                        const input = event.target;
                                        const preview = document.getElementById('amenities-project-preview');
                                        
                                        if (input.files && input.files[0]) {
                                            const reader = new FileReader();
                                            
                                            reader.onload = function(e) {
                                                preview.src = e.target.result;
                                                preview.style.display = 'block';
                                            };
                                            
                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }
                                    function previewProjectImage(event) {
                                        const input = event.target;
                                        const preview = document.getElementById('image-project-preview');
                                        
                                        if (input.files && input.files[0]) {
                                            const reader = new FileReader();
                                            
                                            reader.onload = function(e) {
                                                preview.src = e.target.result;
                                                preview.style.display = 'block';
                                            };
                                            
                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }
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

                                    function previewProjectImageBanner(event) {
                                        const input = event.target;
                                        const preview = document.getElementById('image-banner');
                                         
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
                                
                                <script>
                                    CKEDITOR.replace('ckeditor');
                                </script>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
           

        </div>
    </div>
</div>
@endsection