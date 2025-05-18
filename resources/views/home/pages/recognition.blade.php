

@extends('layouts.app')

@section('content')
    <!-- Inner Banner -->
    <div class="inner-banner" style="background-image: url({{ asset($aboutUs->banner_one) }});">
        <div class="container">
            <div class="inner-title text-center"> 
                <h3>Recognition </h3>
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
                    <li>Recognition</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Team Area -->
    <div class="team-area pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <span>Recognition </span>
                <h2>Women in GRC and FinCrime Prevention</h2>
            </div>
            <div class="row pt-45"> 
                @forelse ($recognitions as $recognition) 
                    <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-1">
                        <div class="team-card" style="box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.5); overflow: hidden;">
                            <img src="{{ asset($recognition->image) }}" alt="Team Images" style="display: block; width: 100%; height: 150px; object-fit:contain;">
                            <div class="content" style="padding: 5px 10px;">
                                <p style="font-size: 14px; padding: 0px; font-weight: 500; color: #000;">{{ $recognition->name }}</p>
                                <span style="padding: 0px 0px; text-transform:capitalize">{{ \Illuminate\Support\Str::limit($recognition->position, 30) }}</span>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModalManagement" data-name="{{ $recognition->name }}" data-position="{{ $recognition->position }}" data-content="{{ $recognition->content }}" class="read-more pt-1" style="color: #B03436;">
                                    Read more
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">No Data Found</p>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Team Area End -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModalManagement" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="modalPosition"></p>
                    <p id="modalContent"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

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
@endsection