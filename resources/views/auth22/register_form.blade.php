
<div class="col-lg-12 col-md-12">
    <div class="tab_content current active">
        <div class="tabs_item">
            <div class="user-all-form">
                <div class="contact-form">
                    <form method="POST" action="{{ route('register.post') }}" >
                        {{-- <form method="POST" action="{{ route('register.post') }}" id="signUpForm" novalidate> --}}
                        @csrf 
                        <div class="row justify-content-center">
                           
                            <!-- Username Field -->
                            <div class="col-lg-12">
                                <div class="form-group"> 
                                    <i class="bx bx-user"></i>
                                    <input type="text" name="name" id="register-name" class="form-control" 
                                           pattern=".{3,}" title="Username must be at least 3 characters"
                                           placeholder="Full name" autocomplete="off">
                                    <small style="font-size: 11px" class="text-start error-message text-danger" id="register-name-error"></small>
                                </div>
                            </div>
        
                            <!-- Email Field -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <i class="flaticon-email-2"></i>
                                    <input type="email" name="email" id="register-email" class="form-control" placeholder="Email">
                                    <small style="font-size: 11px" class="text-start error-message text-danger" id="register-email-error"></small>
                                </div>
                            </div>
        
                            <!-- Linkedin Field -->
                            <div class="col-lg-12">
                                <div class="form-group"> 
                                    <i class="bx bx-user"></i>
                                    <input type="text" name="linkedin" id="linkedIn" class="form-control" 
                                           pattern=".{3,}" title="LinkedIn must be at least 3 characters"
                                           placeholder="Enter LinkedIn Profile url" autocomplete="off">
                                    <small style="font-size: 11px" class="text-start error-message text-danger" id="linkedIn-error"></small>
                                </div>
                            </div>
        
                            <!-- Role Selection -->
                            {{-- <div class="col-lg-12 form-group pt-2">
                                <select name="role" id="register-role" class="form-control" aria-label="Default select example">
                                    <option value="" selected disabled>Select Role</option>
                                    <option value="advisory">Advisory Board Members</option>
                                    <option value="facilitator">Facilitator</option>
                                    <option value="mentor">Mentor</option>
                                    <option value="mentee">Mentee</option>
                                    <option value="guests">Guests</option>
                                </select>
                                <small class="text-start error-message text-danger" id="register-role-error"></small>
                            </div> --}}
        
                            <!-- Password Field -->
                            <div class="col-12">
                                <div class="form-group">
                                    <i class="bx bx-lock-alt"></i>
                                    <input class="form-control" type="password" name="password" id="register-password" 
                                           pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                                           title="Must contain at least one number, one uppercase and lowercase letter, and at least 8 characters"
                                           placeholder="Password">
                                    <small style="font-size: 11px" class="text-start error-message text-danger" id="register-password-error"></small>
                                </div>
                            </div>
        
                            <!-- Confirm Password Field -->
                            <div class="col-12">
                                <div class="form-group">
                                    <i class="bx bx-lock-alt"></i>
                                    <input class="form-control" type="password" name="password_confirmation" 
                                           id="register-password_confirmation" placeholder="Confirm Password">
                                    <small class="text-start error-message text-danger" id="register-password_confirmation-error"></small>
                                </div>
                            </div>
        
                            <!-- Terms Agreement -->
                            <div class="col-lg-12 col-sm-6">
                                <div class="agree-label">
                                    <input type="checkbox" name="agreed" id="register-agreed">
                                    <label for="register-agreed">
                                        I Agree to the <a href="{{ route('termsCondition') }}">Terms of Use</a> and 
                                        <a href="{{ route('privacyPolicy') }}">Privacy Policy</a>
                                    </label>
                                </div>
                            </div>
                            @if ($errors->has('captcha'))
                                <div class="text-danger">{{ $errors->first('captcha') }}</div>
                            @endif
        
                            <small class="text-start error-message text-danger" id="register-agreed-error"></small>
        
        
                            <!-- Submit Button -->
                            <div class="col-lg-12 col-md-12 text-center">
                                <button type="submit" class=" default-btn user-all-btn"
                                        data-action='submit'>Register</button>
                            </div>
        
                            <!-- Login Link -->
                            <div class="col-12">
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
        display: none;
        font-size: 0.8rem;
        margin-top: 5px;
    }

    .is-invalid {
        border-color: #dc3545 !important;
    }

    .forget {
        color: #6c757d;
        text-decoration: none;
    }

    .forget:hover {
        color: #0d6efd;
        text-decoration: underline;
    }

    /* Tab System */
    .tabs {
        list-style: none;
        padding: 0;
        margin: 0 0 20px 0;
        display: flex;
        justify-content: center;
    }

    .tabs li {
        margin: 0 10px;
    }

    .tabs li a {
        display: block;
        padding: 10px 20px;
        text-decoration: none;
        color: #6c757d;
        border-bottom: 2px solid transparent;
    }

   

    .tab_content .tabs_item {
        display: none;
    }

    .tab_content .tabs_item.current {
        display: block;
    }
</style>

<script>
// Tab Switching Functionality
document.addEventListener('DOMContentLoaded', function() {
    // Tab switching
    const tabs = document.querySelectorAll('.tabs li');
    const tabContents = document.querySelectorAll('.tab_content .tabs_item');
    
    tabs.forEach((tab, index) => {
        tab.addEventListener('click', (e) => {
            e.preventDefault();
            
            // Remove current class from all tabs and contents
            tabs.forEach(t => t.classList.remove('current'));
            tabContents.forEach(c => c.classList.remove('current'));
            
            // Add current class to clicked tab and corresponding content
            tab.classList.add('current');
            tabContents[index].classList.add('current');
        });
    });

    // Initialize register form validation
    initRegisterForm();
});



function initRegisterForm() {
    const form = document.getElementById('signUpForm');
    if (!form) return;

    const fields = {
        name: {
            element: document.getElementById('register-name'),
            error: document.getElementById('register-name-error'),
            validate: function() {
                if (this.element.value.trim().length < 3) {
                    this.error.textContent = 'Username must be at least 3 characters';
                    this.element.classList.add('is-invalid');
                    this.error.style.display = 'block';
                    return false;
                }
                this.element.classList.remove('is-invalid');
                this.error.style.display = 'none';
                return true;
            }
        },
        email: {
            element: document.getElementById('register-email'),
            error: document.getElementById('register-email-error'),
            validate: function() {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(this.element.value)) {
                    this.error.textContent = 'Please enter a valid email address';
                    this.element.classList.add('is-invalid');
                    this.error.style.display = 'block';
                    return false;
                }
                this.element.classList.remove('is-invalid');
                this.error.style.display = 'none';
                return true;
            }
        },

        linkedIn: {
            element: document.getElementById('linkedIn'),
            error: document.getElementById('linkedIn-error'),
            validate: function() {
                const value = this.element.value.trim();
                const linkedInRegex = /^https?:\/\/(www\.)?linkedin\.com\/(in|pub)\/[a-zA-Z0-9_-]+\/?$/;

                if (value.length < 3) {
                    this.error.textContent = 'LinkedIn Profile must be at least 3 characters';
                    this.element.classList.add('is-invalid');
                    this.error.style.display = 'block';
                    return false;
                }
                if (!linkedInRegex.test(value)) {
                    this.error.textContent = 'Please enter a valid LinkedIn profile URL (e.g. https://www.linkedin.com/in/yourname)';
                    this.element.classList.add('is-invalid');
                    this.error.style.display = 'block';
                    return false;
                }
                this.element.classList.remove('is-invalid');
                this.error.style.display = 'none';
                return true;
            }
        },
       
        password: {
            element: document.getElementById('register-password'),
            error: document.getElementById('register-password-error'),
            validate: function() {
                const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
                if (!passwordRegex.test(this.element.value)) {
                    this.error.textContent = 'Password must contain at least one number, one uppercase and lowercase letter, and at least 8 characters';
                    this.element.classList.add('is-invalid');
                    this.error.style.display = 'block';
                    return false;
                }
                this.element.classList.remove('is-invalid');
                this.error.style.display = 'none';
                return true;
            }
        },
        password_confirmation: {
            element: document.getElementById('register-password_confirmation'),
            error: document.getElementById('register-password_confirmation-error'),
            validate: function() {
                const password = document.getElementById('register-password').value;
                if (this.element.value !== password) {
                    this.error.textContent = 'Passwords do not match';
                    this.element.classList.add('is-invalid');
                    this.error.style.display = 'block';
                    return false;
                }
                this.element.classList.remove('is-invalid');
                this.error.style.display = 'none';
                return true;
            }
        },
        agreed: {
            element: document.getElementById('register-agreed'),
            error: document.getElementById('register-agreed-error'),
            validate: function() {
                if (!this.element.checked) {
                    this.error.textContent = 'You must agree to the terms and conditions';
                    this.error.style.display = 'block';
                    return false;
                }
                this.error.style.display = 'none';
                return true;
            }
        }
    };

    setupFormValidation(form, fields, 'onRegisterSubmit');
}

function setupFormValidation(form, fields, onSubmitFunctionName) {
    // Add event listeners for real-time validation
    Object.keys(fields).forEach(field => {
        fields[field].element.addEventListener('blur', function() {
            fields[field].validate();
        });
        
        if (field === 'role') {
            fields[field].element.addEventListener('change', function() {
                fields[field].validate();
            });
        }
        
        fields[field].element.addEventListener('input', function() {
            if (this.value.trim()) {
                fields[field].element.classList.remove('is-invalid');
                fields[field].error.style.display = 'none';
            }
        });
    });

    // Form submission handler
    window[onSubmitFunctionName] = function(token) {
        let isValid = true;
        
        // Validate all fields
        Object.keys(fields).forEach(field => {
            if (!fields[field].validate()) {
                isValid = false;
            }
        });

        if (isValid) {
            form.submit();
        } else {
            const firstInvalidField = Object.values(fields).find(field => 
                field.element.classList.contains('is-invalid')
            );
            if (firstInvalidField) {
                firstInvalidField.element.focus();
            }
        }
    };

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default for manual handling
        event.stopPropagation();

        let isValid = true;
        Object.keys(fields).forEach(field => {
            if (!fields[field].validate()) {
                isValid = false;
            }
        });
        
        if (!isValid) {
            const firstInvalidField = Object.values(fields).find(field =>
                field.element.classList.contains('is-invalid')
            );
            if (firstInvalidField) {
                firstInvalidField.element.focus();
            }
            return;
        }

       
    });
}
</script>