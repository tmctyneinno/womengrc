@extends('layouts.app')



@section('content')


<div class="inner-banner" style="background-image: url({{ asset('assets/images/banner/recognition.jpg') }});">
    <div class="container">
        <div class="inner-title text-center">
            <h3>Advisory Board </h3>
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
                <li>Advisory Board</li>
            </ul>
        </div>
    </div>
</div>
 
 <!-- Team Area -->
 <div class="team-area pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <span>Advisory Board</span>
            <h2>Women in GRC and FinCrime Prevention </h2>
        </div>
        <div class="row pt-45">
            @forelse ($advisory as $advisory)
                <div class="col-lg-3 col-md-6">
                    <div class="team-card">

                        <div class="team-card" style="
                        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.5);
                        overflow: hidden;">
                            <img src="{{ asset($advisory->image) }}" alt="Team Images" class="img-fluid  " 
                            style="width:300px; height:300px; object-fit:fill;"
                            >
                        </div>
                        <div class="content">
                            <h3>{{ $advisory->name }}</h3>
                            <span>{{ $advisory->position }}</span>
                            <a 
                            href="#" 
                            data-bs-toggle="modal" 
                            data-bs-target="#exampleModalManagement" 
                            data-name="{{$advisory->name}}" 
                            data-position="{{$advisory->position}}"
                            data-content="{{ $advisory->content }}"
                            class="read-more pt-1" style="color: #B03436">
                                Read more
                            </a>
                        </div>
                        
                    </div>
                </div>
            @empty
                <p class="text-center">No Data Found (s)</p>
            @endforelse

        </div>
    </div> 
</div>
<!-- Team Area End -->

<div class="modal modal-dialog-scrollable " id="exampleModalManagement" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6 id="modalPosition"></h6>
                <p id="modalContent"></p>
            </div>
        </div>
    </div>
</div>



@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var exampleModalManagement = document.getElementById('exampleModalManagement');
        
        exampleModalManagement.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            
            var name = button.getAttribute('data-name');
            var position = button.getAttribute('data-position');
            var content = button.getAttribute('data-content');
            
            var modalTitle = exampleModalManagement.querySelector('.modal-title');
            var modalPosition = exampleModalManagement.querySelector('#modalPosition');
            var modalContent = exampleModalManagement.querySelector('#modalContent');
            
            modalTitle.textContent = name;
            modalPosition.textContent = position;
            modalContent.innerHTML = content;
        });
    });
</script>