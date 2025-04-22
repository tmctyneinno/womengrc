<div class="tabs_item current"> 
    <div class="user-all-form">
        <div class="contact-form">
            <form method="POST" action="{{ route('login.post') }}" id="signInForm" novalidate>
                @csrf
                <div class="row justify-content-center">
                    <!-- Email Input -->
                    <div class="col-lg-12">
                        <div class="form-group">
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

                    <!-- Login Button -->
                    <div class="col-lg-12 col-md-12 text-center">
                        <button type="submit" class="g-recaptcha default-btn user-all-btn"
                                data-sitekey="{{ config('services.recaptcha.key') }}"
                                data-callback='onLoginSubmit' 
                                data-action='submit'>Login</button>
                    </div>

                    <!-- Forgot Password Link -->
                    <div class="col-lg-12 col-sm-6 text-center mt-3">
                        @if (Route::has('password.request'))
                            <a class="forget" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>