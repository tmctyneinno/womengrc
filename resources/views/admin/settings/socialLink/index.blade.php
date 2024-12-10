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
                           
                            <div class="col-sm-2">
                                <div class="nav flex-column nav-pills mb-3" role="tablist">
                                    <a href="{{ route('admin.visionMission.index') }}" class="nav-link ">Vision/Mission</a>
                                    <a href="{{ route('admin.coreValue.index') }}" class="nav-link ">Core Value</a>
                                    <a href="{{ route('admin.settings.aboutUs') }}"  class="nav-link " >About us</a>
                                    <a href="{{ route('admin.settings.contactUs') }}"  class="nav-link" >Contact us</a>
                                    <a href="{{ route('admin.socialLink.index') }}"  class="nav-link active" >Social Link</a>
                                </div>
                            </div>
                            <div class="col-sm-10">
                                <div class="tab-content">
                                    
                                    <div  class="tab-pane fade show active" role="tabpanel">
                                        @include('admin.settings.socialLink.socialLink')
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
