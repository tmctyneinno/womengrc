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
                    <h2 class="text-black font-w600">{{ isset($certification) ? 'Edit' : 'Create' }} Certification</h2>
                </div>
                <a href="{{route('admin.certifications.index')}}" class="btn btn-primary rounded light">View Certification</a>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-12 align-center">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ isset($certification) ? 'Edit' : 'Create' }} Certification</h4>
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
                
                                
                                 <div class="card-body">
                                    <form method="POST" 
                                        action="{{ isset($certification) ? route('admin.certifications.update', $certification->id) : route('admin.certifications.store') }}" 
                                        enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($certification))
                                            @method('PUT')
                                        @endif

                                        <div class="form-group">
                                            <label for="name">Certification Name *</label>
                                            <input type="text" class="form-control" id="name" name="name" 
                                                value="{{ old('name', $certification->name ?? '') }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="description">Description *</label>
                                            <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $certification->description ?? '') }}</textarea>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="certification_code">Certification Code *</label>
                                                    <input type="text" class="form-control" id="certification_code" 
                                                        name="certification_code" 
                                                        value="{{ old('certification_code', $certification->certification_code ?? '') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="duration_hours">Duration (Hours) *</label>
                                                    <input type="number" class="form-control" id="duration_hours" 
                                                        name="duration_hours" min="1" 
                                                        value="{{ old('duration_hours', $certification->duration_hours ?? 1) }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="due_date">Due Date</label>
                                                    <input type="date" class="form-control" id="due_date" 
                                                        name="due_date" 
                                                        value="{{ old('due_date', isset($certification->due_date) ? $certification->due_date->format('Y-m-d') : '') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="is_required">Required Certification</label>
                                                    <select class="form-control" id="is_required" name="is_required">
                                                        <option value="1" {{ old('is_required', $certification->is_required ?? 0) == 1 ? 'selected' : '' }}>Yes</option>
                                                        <option value="0" {{ old('is_required', $certification->is_required ?? 0) == 0 ? 'selected' : '' }}>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="certificate_template">Certificate Template (PDF)</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="certificate_template" 
                                                    name="certificate_template" accept=".pdf">
                                                <label class="custom-file-label" for="certificate_template">
                                                    {{ $certification->certificate_template_path ?? 'Choose file...' }}
                                                </label>
                                            </div>
                                            @if(isset($certification) && $certification->certificate_template_path)
                                                <div class="mt-2">
                                                    <a href="{{ asset($certification->certificate_template_path) }}" 
                                                    target="_blank" class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-eye"></i> View Current Template
                                                    </a>
                                                </div>
                                            @endif
                                        </div>

                                        <button type="submit" class="btn btn-primary">
                                            {{ isset($certification) ? 'Update' : 'Create' }} Certification
                                        </button>
                                    </form>
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
@section('scripts')
<script>
    // Show file name in file input
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = document.getElementById("certificate_template").files[0].name;
        var nextSibling = e.target.nextElementSibling;
        nextSibling.innerText = fileName;
    });
</script>
@endsection