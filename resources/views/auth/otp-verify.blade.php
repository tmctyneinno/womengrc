@extends('layouts.app')
<style>
    .navbar-custom{
        background-color: #2a2a2a !important;
    }
    .form-group select {
        padding-top: 50px !important;
    }
</style>
@section('content')
 
<div class="user-area">
    <div class="container-fluid m-0">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-7 col-xl-6  p-0">
                <div class="user-img">
                    <img src="{{ asset('assets/img/login-img.jpg')}}" alt="Images">
                </div>
            </div>
 
            <div class="col-lg-5 col-xl-6">
                <div class="user-section text-center">
                    <div class="user-conten pt-5">
                        <h2>Login</h2> 
                        
                    </div> 
                    <div class="tab user-tab">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-12">
                                <div class="tab_content current active">
                                    <div class="tabs_item current"> 
                                        <div class="user-all-form">
                                            <div class="contact-form">
                                                <form method="POST" action="{{ route('otp.verify.post') }}" id="otpForm" novalidate>
                                                    @csrf
                                                    <div class="row justify-content-center">
                                                        <div class="col-lg-12 text-center mb-4">
                                                            <h4>OTP Verification</h4>
                                                            <p>We've sent a 6-digit OTP to your email. Please enter it below.</p>
                                                        </div>

                                                        <!-- OTP Input -->
                                                        <div class="col-lg-12">
                                                            <div class="form-group"> 
                                                                <i class="bx bx-lock"></i>
                                                                <input type="text" 
                                                                    name="otp" 
                                                                    id="otp" 
                                                                    class="form-control @error('otp') is-invalid @enderror" 
                                                                    placeholder="Enter OTP" 
                                                                    maxlength="6"
                                                                    autocomplete="off"
                                                                    autofocus>
                                                                <small style="font-size: 11px" class="text-start error-message text-danger" id="otp-error"></small>
                                                            </div>
                                                        </div>

                                                        <!-- Resend OTP Link -->
                                                        <div class="col-lg-12 text-center mt-2">
                                                            <p>Didn't receive OTP? <a href="#" id="resendOtp" style="color: #dc3545">Resend OTP</a></p>
                                                        </div>

                                                        <!-- Verify Button -->
                                                        <div class="col-lg-12 col-md-12 text-center mt-3">
                                                            <button type="submit" class="default-btn user-all-btn">Verify OTP</button>
                                                        </div>

                                                        <!-- Back to Login Link -->
                                                        <div class="col-lg-12 col-sm-6 text-center mt-4">
                                                            <a style="color: #dc3545" href="{{ route('login') }}">Back to Login</a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection





<script>
document.addEventListener('DOMContentLoaded', function() {
    const otpForm = document.getElementById('otpForm');
    const otpInput = document.getElementById('otp');
    const otpError = document.getElementById('otp-error');
    const resendOtpBtn = document.getElementById('resendOtp');

    // OTP input validation
    otpInput.addEventListener('input', function() {
        this.value = this.value.replace(/[^0-9]/g, '');
        if (this.value.length === 6) {
            otpError.style.display = 'none';
            otpInput.classList.remove('is-invalid');
        }
    });

    // Form submission
    otpForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        if (otpInput.value.length !== 6) {
            otpError.textContent = 'Please enter a 6-digit OTP';
            otpError.style.display = 'block';
            otpInput.classList.add('is-invalid');
            otpInput.focus();
            return;
        }

        this.submit();
    });

    // Resend OTP functionality
    resendOtpBtn.addEventListener('click', function(e) {
        e.preventDefault();
        
        fetch('{{ route("login.resend.otp") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('A new OTP has been sent to your email.');
            } else {
                alert('Failed to resend OTP. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        });
    }); 
});
</script>