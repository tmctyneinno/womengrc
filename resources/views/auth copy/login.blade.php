@extends('layouts.app')
<style>
    .navbar-custom{
        background-color: #2a2a2a !important;
    }
    .form-group select {
        padding-top: 50px !important;
    }
</style>
@section('content')
 
<div class="user-area">
    <div class="container-fluid m-0">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-7 col-xl-6  p-0">
                <div class="user-img">
                    <img src="{{ asset('assets/img/login-img.jpg')}}" alt="Images">
                </div>
            </div>
 
            <div class="col-lg-5 col-xl-6">
                <div class="user-section text-center">
                    <div class="user-conten pt-5">
                        <h2>Login</h2> 
                        
                    </div> 
                    <div class="tab user-tab">
                        <div class="row justify-content-center">
                           
                             
                            <div class="col-lg-12 col-md-12">
                                <div class="tab_content current active">
                                    @include('auth.login_form')
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
