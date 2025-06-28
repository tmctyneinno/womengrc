@extends('layouts.dashboard')
 
@section('content')
<div class="dashboard__page--wrapper">
    <!-- Dashboard sidebar .\ -->
    <div class="page__body--wrapper" id="dashbody__page--body__wrapper">
        
        <main class="main__content_wrapper">
            <!-- dashboard container -->
            <div class="dashboard__container setting__container">
                <div class="add__property--heading mb-30">
                    <h2 class="add__property--heading__title">Update Profile</h2>
                    <p class="add__property--desc">We are glad to see you again!</p>
                </div>
               
                    <div class="setting__page--inner  ">
                        <div class="row">
                            <div class="setting__profile edit-profile">
                        
                                <form action="{{ route('advisory.profile.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <!-- Left Column -->
                                        <div class="col-6">
                                            <div class="edit__profile--step">
                                                <h3 class="setting__profile--title">My Profile</h3>
                                                <!-- Profile Image Section -->
                                                <div class="setting__profile--author d-flex align-items-center">
                                                    <div class="setting__profile--author__thumb">
                                                        <img 
                                                            id="profile_image_preview"
                                                            src="{{ Auth::user()->profile_image ? asset(Auth::user()->profile_image) : asset('assets/admin/img/dashboard/avater.jpg') }}"
                                                            style="border-radius:50px; max-height: 100%; max-width:100%; width:65px; height:65px; object-fit: cover;"
                                                            alt="Profile Image">
                                                    </div>
                                                    <div class="setting__profile--author__text">
                                                        <h3 class="setting__profile--author__name">Edit your photo</h3>
                                                        <div class="setting__profile--author__btn d-flex">
                                                            <label for="profile_image" class="btn btn-secondary">Upload</label>
                                                            <input type="file" id="profile_image" name="profile_image" style="display: none;" accept="image/*" onchange="previewImage(event)">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Profile Details Section -->
                                                <div class="setting__profile--inner">
                                                    <!-- First Name Input -->
                                                    <div class="add__listing--input__box mb-20">
                                                        <label class="add__listing--input__label" for="first_name">Full Name</label>
                                                        <input 
                                                            class="add__listing--input__field" 
                                                            id="name" 
                                                            name="name" 
                                                            placeholder="Full Name" 
                                                            type="text" 
                                                            value="{{ old('name', Auth::user()->name) }}">
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <!-- Email Input -->
                                                    <div class="add__listing--input__box mb-20">
                                                        <label class="add__listing--input__label" for="email">Email Address</label>
                                                        <input 
                                                            disabled 
                                                            class="add__listing--input__field" 
                                                            id="email" 
                                                            placeholder="Email Address" 
                                                            type="email" 
                                                            value="{{ Auth::user()->email }}">
                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <!-- Role Input -->
                                                    <div class="add__listing--input__box mb-20">
                                                        <label class="add__listing--input__label" for="email">Role </label>
                                                        <input 
                                                            disabled 
                                                            class="add__listing--input__field" 
                                                            id="email" 
                                                            placeholder="Role" 
                                                            type="name" 
                                                            value="{{ Auth::user()->role == 'advisory_member' ? 'Advisory' : 'User' }}">
                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
  
                                                    <!-- Upload CV Input -->
                                                    <div class="add__listing--input__box mb-20">
                                                        <label class="add__listing--input__label" for="cv">Upload CV </label>
                                                        <input 
                                                            class="add__listing--input__field" 
                                                            id="cv" 
                                                            name="upload_cv" 
                                                            placeholder="cv" 
                                                            type="file" 
                                                            accept=".pdf,.doc,.docx"> {{-- Optional: Specify accepted file types --}}
                                                        
                                                        @if(Auth::user()->upload_cv)
                                                            <div class="mt-2">
                                                                <p class="text-muted mb-0">Current CV: 
                                                                    <a href="{{ asset(Auth::user()->upload_cv) }}" target="_blank">
                                                                        {{ basename(Auth::user()->upload_cv) }}
                                                                    </a>
                                                                </p>
                                                            </div>
                                                        @endif
                                                        @error('upload_cv')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                
                                        <!-- Right Column -->
                                        <div class="col-6">
                                            <div class="edit__profile--step">
                                                <h3 class="setting__profile--title">Social media information</h3>
                                                <div class="setting__profile--inner">
                                                    <div class="add__listing--input__box mb-20">
                                                        <label class="add__listing--input__label" >LinkedIn Profile</label>
                                                        <input 
                                                            class="add__listing--input__field" 
                                                            id="linkedin_profile"  
                                                            name="linkedin" 
                                                            placeholder="LinkedIn Profile" 
                                                            type="text" 
                                                            required
                                                            value="{{ old('linkedin', Auth::user()->linkedin ?? '') }}">
                                                        @error('linkedin')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="add__listing--input__box mb-20">
                                                        <label class="add__listing--input__label" for="phone">Twitter Profile</label>
                                                        <input 
                                                            class="add__listing--input__field" 
                                                            id="twitter_profile" 
                                                            name="twitter_profile" 
                                                            placeholder="Twitter Profile" 
                                                            type="text" 
                                                            required
                                                            value="{{ old('Twitter Profile', Auth::user()->twitter_profile  ?? '') }}">
                                                        @error('twitter_profile')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="add__listing--input__box mb-20">
                                                        <label class="add__listing--input__label" for="phone">Facebook Profile</label>
                                                        <input 
                                                            class="add__listing--input__field" 
                                                            id="facebook_profile" 
                                                            name="facebook_profile" 
                                                            placeholder="Facebook Profile" 
                                                            type="text" 
                                                            required
                                                            value="{{ old('Facebook Profile', Auth::user()->facebook_profile  ?? '') }}">
                                                        @error('facebook_profile')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="add__listing--input__box mb-20">
                                                        <label class="add__listing--input__label" for="phone">Bio </label>
                                                        <textarea class="add__listing--input__field"  id="bio" name="bio" rows="5">{{ old('bio', Auth::user()->bio ?? '') }}</textarea>
                                                          @error('bio')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="add__listing--input__box mb-20">
                                                        <label class="add__listing--input__label" for="phone">Expertise </label>
                                                        <input 
                                                        class="add__listing--input__field" 
                                                        id="expertise" 
                                                        name="expertise" 
                                                        placeholder="Expertise" 
                                                        type="text" 
                                                        required
                                                        value="{{ old('expertise', Auth::user()->expertise  ?? '') }}">
                                                  
                                                        @error('expertise')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="add__listing--input__box mb-20">
                                                        <label class="add__listing--input__label" for="phone">Years of Experience </label>
                                                        <input 
                                                        class="add__listing--input__field" 
                                                        id="years_of_experience" 
                                                        name="years_of_experience" 
                                                        placeholder="Expertise" 
                                                        required
                                                        type="number" 
                                                        value="{{ old('years_of_experience', Auth::user()->years_of_experience  ?? '') }}">
                                                  
                                                        @error('years_of_experience')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Update Button -->
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="solid__btn add__property--btn">Update Profile</button>
                                        </div>
                                    </div>
                                </form>
                                
                                <!-- JavaScript for Image Preview -->
                                <script>
                                    function previewImage(event) {
                                        const file = event.target.files[0];
                                        if (file) {
                                            const reader = new FileReader();
                                            reader.onload = function(e) {
                                                // Update the profile picture preview
                                                const profileImagePreview = document.getElementById('profile_image_preview');
                                                profileImagePreview.src = e.target.result;
                                            };
                                            reader.readAsDataURL(file);
                                        }
                                    }
                                </script>
                            
                            </div>
                          
                        </div>
                    </div>
                    
            </div>
            <!-- dashboard container .\ -->

          
        </main>

    </div>
</div>
        
       
@endsection
