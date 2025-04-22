@extends('layouts.app')



@section('content')

<div class="inner-banner" style="background-image: url({{ asset($mentorshipContent->image) }});">
    <div class="container">
        <div class="inner-title text-center">
            <h3>Mentorship</h3>
            <ul>
                <li>
                    <a href="{{ route('home')}}">Home</a>
                </li>
                <li> 
                    <i class="bx bx-chevron-right"></i>
                </li>
                <li>Pages</li>
                <li>
                    <i class="bx bx-chevron-right"></i>
                </li>
                <li>Mentorship</li>
            </ul>
        </div>
    </div>
</div>
 
<div class="terms-conditions-area ptb-100">
    <div class="container">
        <div class="single-content">
            <h3 class="text-center">{{ $mentorshipContent->title }}</h3>
            <p>
                {!! $mentorshipContent->content !!}
            </p>
        </div>
    </div>
</div>

    
@endsection