@extends('layouts.app')



@section('content')


<div class="inner-banner inner-bg7">
    <div class="container">
        <div class="inner-title text-center">
            <h3>Privacy &amp; Policy</h3>
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <i class="bx bx-chevron-right"></i>
                </li>
                <li>Pages</li>
                <li>
                    <i class="bx bx-chevron-right"></i>
                </li>
                <li>Privacy &amp; Policy</li>
            </ul>
        </div>
    </div>
</div>

<div class="privacy-policy-area ptb-100">
    <div class="container">
       
        <div class="single-content">
            <h3>Welcome to Women GRC Privacy Policy</h3>
            
            <p>
                
                {!! $policies ? $policies->content : 'Coming soon' !!}
            </p>
        </div>

        

       
    </div>
</div>
       
    
@endsection