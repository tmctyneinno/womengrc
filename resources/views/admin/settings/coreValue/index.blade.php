@extends('layouts.admin')

@section('content')
<div id="main-wrapper">
    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Settings</h4>
                    </div>
                    <div class="card-body"> 
                        <div class="row">
                            @if(session('success'))
                                <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if(session('error'))
                                <div id="success-danger" class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="col-sm-2">
                                <div class="nav flex-column nav-pills mb-3" role="tablist">
                                    <a href="{{ route('admin.visionMission.index') }}" class="nav-link ">Vision/Mission</a>
                                    <a href="{{ route('admin.coreValue.index') }}" class="nav-link active">Core Value</a>
                                    <a href="{{ route('admin.settings.aboutUs') }}"  class="nav-link " >About us</a>
                                    <a href="{{ route('admin.settings.contactUs') }}"  class="nav-link" >Contact us</a>
                                    <a href="{{ route('admin.socialLink.index') }}"  class="nav-link" >Social Link</a>
                                </div>
                            </div>
                            <div class="col-sm-10">
                                <div class="tab-content">
                                    <div id="v-pills-home" class="tab-pane fade show active " role="tabpanel">
                                        @include('admin.settings.coreValue.coreValue')
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
