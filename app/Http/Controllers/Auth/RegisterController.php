<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Events\UserCreating;
use Mail;
use Http;    
use App\Mail\MailNotify;
use App\Mail\VerificationEmail;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Models\Notifications;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Log;
 
class RegisterController extends Controller
{
    
    use RegistersUsers;


    public function showRegister()
    {
        return view('auth.register');
    } 

    public function register(Request $request)
    {
        Log::info('Registration attempt started.', ['email' => $request->input('email'), 'ip' => $request->ip()]);

        $validatedData = $request->validate([
            'g-recaptcha-response' => 'required',
            'name' => [
                'required',
                'string',
                'max:50',
                'unique:users',
                'regex:/^[A-Z][a-z]+(?: [A-Z][a-z]+)*$/'
            ],
            'linkedin' => [
                'required',
                'string',
                'max:255',
                'url',
                'regex:/^https?:\/\/(www\.)?linkedin\.com\/.*$/i',
            ],
            'email' => 'required|string|email|max:50|unique:users',
            'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()],
        ]);

        Log::info('Registration validation passed.', ['email' => $validatedData['email']]);

    
        // Verify reCAPTCHA
        Log::info('Verifying reCAPTCHA.', ['email' => $validatedData['email']]);
    
        $recaptchaResponse = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret'),
            'response' => $request->input('g-recaptcha-response'),
            'remoteip' => $request->ip()
        ]);
    
        $recaptchaBody = $recaptchaResponse->json();

        if (!($recaptchaBody['success'] ?? false) || ($recaptchaBody['score'] ?? 0) < 0.5) {
            Log::warning('reCAPTCHA verification failed.', [
                'email' => $validatedData['email'],
                'recaptcha_response' => $recaptchaBody,
                'ip' => $request->ip()
            ]);
            return back()->withErrors(['captcha' => 'reCAPTCHA verification failed.'])->withInput();
        }
        Log::info('reCAPTCHA verification successful.', ['email' => $validatedData['email'], 'score' => $recaptchaBody['score'] ?? 'N/A']);

    try{
        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'linkedin' => $request->linkedin,
            'role' =>  'Not assigned',
            'password' => Hash::make($request->password),
            'profile_picture' => null,
        ]);
        Log::info('User created successfully.', ['user_id' => $user->id, 'email' => $user->email]);

    
        // Send verification email
        Mail::to($user->email)->send(new VerificationEmail($user));
        Log::info('Verification email sent.', ['user_id' => $user->id, 'email' => $user->email]);

    
        return back()->with('success', 'Please check your email to verify your account.');
        } catch (\Exception $e) {
            Log::error('Error during user creation or email sending.', [
                'email' => $validatedData['email'],
                'error_message' => $e->getMessage(),
                'trace' => $e->getTraceAsString() // Optional: for detailed debugging
            ]);
            // Provide a generic error message to the user
            return back()->withErrors(['error' => 'An unexpected error occurred during registration. Please try again.'])->withInput();
        }
    }

     
}
