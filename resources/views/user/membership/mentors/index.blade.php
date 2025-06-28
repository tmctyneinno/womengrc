@extends('layouts.dashboard')

@section('content')
<div class="page__body--wrapper" id="dashbody__page--body__wrapper">
        <main class="main__content_wrapper">
            <!-- dashboard container -->
            <div class="dashboard__container  ">
                <div class="">
                    <div class="main__content--left__inner chat__inbox">
                        <!-- Welcome section -->
                        <div class="welcome__section  align-items-center">
                            <div class="chat__inbox--content">
                                <div class="mb-3 chat__inbox--header d-flex align-items-center justify-content-between">
                                    <h2 class="chat__inbox--header__title">Add Mentor</h2>
                                    {{-- <button class="chat__inbox--popup__btn" data-bs-toggle="modal" data-bs-target="#modaladdcontact" aria-label="popup button"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.99984 18.3334C14.5832 18.3334 18.3332 14.5834 18.3332 10.0001C18.3332 5.41675 14.5832 1.66675 9.99984 1.66675C5.4165 1.66675 1.6665 5.41675 1.6665 10.0001C1.6665 14.5834 5.4165 18.3334 9.99984 18.3334Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M6.6665 10H13.3332" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10 13.3334V6.66675" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button> --}}
                                 
                                </div>
                                <div class="chat__inbox--search">
                                    <label for="searchMentor" class="form-label">Search Mentor</label>
                                    <input id="searchMentor" onkeyup="searchMentor()" class="mb-2 chat__inbox--search__input" style="width: 100%;" placeholder="Search Mentor..." type="text">
                                    
                                    <div class="chat__inbox--wrapper">
                                        <ul class="chat__inbox--menu" id="mentorList">
                                            @forelse ($mentors as $mentor)
                                                <li class="mentor-item">
                                                    <div class="welcome__section d-flex align-items-center" style="padding: 8px; margin:5px">
                                                        <div class="welcome__thumbnail">
                                                            <img 
                                                            style="border-radius:50px; max-height: 100%; max-width:100%; width:50px; height:50px; object-fit: cover;"
                                                            src="{{ $mentor->profile_picture ? asset('storage/'.$mentor->profile_picture) : asset('assets/admin/img/dashboard/avater.jpg') }}" 
                                                            alt="img">
                                                        </div>
                                                        <div class="welcome__content">
                                                            <div class="chat__inbox--author d-flex align-items-center">
                                                                <div class="chat__inbox--author__content">
                                                                    <h3 class="chat__inbox--author--name">{{ $mentor->name }}</h3>
                                                                    <p class="chat__inbox--author__desc">{{ $mentor->email }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="welcome__content">
                                                            {{-- {{auth()->user()->mentorInvitations->contains('mentor_id', $mentor->id)}} --}}
                                                            @if ($invitation = auth()->user()->mentorInvitations->where('mentor_id', $mentor->id)->where('user_id', auth()->user()->id)->first())
                                                                @if ($invitation->status === 'pending')
                                                                    <button class="welcome__content--btn solid__btn" disabled style="background-color: #f39c12;">
                                                                        Request Sent
                                                                    </button>
                                                                @elseif ($invitation->status === 'accepted')
                                                                    <button class="welcome__content--btn solid__btn" disabled style="background-color: #27ae60;">
                                                                        Accepted
                                                                    </button>
                                                                @endif
                                                            
                                                            @elseif ($recipient = $mentor->mentorInvitations->where('mentor_id', auth()->user()->id)->first())
                                                                @if ($recipient->status === 'pending')
                                                                    <a href="{{ route('user.mentor.accept-invitation', ['id' => encrypt(auth()->user()->id)]) }}" class="welcome__content--btn solid__btn" disabled style="background-color: #f39c12;">
                                                                        Accept Request
                                                                    </a>
                                                                @elseif ($recipient->status === 'accepted')
                                                                    <button class="welcome__content--btn solid__btn" disabled style="background-color: #27ae60;">
                                                                        Accepted
                                                                    </button>
                                                                @endif
                                                            @else
                                                                <form action="{{ route('user.add-mentor', $mentor->id) }}" method="POST">
                                                                    @csrf
                                                                    <button type="submit" class="welcome__content--btn solid__btn">Add Mentor</button>
                                                                </form>
                                                                
                                                            @endif

                                                        </div>
                                                    </div>
                                                </li>
                                            @empty
                                                <div class="no-mentors">
                                                    <p>No mentors are currently available. Please check back later!</p>
                                                </div> 
                                            @endforelse
                                        </ul>
                                        <div id="noResultsMessage" style="display: none; color: red; text-align: center;">
                                            <p>No mentors found for your search.</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <script>
                                    function searchMentor() {
                                        let query = document.getElementById('searchMentor').value.toLowerCase();
                                        let mentors = document.querySelectorAll('.mentor-item');
                                        let resultsFound = false; 
                                
                                        mentors.forEach(function(mentor) {
                                            let mentorName = mentor.querySelector('.chat__inbox--author--name').textContent.toLowerCase();
                                            let mentorEmail = mentor.querySelector('.chat__inbox--author__desc').textContent.toLowerCase();
                                            
                                            if (mentorName.includes(query) || mentorEmail.includes(query)) {
                                                mentor.style.display = 'flex';
                                                resultsFound = true;  
                                            } else {
                                                mentor.style.display = 'none';
                                            }
                                        });
                                
                                        if (resultsFound) {
                                            document.getElementById('noResultsMessage').style.display = 'none';
                                        } else {
                                            document.getElementById('noResultsMessage').style.display = 'block';
                                        }
                                    }
                                </script>
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
                
            </div>
            <!-- dashboard container .\ -->

        </main>
    </div>
@endsection



