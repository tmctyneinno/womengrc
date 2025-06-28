@extends('layouts.facilitatordashboard')

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
                                    <h2 class="chat__inbox--header__title">Create Event</h2>
                                    <button class="chat__inbox--popup__btn" data-bs-toggle="modal" data-bs-target="#modaladdcontact" aria-label="popup button"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.99984 18.3334C14.5832 18.3334 18.3332 14.5834 18.3332 10.0001C18.3332 5.41675 14.5832 1.66675 9.99984 1.66675C5.4165 1.66675 1.6665 5.41675 1.6665 10.0001C1.6665 14.5834 5.4165 18.3334 9.99984 18.3334Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M6.6665 10H13.3332" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10 13.3334V6.66675" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                </div>
                                <div class="chat__inbox--search">
                                    <form action="{{ route('facilitator.event.post') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-8">
                                                <div class="">
                                                    <label for="event_name" class="form-label">Event Name:</label>
                                                    <input class="mb-2 chat__inbox--search__input" name="event_name" placeholder="Event Name..." type="text">
                                                </div>
                                                <div class="">
                                                    <label for="event_description" class="form-label">Event Description:</label>
                                                    <textarea name="event_description" cols="7" rows="8" placeholder="Event Description..." class="mb-2 chat__inbox--search__input"></textarea>
                                                </div>
                                                <div class="">
                                                    <label for="event_type" class="form-label">Event Type:</label>
                                                    <select name="event_type" class="mb-2 chat__inbox--search__input">
                                                        <option value="Workshop">Workshop</option>
                                                        <option value="Webinar">Webinar</option>
                                                        <option value="Networking Event">Networking Event</option>
                                                        <option value="Panel Discussion">Panel Discussion</option>
                                                        <option value="Conference/Summit">Conference/Summit</option>
                                                    </select>
                                                </div>
                                                <div class="">
                                                    <label for="event_date_time" class="form-label">Event Date and Time:</label>
                                                    <input name="event_date_time" class="mb-2 chat__inbox--search__input" type="datetime-local" />
                                                </div>
                                                <div class="">
                                                    <label for="event_location" class="form-label">Event Location:</label>
                                                    <input name="event_location" class="mb-2 chat__inbox--search__input" placeholder="Event Location..." type="text">
                                                </div>
                                                <br/>
                                                <div class="">
                                                    <input class="mb-2 welcome__content--btn solid__btn" type="submit" value="Submit Event Plan"/>
                                                </div>
                                            </div>
                                            <div class="col-md-1"></div>
                                        </div>
                                    </form>
                                    
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



