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

class RegisterController extends Controller
{
    
    use RegistersUsers;

    
   // protected $redirectTo = ::HOME;
    protected $redirectTo = '/processpaper';
    
    protected function validator(array $data)
    {
        return  $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required',
            'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()],
        ]);
    } 

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    
   

    
    public function register(Request $request)
    {
        
        // Validate reCAPTCHA
        $request->validate([
            'g-recaptcha-response' => 'required'
        ]);

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret'),
            'response' => $request->input('g-recaptcha-response'),
            'remoteip' => $request->ip()
        ]);

        if (!$response->json()['success']) {
            return redirect()->back()->with('error', 'reCAPTCHA verification failed.');
        }

        // Validate the input
        $request->validate([
            'name' => 'required|string|max:50|unique:users',
            'email' => 'required|string|email|max:50|unique:users',
            'role' => 'required',
            'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()],
            // 'password' => 'required|string|min:8|confirmed',
        ]);
 
        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'profile_picture' => null,
        ]);
 
        // Send verification email
        Mail::to($user->email)->send(new VerificationEmail($user));

        // Redirect to the intended page or dashboard
        return redirect()->back()->with('success', 'Please check your email to verify your account.');
    }
}
