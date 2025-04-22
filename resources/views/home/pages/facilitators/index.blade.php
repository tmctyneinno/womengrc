@extends('layouts.app')



@section('content')

<div class="inner-banner" style="background-image: url({{ asset($facilitatorContent->image) }});">
    <div class="container">
        <div class="inner-title text-center">
            <h3>Facilitators</h3>
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
                <li>Facilitators</li>
            </ul>
        </div>
    </div>
</div>
 
<div class="terms-conditions-area ptb-100">
    <div class="container">
        <div class="single-content">
            <h3 class="text-center">{{ $facilitatorContent->title }}</h3>
            <p>
                {!! $facilitatorContent->content !!}
            </p>
        </div>
    </div>
</div>

    
@endsection