@extends('layouts.admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Projects</a></li>
                
            </ol>
        </div>
        <!-- row -->

        <div class="row justify-content-center">
            
            <div class="col-xl-6 col-lg-12 align-center">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Project Menu</h4>
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
            
                            
                            <form method="POST"  action="{{ route('admin.projectMenu.update', $projectMenu->id ) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3 row align-items-center">
                                    <label class="col-sm-3 col-form-label form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Name" name="name" id="name" value="{{ $projectMenu->name}}" required>
                                    </div>
                                </div> 

                                <div class="mb-3 row align-items-center">
                                    <label class="col-sm-3 col-form-label form-label">Image</label>
                                    <div class="col-sm-9">
                                        <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" onchange="previewImage(event)">
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <img  src="{{ asset($projectMenu->image) }}" alt="Image Preview" class="img-thumbnail mt-2" style=" max-width: 70px;">
                                        <br>
                                        <small class="text-danger">Maximum file size: 2MB. Allowed file types: JPEG, PNG, JPG, GIF.</small>
                                        <img id="image-preview" src="" alt="Image Preview" class="img-thumbnail mt-2" style="display:none; max-width: 200px;">
                               
                                    </div>
                                </div>
                                
                                
                                <br><br>
                                <div class="mb-3 row align-items-center">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-primary">Update Project Menu</button>
                                    </div>
                                </div>
                               
                            </form>
                           
                            <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
                            <script>
                                CKEDITOR.replace('content');
                            </script>
                        </div>
                        
                    </div>
                </div>
            </div>
          
           
            
           
        </div>
    </div>
</div>
    @endsection