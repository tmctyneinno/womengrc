@extends('layouts.app')



@section('content')


<div class="inner-banner" style="background-image: url({{ asset('assets/images/banner/recognition.jpg') }});">
    <div class="container">
        <div class="inner-title text-center">
            <h3>Resource </h3>
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
                <li>Resource</li>
            </ul>
        </div>
    </div>
</div>
 
 <!-- Team Area -->
 <div class="team-area pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <span>Resources</span>
            <h2>Women in Women GRC & Financial Crime Prevention </h2>
        </div>
        <div class="row pt-45">
            <div class="row pt-45">
                @forelse ($resource as $resource)
                <div class="col-lg-12 col-md-12">
                    <div class="city-item">
                        <a href="#" class="city-img">
                            <img src="{{ asset($resource->image) }}" alt="Images">
                        </a>
                        
                    </div>
                </div>
                @empty
                    <p>No data found(s)</p>
                @endforelse

            </div>
          

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