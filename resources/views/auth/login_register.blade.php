
<div class="col-lg-12 col-md-12">
    <div class="tab_content current active">
        @include('auth.login_form')
        @include('auth.register_form')
    </div>
</div>

@push('scripts')
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.key') }}"></script>

    {{-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> --}}
    <script src="{{ asset('js/auth.js') }}"></script>
@endpush

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
    
    // Initialize register form validation
    initRegisterForm();
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
        }
    };

    setupFormValidation(form, fields, 'onLoginSubmit');
}

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

