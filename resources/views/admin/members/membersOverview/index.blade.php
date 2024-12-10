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
                        <h4 class="card-title"> Membership  </h4>
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
                                    <a href="{{ route('admin.members.membersOverview') }}" class="nav-link active">Member Overview</a>
                                    <a href="{{ route('admin.members.membersBenefit') }}" class="nav-link ">Member Benefit</a>
                                    <a href="{{ route('admin.members.membersProgramme') }}" class="nav-link ">Mentorship Programme</a>
                                    <a href="{{ route('admin.members.membersSubscriptionFees') }}" class="nav-link ">Membership Subscription Fees</a>
                                    <a href="{{ route('admin.members.membershipTiers') }}" class="nav-link ">Membership Tiers</a>
                                    <a href="{{ route('admin.members.membershipApplication') }}" class="nav-link ">Membership Application</a>

                                </div> 
                            </div>
                            <div class="col-sm-10">
                                <div class="tab-content">
                                    
                                    <div  class="tab-pane fade show active" role="tabpanel">
                                        @include('admin.members.membersOverview.create')
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
