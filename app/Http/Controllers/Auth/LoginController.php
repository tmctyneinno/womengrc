<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use App\Models\OtpVerification;
use App\Mail\LoginOtpMail;
use App\Models\User;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::validate($credentials)) {
            $user = User::where('email', $credentials['email'])->first();
            
            if (!$user->hasVerifiedEmail()) {
                return $this->sendFailedLoginResponse($request, 'Please verify your email address first.');
            }

            // Generate OTP
            $otp = random_int(100000, 999999); 
            $otpExpiresAt = now()->addMinutes(15);

            // Store OTP in database instead of session
            OtpVerification::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'otp' => $otp,
                    'expires_at' => $otpExpiresAt,
                    'remember' => $request->has('remember')
                ]
            );

            // Store user ID in session
            session(['otp_user_id' => $user->id]);
            // Send OTP email
            try {
                Mail::to($user->email)->send(new LoginOtpMail($otp));
                Log::info('OTP sent to user', ['user_id' => $user->id]);

            } catch (\Exception $e) {
                Log::error('Failed to send OTP email', ['user_id' => $user->id, 'error' => $e->getMessage()]);
                return $this->sendFailedLoginResponse($request, 'Failed to send OTP. Please try again.'.$e->getMessage());
            }

            // Redirect to OTP verification page
            return redirect()->route('otp.verify');
        }

        // Handle failed login attempt
        return $this->sendFailedLoginResponse($request, 'Invalid credentials.');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6' 
        ]);

        // Get user ID from session
        $userId = session('otp_user_id');
        
        if (!$userId) {
            return redirect()->route('login')->withErrors(['otp' => 'Session expired. Please login again.']);
        }

        // Get the OTP record from database
        $otpRecord = OtpVerification::where('user_id', $userId)
            ->where('expires_at', '>', now())
            ->first();

        if (!$otpRecord) {
            return redirect()->route('login')->withErrors(['otp' => 'OTP expired. Please login again.']);
        }

        if ($request->otp != $otpRecord->otp) {
            return back()->withErrors(['otp' => 'Invalid OTP. Please try again.']);
        }

        // OTP verified, log the user in
        $user = User::find($userId);
        Auth::login($user, $otpRecord->remember);

        // Clear OTP record from database and session
        $otpRecord->delete();
        session()->forget('otp_user_id');

        // Log and redirect based on user role
        switch ($user->role) { 
            case 'facilitator':
                Log::info('Redirecting to facilitator dashboard.', ['user_id' => $user->id]);
                return redirect()->route('facilitator.dashboard');
            case 'advisory_member':
                Log::info('Redirecting to advisory dashboard.', ['user_id' => $user->id]);
                return redirect()->route('advisory.dashboard');
            case 'guests':
                Log::info('Redirecting to guests dashboard.', ['user_id' => $user->id]);
                return redirect()->route('guests.dashboard'); 
            default:
                Log::info('Redirecting to default user dashboard.', ['user_id' => $user->id]);
                return redirect()->route('user.dashboard');
        }
    }

    protected function sendFailedLoginResponse(Request $request, $message = null)
    {
        throw ValidationException::withMessages([
            $this->username() => [$message ?? 'Your account has not been verified. Please check your email to verify your account.'],
        ]);
    }

    public function resendOtp(Request $request)
    {
        $otpData = Session::get('otp_data');
        
        if (!$otpData) {
            return response()->json(['success' => false, 'message' => 'Session expired. Please login again.']);
        }

        // Generate new OTP
        $newOtp = random_int(100000, 999999); // Generate a 6-digit numeric OTP
        $otpExpiresAt = now()->addMinutes(15);

       // Update OTP in database
        $otpRecord = OtpVerification::updateOrCreate(
            ['user_id' => $userId],
            [
                'otp' => $newOtp,
                'expires_at' => $otpExpiresAt,
                'remember' => OtpVerification::where('user_id', $userId)->value('remember') ?? false
            ]
        );

        // Get user
        $user = User::find($otpData['user_id']);

        // Send new OTP email
        try {
            Mail::to($user->email)->send(new LoginOtpMail($newOtp));
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error('Failed to resend OTP email', ['user_id' => $user->id, 'error' => $e->getMessage()]);
            return response()->json(['success' => false, 'message' => 'Failed to resend OTP.'. $e->getMessage()]);
        }
    }

    public function showOtpForm()
    {
        Log::debug('Session data at otp.verify', [
            'session_id' => session()->getId(),
            'all_session' => session()->all(),
            'otp_user_id_exists' => session()->has('otp_user_id')
        ]);
        if (!session()->has('otp_user_id')) {
            return redirect()->route('login');
        }
        
        $otpRecord = OtpVerification::where('user_id', session('otp_user_id'))
            ->where('expires_at', '>', now())
            ->exists();
        
        if (!$otpRecord) {
            session()->forget('otp_user_id');
            return redirect()->route('login')->withErrors(['otp' => 'OTP expired. Please login again.']);
        }
        
        return view('auth.otp-verify');
    }
}