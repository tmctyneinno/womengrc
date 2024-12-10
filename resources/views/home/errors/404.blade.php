@extends('layouts.app')

@section('content')


 <!-- Start 404 Error -->
 <div class="error-area pt-100 pb-20">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="error-content">
                <img 
                style="max-width: 100%; max-height:100%; object-fit:cover; width:100px; height:50px "
                src="{{ $contactUs ? asset($contactUs->site_logo) : '' }}" 
                alt="Images">
                <h1>4 <span>0</span> 4</h1>
                <h3>Oops! Page Not Found</h3>
                <p>The page you are looking for might have been removed had its name changed or is temporarily unavailable.</p>
                <a href="{{ route('home')}}" class="default-btn">
                    Return To Home Page
                </a>
            </div>
        </div>
    </div>
</div>
<!-- End 404 Error -->



@endsection