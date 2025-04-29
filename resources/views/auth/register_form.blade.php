{{-- /Users/infosert/Documents/laravel_projects/Women_GRC/women-in-grc/resources/views/auth/register_form.blade.php --}}
<div class="col-lg-12 col-md-12">
    <div class="tab_content current active">
        <div class="tabs_item">
            <div class="user-all-form">
                <div class="contact-form">
                    {{-- Ensure the form ID matches the one used in JavaScript --}}
                    <form method="POST" action="{{ route('register.post') }}" id="signUpForm" novalidate>
                        @csrf
                        {{-- Add the hidden input for the reCAPTCHA v3 token --}}
                        <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">

                        <div class="row justify-content-center">

                            <!-- Username Field -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <i class="bx bx-user"></i>
                                    <input type="text" name="name" id="register-name" class="form-control"
                                           pattern=".{3,}" title="Username must be at least 3 characters"
                                           placeholder="Full name" autocomplete="off" required> {{-- Added required for better semantics --}}
                                    <small style="font-size: 11px" class="text-start error-message text-danger" id="register-name-error"></small>
                                </div>
                            </div>

                            <!-- Email Field -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <i class="flaticon-email-2"></i>
                                    <input type="email" name="email" id="register-email" class="form-control" placeholder="Email" required> {{-- Added required --}}
                                    <small style="font-size: 11px" class="text-start error-message text-danger" id="register-email-error"></small>
                                </div>
                            </div>

                            <!-- Linkedin Field -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <i class="bx bxl-linkedin"></i> {{-- Changed icon for LinkedIn --}}
                                    <input type="url" name="linkedin" id="linkedIn" class="form-control" {{-- Changed type to url --}}
                                           pattern="https?://(www\.)?linkedin\.com/(in|pub)/.+" {{-- Simplified pattern --}}
                                           title="Please enter a valid LinkedIn profile URL"
                                           placeholder="Enter LinkedIn Profile URL (e.g., https://linkedin.com/in/yourname)" autocomplete="off" required> {{-- Added required --}}
                                    <small style="font-size: 11px" class="text-start error-message text-danger" id="linkedIn-error"></small>
                                </div>
                            </div>

                            <!-- Role Selection (Commented out) -->
                            {{-- <div class="col-lg-12 form-group pt-2"> ... </div> --}}

                            <!-- Password Field -->
                            <div class="col-12">
                                <div class="form-group">
                                    <i class="bx bx-lock-alt"></i>
                                    <input class="form-control" type="password" name="password" id="register-password"
                                           pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                           title="Must contain at least one number, one uppercase and lowercase letter, and at least 8 characters"
                                           placeholder="Password" required> {{-- Added required --}}
                                    <small style="font-size: 11px" class="text-start error-message text-danger" id="register-password-error"></small>
                                </div>
                            </div>

                            <!-- Confirm Password Field -->
                            <div class="col-12">
                                <div class="form-group">
                                    <i class="bx bx-lock-alt"></i>
                                    <input class="form-control" type="password" name="password_confirmation"
                                           id="register-password_confirmation" placeholder="Confirm Password" required> {{-- Added required --}}
                                    <small class="text-start error-message text-danger" id="register-password_confirmation-error"></small>
                                </div>
                            </div>

                            <!-- Terms Agreement -->
                            <div class="col-lg-12 col-sm-6">
                                <div class="agree-label">
                                    <input type="checkbox" name="agreed" id="register-agreed" required> {{-- Added required --}}
                                    <label for="register-agreed">
                                        I Agree to the <a href="{{ route('termsCondition') }}" target="_blank">Terms of Use</a> and {{-- Added target="_blank" --}}
                                        <a href="{{ route('privacyPolicy') }}" target="_blank">Privacy Policy</a> {{-- Added target="_blank" --}}
                                    </label>
                                </div>
                                {{-- Moved error message closer to the checkbox --}}
                                <small class="text-start error-message text-danger d-block" id="register-agreed-error"></small> {{-- Added d-block --}}
                            </div>

                            @if ($errors->has('g-recaptcha-response'))
                                <div class="col-12 text-center text-danger mt-2">
                                    {{ $errors->first('g-recaptcha-response') }}
                                </div>
                            @endif
                             {{-- General form error message area --}}
                            <div id="register-form-error" class="col-12 text-center text-danger mt-2" style="display: none;"></div>


                            <!-- Submit Button - Removed reCAPTCHA v2 attributes -->
                            <div class="col-lg-12 col-md-12 text-center mt-3"> {{-- Added margin-top --}}
                                <button type="submit" class="default-btn user-all-btn">Register</button>
                            </div>

                            <!-- Login Link -->
                            <div class="col-12 mt-3"> {{-- Added margin-top --}}
                                <p class="account-desc">
                                    Already have an account? <a href="{{ route('home.login')}}">Login</a>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Auth Form Styles */
    .error-message {
        display: none; /* Initially hidden */
        font-size: 0.8rem;
        margin-top: 5px;
        width: 100%; /* Ensure it takes full width */
    }

    .is-invalid {
        border-color: #dc3545 !important; /* Bootstrap's danger color */
    }
    .is-invalid + .error-message {
        display: block !important; /* Show error message when input is invalid */
    }
    /* Style for checkbox error */
    .agree-label input[type="checkbox"].is-invalid + label {
         color: #dc3545; /* Make label text red */
    }
    .agree-label input[type="checkbox"].is-invalid {
         outline: 1px solid #dc3545; /* Add red outline */
    }


    /* Tab System (Keep if used elsewhere, remove if not) */
    .tabs { /* ... styles ... */ }
    .tabs li { /* ... styles ... */ }
    .tabs li a { /* ... styles ... */ }
    .tab_content .tabs_item { display: none; }
    .tab_content .tabs_item.current { display: block; }
</style>


