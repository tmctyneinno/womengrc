<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
 
    /**
     * Create a new controller instance.
     *
     * @return void 
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    
    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Extract credentials
        $credentials = $request->only('email', 'password');
    
        // Attempt authentication
        if (Auth::attempt($credentials)) {
            // Check if email is verified
            if (Auth::user()->hasVerifiedEmail()) {
                // Redirect based on user role
                switch (Auth::user()->role) {
                    case 'facilitator':
                        return redirect()->route('facilitator.dashboard');
                    case 'advisory':
                        return redirect()->route('advisory.dashboard');
                    case 'guests':
                        return redirect()->route('guests.dashboard');
                    default:
                        return redirect()->route('user.dashboard');
                }  
            } else {
                // Logout if email is not verified
                Auth::logout();
                return $this->sendFailedLoginResponse($request, 'Please verify your email address.');
            }
        }
    
        // Handle failed login attempt
        return $this->sendFailedLoginResponse($request, 'Invalid credentials.');
    }
    
    


    
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => 'Your account has not been verified. Please check your email to verify your account.',
        ]);
    }
}
