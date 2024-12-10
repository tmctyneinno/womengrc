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
                    <h2 class="text-black font-w600">Application</h2>
                    <p class="mb-0">Welcome to Archway Home backend</p>
                </div>
                <a href="{{route('admin.application.index')}}" class="btn btn-primary rounded light">View Application</a>
            </div>
            <div class="card">
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
                <div class="card-header">
                    <h4 class="card-title"> 
                        Application Details
                    </h4>
                   
                    <div class="row">
                        <div class="col-md-12 align-self-center">
                            <div class="card-body mb-3">
                                <div class="alert alert-warning border-0 " role="alert">
                                    <strong>Applicant Status </strong> 
                                    @if($data->applicant_status === 'pending')
                                        <button class="btn btn-warning btn-sm">{{ ucfirst($data->applicant_status) }}</button>
                                    @elseif($data->applicant_status === 'rejected')
                                        <button class="btn btn-danger btn-sm">{{ ucfirst($data->applicant_status) }}</button>
                                    @elseif($data->applicant_status === 'approved')
                                        <button class="btn btn-success btn-sm">{{ ucfirst($data->applicant_status) }}</button>
                                    @endif
                                </div>                                                                
                            </div><!--end card-body-->
                        </div><!--end col-->
                    </div><!--end row-->
                
                </div>
                <div class="row justify-content-center">
                   
                
                    <div class="col-xl-6 col-lg-12 align-center">
                        <div class="card">
                            
                            <div class="card-body">
                                <div class="basic-form">
                                    
                    
                                    <form method="POST"  action="{{ route('admin.blog.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3 align-items-center">
                                            <label class="col-sm-3 col-form-label form-label">Email</label>
                                            <div class="col">
                                                <input type="text" class="form-control" disabled value="{{$data->user_email}}" placeholder="Title" name="title" id="title" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 align-items-center">
                                            <label class="col-sm-3 col-form-label form-label">Phone Number</label>
                                            <div class="col">
                                                <input type="text" class="form-control" disabled value="{{$data->phone_number}}" placeholder="Title" name="title" id="title" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 align-items-center">
                                            <label class="col-sm-3 col-form-label form-label">Qualification</label>
                                            <div class="col">
                                                <input type="text" class="form-control" disabled value="{{$data->qualification}}" placeholder="Title" name="title" id="title" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 align-items-center">
                                            <label class="col col-form-label form-label">Membership Category</label>
                                            <div class="col">
                                                <input type="text" class="form-control" disabled value="{{$data->membership_category}}" placeholder="Title" name="title" id="title" required>
                                            </div>
                                        </div>
                                    
                                
                                    </form>
                                    <script>
                                        // Initialize CKEditor
                                        CKEDITOR.replace('ckeditor');

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
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-12 align-center">
                        <div class="card">
                        <div class="basic-form">
                            
                                <div class="mb-3 row align-items-center">
                                    <label class="col-sm-6 col-form-label form-label">Certification Document</label>
                                    <div class="col-sm-4">
                                        @if($data->certification_path)
                                            @if(Str::endsWith($data->certification_path, ['.jpg', '.jpeg', '.png', '.gif'])) 
                                                <img src="{{ asset($data->certification_path) }}" alt="Uploaded Image" class="img-fluid" style="max-width: 100%; height: auto;">
                                            @elseif(Str::endsWith($data->certification_path, ['.pdf']))
                                                <embed src="{{ asset($data->certification_path) }}" type="application/pdf" width="100%" height="500px">
                                            @else
                                                <a href="{{ asset($data->certification_path) }}" class="btn btn-primary" target="_blank">Download File</a>
                                            @endif
                                        @else
                                            <p>No file uploaded.</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="mb-3 row align-items-center">
                                    <label class="col-sm-6 col-form-label form-label">Academic Qualifications Document</label>
                                    <div class="col-sm-4">
                                        @if($data->academic_qualifications_path)
                                            @if(Str::endsWith($data->academic_qualifications_path, ['.jpg', '.jpeg', '.png', '.gif'])) 
                                            
                                                <img src="{{ asset($data->academic_qualifications_path) }}" alt="Uploaded Image" class="img-fluid" style="max-width: 100%; height: auto;">
                                            @elseif(Str::endsWith($data->academic_qualifications_path, ['.pdf']))
                                                <embed src="{{ asset($data->academic_qualifications_path) }}" type="application/pdf" width="100%" height="500px">
                                            @else
                                                <a href="{{ asset($data->academic_qualifications_path) }}" class="btn btn-primary" target="_blank">Download File</a>
                                            @endif
                                        @else
                                            <p>No file uploaded.</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="mb-3 row align-items-center">
                                    <label class="col-sm-6 col-form-label form-label">Work Experience Document</label>
                                    <div class="col-sm-4">
                                        @if($data->work_experience_path)
                                            @if(Str::endsWith($data->work_experience_path, ['.jpg', '.jpeg', '.png', '.gif'])) 
                                            
                                                <img src="{{ asset($data->work_experience_path) }}" alt="Uploaded Image" class="img-fluid" style="max-width: 100%; height: auto;">
                                            @elseif(Str::endsWith($data->work_experience_path, ['.pdf']))
                                                <embed src="{{ asset($data->work_experience_path) }}" type="application/pdf" width="100%" height="500px">
                                            @else
                                                <a href="{{ asset($data->work_experience_path) }}" class="btn btn-primary" target="_blank">Download File</a>
                                            @endif
                                        @else
                                            <p>No file uploaded.</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="mb-3 row align-items-center">
                                    <label class="col-sm-6 col-form-label form-label">Professional Certifications Document</label>
                                    <div class="col-sm-4">
                                        @if($data->professional_certifications_path)
                                            @if(Str::endsWith($data->professional_certifications_path, ['.jpg', '.jpeg', '.png', '.gif'])) 
                                            
                                                <img src="{{ asset($data->professional_certifications_path) }}" alt="Uploaded Image" class="img-fluid" style="max-width: 100%; height: auto;">
                                            @elseif(Str::endsWith($data->professional_certifications_path, ['.pdf']))
                                                <embed src="{{ asset($data->professional_certifications_path) }}" type="application/pdf" width="100%" height="500px">
                                            @else
                                                <a href="{{ asset($data->professional_certifications_path) }}" class="btn btn-primary" target="_blank">Download File</a>
                                            @endif
                                        @else
                                            <p>No file uploaded.</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="mb-3 row align-items-center">
                                    <label class="col-sm-6 col-form-label form-label">Identification Document</label>
                                    <div class="col-sm-4">
                                        @if($data->identification_path)
                                            @if(Str::endsWith($data->identification_path, ['.jpg', '.jpeg', '.png', '.gif'])) 
                                            
                                                <img src="{{ asset($data->identification_path) }}" alt="Uploaded Image" class="img-fluid" style="max-width: 100%; height: auto;">
                                            @elseif(Str::endsWith($data->identification_path, ['.pdf']))
                                                <embed src="{{ asset($data->identification_path) }}" type="application/pdf" width="100%" height="500px">
                                            @else
                                                <a href="{{ asset($data->identification_path) }}" class="btn btn-primary" target="_blank">Download File</a>
                                            @endif
                                        @else
                                            <p>No file uploaded.</p>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="mb-3 align-items-center">
                                    <label class="col-sm-3 col-form-label form-label">Payment status</label>
                                    <div class="col">
                                        @if($data->payment_status === 'pending')
                                            <button class="btn btn-warning btn-sm">{{ ucfirst($data->payment_status) }}</button>
                                        @elseif($data->payment_status === 'completed')
                                            <button class="btn btn-success btn-sm">{{ ucfirst($data->payment_status) }}</button>
                                        @elseif($data->payment_status === 'failed')
                                            <button class="btn btn-danger btn-sm">{{ ucfirst($data->payment_status) }}</button>
                                        @elseif($data->payment_status === 'cancelled')
                                            <button class="btn btn-danger btn-sm">{{ ucfirst($data->payment_status) }}</button>
                                        @endif
                                    </div>
                                </div>
                            
                            
                        </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Update Applicant Status</h4>
                    </div>
                    <div class="row r">
                        <div class="col-lg-3 "></div>
                        <div class="col-lg-6 ">
                            <label class="col align-center col-form-label form-label">Status</label>
                            <form action="{{ route('admin.application.update', $data->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="col align-center">
                                    <select  class="form-select mb-3" name="applicant_status" required>
                                        <option selected disabled>Select status type</option>
                                        <option value="rejected" {{ $data->applicant_status == 'rejected' ? 'selected':''}}>Rejected</option>
                                        <option value="approved" {{ $data->applicant_status == 'approved' ? 'selected':''}}>Approved</option>
                                    </select>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Update Record</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-3 "></div>
                    </div>
                   
                </div>
            </div>
           

        </div>
    </div>
</div>
@endsection