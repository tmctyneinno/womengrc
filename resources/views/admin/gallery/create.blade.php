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
                    <h2 class="text-black font-w600">Projects status</h2>
                    <p class="mb-0">Welcome to {{ $contactUs->company_name}} backend</p>
                </div>
                <a href="{{route('admin.projects.status.index')}}" class="btn btn-primary rounded light">View Projects status</a>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-12 align-center">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Projects status</h4>
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
                                    <form method="POST" action="{{ route('admin.projects.status.store') }}" enctype="multipart/form-data" class="">
                                        @csrf
                    
                                        <div class="mb-3 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label">Title</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="Title" name="title" id="title" required>
                                            </div>
                                        </div>
                    
                                        <div class="mb-3 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label">Video Embed Code link</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="Video YouTube link" name="video_link" id="video_link" required>
                                                <small class="text-info">Get the Embed Code not the youTube link</small>
                                            </div>
                                        </div>
                    
                                        <div class="mb-3 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label">Select Multiple Images</label>
                                            <div class="col-sm-9">
                                                <input id="images" type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror" name="images[]" required onchange="previewImage(event)" multiple>
                                                @error('images')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <small class="text-danger">Maximum file size: 2MB. Allowed file types: JPEG, PNG, JPG, GIF.</small>
                                                {{-- <img id="image-preview" src="" alt="Image Preview" class="img-thumbnail mt-2" style="display:none; max-width: 200px;"> --}}
                                                <div id="image-preview" class="img-thumbnail mt-2"></div>
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