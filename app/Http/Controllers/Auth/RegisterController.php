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


    public function showRegister()
    {
        return view('auth.register');
    } 

    public function register(Request $request)
    {
        $request->validate([
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
    

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'linkedin' => $request->linkedin,
            'role' =>  'Not assigned',
            'password' => Hash::make($request->password),
            'profile_picture' => null,
        ]);
    
        // Send verification email
        Mail::to($user->email)->send(new VerificationEmail($user));
    
        return back()->with('success', 'Please check your email to verify your account.');
    }
     
}
