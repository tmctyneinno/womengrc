@extends('layouts.app')



@section('content')

<div class="inner-banner" style="background-image: url({{ asset($membershipContent->image) }});">
    <div class="container">
        <div class="inner-title text-center">
            <h3>Membership</h3>
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
                <li>Membership</li>
            </ul>
        </div>
    </div>
</div>

<div class="terms-conditions-area ptb-100">
    <div class="container">
       

        <div class="single-content">
            <h3 class="text-center">{{ $membershipContent->title }}</h3>
            <p>
                {!! $membershipContent->content !!}
            </p>
        </div>
    </div>
</div>

    
@endsection