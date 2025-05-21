<div class="tabs_item current"> 
    <div class="user-all-form">
        <div class="contact-form">
            <form method="POST" action="{{ route('login.post') }}" id="signInForm" novalidate>
                @csrf
                <div class="row justify-content-center">
                    <!-- Email Input -->
                    <div class="col-lg-12">
                        <div class="form-group "> 
                            <i class="bx bx-user"></i>
                            <input type="email" 
                                   name="email" 
                                   id="login-email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   placeholder="Email" 
                                   value="{{ old('email') }}" 
                                   autocomplete="email" 
                                   autofocus>
                            <small style="font-size: 11px" class="text-start error-message text-danger" id="login-email-error"></small>
                            <div class="d-flex justify-content-end">
                                @if (Route::has('password.request'))
                                    <a style="color: #dc3545" class="text-end p-1" href="{{ route('password.request') }}">
                                        Forgot Your Password?
                                    </a>
                                @endif  
                            </div>
                        </div>
                       
                    </div>
                    

                    <!-- Password Input -->
                    <div class="col-12">
                        <div class="form-group">
                            <i class="bx bx-lock-alt"></i>
                            <input type="password" 
                                   name="password" 
                                   id="login-password"
                                   class="form-control @error('password') is-invalid @enderror" 
                                   placeholder="Password" 
                                   autocomplete="current-password">
                            <small style="font-size: 11px" class="text-start error-message text-danger" id="login-password-error"></small>
                        </div>
                    </div>
                    @if ($errors->has('captcha'))
                        <div class="text-danger">{{ $errors->first('captcha') }}</div>
                    @endif
                    <!-- Checkbox -->
                    <div class="col-lg-12 col-sm-12 ">
                        <div class="form-group ">
                            <div class="agree-label d-flex justify-content-start align-items-start">
                               <input type="checkbox" name="agree_terms" id="chb1" required>
                                <label for="chb1">
                                    I agree to all 
                                    <a href="{{ route('consent') }} " target="_blank"><span style="color: #dc3545; text-transform:capitalize" >Consent Notice</span></a> and 
                                    <a href="{{ route('privacyPolicy') }}" target="_blank"><span style="color: #dc3545; text-transform:capitalize" > Privacy Policy </span></a>
                                </label>
                            </div>
                        </div>
                    </div>
                    <small style="font-size: 11px" class="text-start error-message text-danger" id="login-agree-terms-error"></small>

                    <!-- Login Button -->
                    <div class="col-lg-12 col-md-12 text-center mt-3">
                        <button type="submit" class="g-recaptcha default-btn user-all-btn"
                                data-sitekey="{{ config('services.recaptcha.key') }}"
                                data-callback='onLoginSubmit' 
                                data-action='submit'>Login</button>
                    </div> 

                    <!-- Forgot Password Link -->
                   
                    
                    
                    <div class="col-lg-12 col-sm-6 text-center">
                        <br/>
                        <br/>
                        <a style="color: #dc3545"  href="{{ route('home.register') }}">Don't have an account Sign up</a>
                    </div>
                </div>
                
            </form>
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

    // Initialize login form validation
    initLoginForm();
    
});

function initLoginForm() {
    const form = document.getElementById('signInForm');
    if (!form) return;

    const fields = {
        email: {
            element: document.getElementById('login-email'),
            error: document.getElementById('login-email-error'),
            validate: function() {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!this.element.value.trim()) {
                    this.error.textContent = 'Email is required';
                    this.element.classList.add('is-invalid');
                    this.error.style.display = 'block';
                    return false;
                }
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
        password: {
            element: document.getElementById('login-password'),
            error: document.getElementById('login-password-error'),
            validate: function() {
                if (!this.element.value.trim()) {
                    this.error.textContent = 'Password is required';
                    this.element.classList.add('is-invalid');
                    this.error.style.display = 'block';
                    return false;
                }
                this.element.classList.remove('is-invalid');
                this.error.style.display = 'none';
                return true;
            }
        },
        agree_terms: {
            element: document.getElementById('chb1'),
            error: document.getElementById('login-agree-terms-error'),
            validate: function() {
                if (!this.element.checked) {
                    this.error.textContent = 'You must agree to the terms and policy';
                    this.element.classList.add('is-invalid'); // You might want a different class or style for checkbox errors
                    this.error.style.display = 'block';
                    return false;
                }
                this.element.classList.remove('is-invalid');
                this.error.style.display = 'none';
                return true;
            }
        }
    };

    setupFormValidation(form, fields, 'onLoginSubmit');
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
            grecaptcha.reset();
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

        // If all fields are valid, trigger reCAPTCHA v3
        grecaptcha.ready(function() {
            grecaptcha.execute('{{ config('services.recaptcha.key') }}', {action: 'register'})
                .then(function(token) {
                    // Set the token in the hidden input
                    document.getElementById('g-recaptcha-response').value = token;

                    // Now call the final submit logic (includes re-validation)
                    window[onSubmitFunctionName](token);
                });
        });
    });
}
</script>
