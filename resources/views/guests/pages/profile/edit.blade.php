@extends('layouts.guestDashboard')

@section('content')
<div class="dashboard__page--wrapper">
    <div class="page__body--wrapper" id="dashbody__page--body__wrapper">
        <main class="main__content_wrapper">
            <div class="dashboard__container setting__container">
                <div class="add__property--heading mb-30">
                    <h2 class="add__property--heading__title">Update Profile</h2>
                    <p class="add__property--desc">We are glad to see you again!</p>
                </div>
               
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="setting__page--inner">
                    <div class="row">
                        <div class="setting__profile edit-profile">
                            <form action="{{ route('guests.profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
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
                                                        src="{{ $user->profile_image ? asset($user->profile_image) : asset('assets/admin/img/dashboard/avater.jpg') }}"
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
                                                <!-- Name Input -->
                                                <div class="add__listing--input__box mb-20">
                                                    <label class="add__listing--input__label" for="name">Full Name</label>
                                                    <input 
                                                        class="add__listing--input__field @error('name') is-invalid @enderror" 
                                                        id="name" 
                                                        name="name" 
                                                        placeholder="Full Name" 
                                                        type="text" 
                                                        value="{{ old('name', $user->name) }}">
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
                                                        value="{{ $user->email }}">
                                                </div>
                                                
                                                <!-- Role Input -->
                                                <div class="add__listing--input__box mb-20">
                                                    <label class="add__listing--input__label" for="role">Role</label>
                                                    <input 
                                                        disabled 
                                                        class="add__listing--input__field" 
                                                        id="role" 
                                                        placeholder="Role" 
                                                        type="text" 
                                                        value="{{ $user->role == 'guests' ? 'Guest' : ($user->role == 'advisory_member' ? 'Advisory' : 'User') }}">
                                                </div>
 
                                                <!-- Upload CV Input -->
                                                <div class="add__listing--input__box mb-20">
                                                    <label class="add__listing--input__label" for="upload_cv">Upload CV</label>
                                                    <input 
                                                        class="add__listing--input__field @error('upload_cv') is-invalid @enderror" 
                                                        id="upload_cv" 
                                                        name="upload_cv" 
                                                        type="file" 
                                                        accept=".pdf,.doc,.docx">
                                                    
                                                    @if($user->upload_cv)
                                                        <div class="mt-2">
                                                            <p class="text-muted mb-0">Current CV: 
                                                                <a href="{{ asset($user->upload_cv) }}" target="_blank">
                                                                    {{ basename($user->upload_cv) }}
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
                                                <!-- LinkedIn Profile -->
                                                <div class="add__listing--input__box mb-20">
                                                    <label class="add__listing--input__label">LinkedIn Profile</label>
                                                    <input 
                                                        class="add__listing--input__field @error('linkedin') is-invalid @enderror" 
                                                        id="linkedin_profile" 
                                                        name="linkedin_profile" 
                                                        placeholder=""  
                                                        type="text" 
                                                        value="{{ old('linkedin', $user->linkedin ?? '') }}">
                                                    @error('linkedin')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                
                                                <!-- Twitter Profile -->
                                                <div class="add__listing--input__box mb-20">
                                                    <label class="add__listing--input__label">Twitter Profile</label>
                                                    <input 
                                                        class="add__listing--input__field @error('twitter_profile') is-invalid @enderror" 
                                                        id="twitter_profile" 
                                                        name="twitter_profile" 
                                                        placeholder="" 
                                                        type="text" 
                                                        value="{{ old('twitter_profile', $user->twitter_profile ?? '') }}">
                                                    @error('twitter_profile')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                
                                                <!-- Facebook Profile -->
                                                <div class="add__listing--input__box mb-20">
                                                    <label class="add__listing--input__label">Facebook Profile</label>
                                                    <input 
                                                        class="add__listing--input__field @error('facebook_profile') is-invalid @enderror" 
                                                        id="facebook_profile" 
                                                        name="facebook_profile" 
                                                        placeholder="" 
                                                        type="text" 
                                                        value="{{ old('facebook_profile', $user->facebook_profile ?? '') }}">
                                                    @error('facebook_profile')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                
                                                <!-- Bio -->
                                                <div class="add__listing--input__box mb-20">
                                                    <label class="add__listing--input__label">Bio</label>
                                                    <textarea cols="5" class="add__listing--input__field @error('bio') is-invalid @enderror" id="bio" name="bio" rows="5">{{ old('bio', $user->bio ?? '') }}</textarea>
                                                    @error('bio')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                
                                                <!-- Expertise -->
                                                <div class="add__listing--input__box mb-20">
                                                    <label class="add__listing--input__label">Expertise</label>
                                                    <input 
                                                        class="add__listing--input__field @error('expertise') is-invalid @enderror" 
                                                        id="expertise" 
                                                        name="expertise" 
                                                        placeholder="Your expertise areas" 
                                                        type="text" 
                                                        value="{{ old('expertise', $user->expertise ?? '') }}">
                                                    @error('expertise')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                
                                                <!-- Years of Experience -->
                                                <div class="add__listing--input__box mb-20">
                                                    <label class="add__listing--input__label">Years of Experience</label>
                                                    <input 
                                                        class="add__listing--input__field @error('years_of_experience') is-invalid @enderror" 
                                                        id="years_of_experience" 
                                                        name="years_of_experience" 
                                                        placeholder="Number of years" 
                                                        type="number" 
                                                        value="{{ old('years_of_experience', $user->years_of_experience ?? '') }}">
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
                                            document.getElementById('profile_image_preview').src = e.target.result;
                                        };
                                        reader.readAsDataURL(file);
                                    }
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection