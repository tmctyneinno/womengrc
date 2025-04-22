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
                    <p class="mb-0">Welcome to {{ $contactUs->company_name}} backend</p>
                </div>
                <a href="{{route('admin.project.index')}}" class="btn btn-primary rounded light">View Project</a>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-12 align-center">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Project</h4>
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
             
                                <form method="POST"  action="{{ route('admin.project.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Title" name="title" id="title" required>
                                            @error('title')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Sub title</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Sub title" name="sub_title" id="sub_title" required>
                                            @error('sub_title')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Location</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Location" name="location"  id="location" required>
                                            @error('location')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">First Land Size</label>
                                        <div class="col-sm-9"> 
                                            <input type="text" class="form-control" placeholder="First Land size" name="land_size"  id="land_size"  required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">First Land Price</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="First Land Price" name="land_price"  id="land_price"  required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Upload Land Payment Plan</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" placeholder="Location" name="land_payment_plan" id="land_payment_plan" accept="image/png, image/jpeg, image/gif" >
                                            @error('land_payment_plan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Second Land Size</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Second Land size" name="second_land_size"  id="second_land_size"  required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Second Land Price</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Second Land Price" name="second_land_price"  id="second_land_price"   required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Upload Land Payment Plan</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" placeholder="Location" name="second_land_payment_plan" id="second_land_payment_plan" accept="image/png, image/jpeg, image/gif" >
                                            @error('land_payment_plan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Select Project type</label>
                                        <div class="col-sm-9">
                                            <select class="form-select mb-3" name="project_menu_id" required>
                                                <option selected disabled>Select Project type</option>
                                                @foreach ($projectMenus as $projectMenu)
                                                    <option value="{{ $projectMenu->id }}">{{ $projectMenu->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('project_menu_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Content</label>
                                        <div class="mb-3 col-sm-9">
                                            <label class="form-label">Content</label>
                                            <textarea id="ckeditor" class="form-control"  name="content" rows="8" spellcheck="false" required> </textarea>
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
                                            <input type="file" class="form-control" placeholder="Location" name="brochure" id="brochure" accept="application/pdf" >
                                            @error('brochure')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                   
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Upload Subcription Form</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control"  name="subscription_form" id="subscription_form" accept="application/pdf" >
                                            @error('subscription_form')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label"> Video Link</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Video link"  name="video_link" id="video_link" >
                                            @error('video_link')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
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
                                            <img id="image-banner" src="" alt="Image Preview" class="img-thumbnail mt-2" style="display:none; max-width: 200px;">
                                        </div>
                                    </div>

                                   <!-- Image Upload -->
                                    <div class="mb-3 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label">Flyer Image</label>
                                        <div class="col-sm-9">
                                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" required  onchange="previewImage(event)">
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <small class="text-danger">Maximum file size: 2MB. Allowed file types: JPEG, PNG, JPG, GIF.</small>
                                            <img id="image-preview" src="" alt="Image Preview" class="img-thumbnail mt-2" style="display:none; max-width: 200px;">
                                        </div>
                                    </div>
                                    
                                  
                                    <div class="mb-3 row">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Create Project</button>
                                        </div>
                                    </div>
                                   
                                </form>
     

                                <script>
                                   
                                    // Initialize CKEditor
                                    CKEDITOR.replace('ckeditor');

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
 
                                    // Sync CKEditor content with the form before submission
                                    function syncEditorContent() {
                                        const content = CKEDITOR.instances.ckeditor.getData(); // Get data from CKEditor
                                        document.querySelector('textarea[name="content"]').value = content; // Sync content
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
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
           

        </div>
    </div>
</div>
@endsection 