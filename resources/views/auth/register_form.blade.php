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
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <i class="bx bx-user"></i>
                                    <input type="text" name="firstname" id="register-firstname" class="form-control"
                                           pattern=".{3,}" title="First name must be at least 3 characters"
                                           placeholder="First name" autocomplete="off" required> {{-- Added required for better semantics --}}
                                    <small style="font-size: 11px" class="text-start error-message text-danger" id="register-firstname-error"></small>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                 <div class="form-group">
                                    <i class="bx bx-user"></i> 
                                    <input type="text" name="lastname" id="register-lastname" class="form-control"
                                           pattern=".{3,}" title="Last name must be at least 3 characters"
                                           placeholder="Last name" autocomplete="off" required> {{-- Added required for better semantics --}}
                                    <small style="font-size: 11px" class="text-start error-message text-danger" id="register-lastname-error"></small>
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
                                           placeholder="Enter LinkedIn Profile URL" autocomplete="off" required> {{-- Added required --}}
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
                            <div class="col-lg-12 col-sm-12">
                                <div class="agree-label d-flex justify-content-start align-items-start">
                                    {{-- Added d-flex and align-items-center for better alignment --}}
                                    <input type="checkbox" name="agreed" id="register-agreed" required> {{-- Added required --}}
                                    <label for="register-agreed">
                                        I Agree to the <a href="{{ route('consent') }}" target="_blank"> 
                                            <span style="color: #dc3545; text-transform:capitalize">Consent Notice</span></a> 
                                        and
                                        <a href="{{ route('privacyPolicy') }}" target="_blank"> <span style="color: #dc3545; text-transform:capitalize">Privacy Policy </span></a> 
                                    </label>
                                </div>
                                {{-- Moved error message closer to the checkbox --}}
                                <small class="text-start error-message text-danger d-block" id="register-agreed-error"></small> {{-- Added d-block --}}
                            </div>

                            {{-- Display server-side captcha error if it exists --}}
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Tab switching (Keep if needed, remove if this form is standalone)
    const tabs = document.querySelectorAll('.tabs li');
    const tabContents = document.querySelectorAll('.tab_content .tabs_item');

    tabs.forEach((tab, index) => {
        tab.addEventListener('click', (e) => {
            e.preventDefault();
            tabs.forEach(t => t.classList.remove('current'));
            tabContents.forEach(c => c.classList.remove('current'));
            tab.classList.add('current');
            if (tabContents[index]) { // Check if content exists
                 tabContents[index].classList.add('current');
            }
        });
    });

    // Initialize register form validation
    initRegisterForm();
});

function initRegisterForm() {
    const form = document.getElementById('signUpForm');
    const formErrorElement = document.getElementById('register-form-error'); // General form error display
    if (!form) {
        console.error("Sign up form not found!");
        return;
    }

    // --- Field Definitions with Validation Logic ---
    const fields = {
        firstname: { // Changed from 'name' to 'firstname' for clarity
            element: document.getElementById('register-firstname'),
            error: document.getElementById('register-firstname-error'),
            validate: function() {
                const isValid = this.element.value.trim().length >= 3;
                this.error.textContent = isValid ? '' : 'First name must be at least 3 characters';
                this.element.classList.toggle('is-invalid', !isValid);
                this.error.style.display = isValid ? 'none' : 'block';
                return isValid;
            }
        },
        lastname: { // Added new field definition for lastname
            element: document.getElementById('register-lastname'),
            error: document.getElementById('register-lastname-error'),
            validate: function() {
                const isValid = this.element.value.trim().length >= 3;
                this.error.textContent = isValid ? '' : 'Last name must be at least 3 characters';
                this.element.classList.toggle('is-invalid', !isValid);
                this.error.style.display = isValid ? 'none' : 'block';
                return isValid;
            }
        },
        email: {
            element: document.getElementById('register-email'),
            error: document.getElementById('register-email-error'),
            validate: function() {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                const isValid = emailRegex.test(this.element.value.trim());
                this.error.textContent = isValid ? '' : 'Please enter a valid email address';
                this.element.classList.toggle('is-invalid', !isValid);
                this.error.style.display = isValid ? 'none' : 'block';
                return isValid;
            }
        },
        linkedIn: {
            element: document.getElementById('linkedIn'),
            error: document.getElementById('linkedIn-error'),
            validate: function() {
                const value = this.element.value.trim();
                // Simpler check for a valid URL containing linkedin.com
                const linkedInRegex = /^https?:\/\/(?:www\.)?linkedin\.com\/.+/;
                const isValid = value === '' || linkedInRegex.test(value); // Allow empty or valid URL
                this.error.textContent = isValid ? '' : 'Please enter a valid LinkedIn profile URL ';
                this.element.classList.toggle('is-invalid', !isValid && value !== ''); // Only invalid if not empty and doesn't match
                this.error.style.display = isValid || value === '' ? 'none' : 'block';
                return isValid; // Or return isValid if mandatory
            }
        },
        password: {
            element: document.getElementById('register-password'),
            error: document.getElementById('register-password-error'),
            validate: function() {
                // Using the pattern attribute for basic check, JS for detailed message
                const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
                const isValid = passwordRegex.test(this.element.value);
                this.error.textContent = isValid ? '' : 'Password must be 8+ characters with uppercase, lowercase, and a number.';
                this.element.classList.toggle('is-invalid', !isValid);
                this.error.style.display = isValid ? 'none' : 'block';
                return isValid;
            }
        },
        password_confirmation: {
            element: document.getElementById('register-password_confirmation'),
            error: document.getElementById('register-password_confirmation-error'),
            validate: function() {
                const password = document.getElementById('register-password').value;
                const isValid = this.element.value === password && this.element.value !== '';
                this.error.textContent = isValid ? '' : 'Passwords do not match';
                const passwordFieldValid = fields.password.validate(); // Re-validate password field
                const isInvalid = (!isValid || !passwordFieldValid) && this.element.value !== '';

                this.element.classList.toggle('is-invalid', isInvalid);
                this.error.style.display = isInvalid ? 'block' : 'none';
                return isValid;
            }
        },
        agreed: {
            element: document.getElementById('register-agreed'),
            error: document.getElementById('register-agreed-error'),
            validate: function() {
                const isValid = this.element.checked;
                this.error.textContent = isValid ? '' : 'You must agree to the terms and conditions';
                // Add/remove is-invalid class for styling the checkbox/label if needed
                this.element.classList.toggle('is-invalid', !isValid);
                this.error.style.display = isValid ? 'none' : 'block';
                return isValid;
            }
        }
    };

    // --- Setup Validation Listeners ---
    Object.keys(fields).forEach(key => {
        const field = fields[key];
        // Validate on blur (when user leaves the field)
        field.element.addEventListener('blur', () => field.validate());

        // Clear error on input (provides instant feedback)
        const eventType = field.element.type === 'checkbox' ? 'change' : 'input';
        field.element.addEventListener(eventType, () => {
            // Only clear if it was previously invalid
            if (field.element.classList.contains('is-invalid')) {
                field.element.classList.remove('is-invalid');
                field.error.style.display = 'none';
                field.error.textContent = ''; // Clear message
            }
             // Special handling for password confirmation - revalidate on password input
             if (key === 'password' && fields.password_confirmation.element.value) {
                fields.password_confirmation.validate();
            }
        });
    });

    // --- Form Submission Handler ---
    form.addEventListener('submit', function(event) {
        event.preventDefault(); 
        event.stopPropagation();

        // Clear previous general form errors
        if(formErrorElement) formErrorElement.style.display = 'none';

        // Validate all fields first
        let isFormValid = true;
        Object.keys(fields).forEach(key => {
            if (!fields[key].validate()) {
                isFormValid = false;
            }
        });

        if (!isFormValid) {
            // Find the first invalid field and focus it
            const firstInvalidField = form.querySelector('.is-invalid');
            if (firstInvalidField) {
                firstInvalidField.focus();
            }
            console.log("Client-side validation failed.");
            return; // Stop submission if validation fails
        }

        // If client-side validation passes, execute reCAPTCHA v3
        const recaptchaSiteKey = '{{ config('services.recaptcha.key') }}'; // Get site key
        if (!recaptchaSiteKey) {
             console.error("reCAPTCHA Site Key is not configured.");
             if(formErrorElement) {
                 formErrorElement.textContent = "Registration system error. Please try again later.";
                 formErrorElement.style.display = 'block';
             }
             return;
        }
        if (typeof grecaptcha === 'undefined' || typeof grecaptcha.ready === 'undefined') {
            console.error("reCAPTCHA script not loaded correctly.");
             if(formErrorElement) {
                 formErrorElement.textContent = "Could not connect to reCAPTCHA. Please check your connection or ad blocker.";
                 formErrorElement.style.display = 'block';
             }
            return;
        }


        // Disable submit button to prevent multiple clicks
        const submitButton = form.querySelector('button[type="submit"]');
        if(submitButton) submitButton.disabled = true;


        grecaptcha.ready(function() {
            grecaptcha.execute(recaptchaSiteKey, { action: 'register' }) 
                .then(function(token) {
                    document.getElementById('g-recaptcha-response').value = token;
                    console.log("reCAPTCHA token obtained, submitting form.");
                    form.submit();
                })
                .catch(function(error) {
                     console.error("reCAPTCHA execution failed:", error);
                     if(formErrorElement) {
                         formErrorElement.textContent = "reCAPTCHA validation failed. Please try again.";
                         formErrorElement.style.display = 'block';
                     }
                     // Re-enable submit button on error
                     if(submitButton) submitButton.disabled = false;
                });
        });
    });
}

</script>


<!-- https://linkedin.com/in/yourname -->