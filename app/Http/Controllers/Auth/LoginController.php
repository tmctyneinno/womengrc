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
        $this->validateLogin($request);

        $credentials = $this->credentials($request);

        // Attempt to log in with credentials
        if (Auth::attempt($credentials)) {
            if (Auth::user()->hasVerifiedEmail()) {
                // dd(Auth::user()->role);
                if (Auth::user()->role === 'facilitator') {
                    return redirect()->route('facilitator.dashboard'); 
                }
                if (Auth::user()->role === 'advisory') {
                    return redirect()->route('advisory.dashboard'); 
                } 
                if (Auth::user()->role === 'guests') { 
                    return redirect()->route('guests.dashboard'); 
                }
                return redirect()->route('user.dashboard');
            }

            // Logout if email is not verified
            Auth::logout();
            return $this->sendFailedLoginResponse($request);
        }

        // Handle failed login attempt
        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ])->onlyInput('email'); 
    }


    
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => 'Your account has not been verified. Please check your email to verify your account.',
        ]);
    }
}
