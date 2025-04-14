<div class="tabs_item">
    <div class="user-all-form">
        <div class="contact-form">
            <form method="POST" action="{{ route('register.post') }}" id="signUpForm" novalidate>
                @csrf
                <div class="row justify-content-center">
                    <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">

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
                        <button type="submit" class="g-recaptcha default-btn user-all-btn"
                                data-sitekey="{{ config('services.recaptcha.key') }}"
                                data-callback='onRegisterSubmit'
                                data-action='submit'>Register</button>
                    </div>

                    <!-- Login Link -->
                    <div class="col-12">
                        <p class="account-desc">
                            Already have an account? <a href="{{ route('login')}}">Login</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>