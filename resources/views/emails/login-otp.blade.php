@component('mail::message')
# Your Login OTP Code

Your one-time password (OTP) for login is:

<h2 style="text-align: center; margin: 20px 0;">{{ $otp }}</h2>

This OTP will expire in 15 minutes. Please do not share this code with anyone.

Thanks,<br>
{{ config('app.name') }}
@endcomponent 
