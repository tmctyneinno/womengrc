<?php


namespace App\Http\Controllers\Auth; 

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Model\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
 

class AdminLoginController extends Controller
{   
   
    public function showLogin()
    {
        return view('admin.auth.login');
    } 

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
 
        $credentials = $request->only('email', 'password');
        $email = $credentials['email']; 

        Log::channel('admin_auth')->info('Admin login attempt started.', ['email' => $email]); 

 
        if (Auth::guard('admin')->attempt($credentials)) {
            $admin = Auth::guard('admin')->user(); 
            Log::channel('admin_auth')->info('Admin login successful.', ['admin_id' => $admin->id, 'email' => $email]);
            
            // return redirect()->route('admin.index');
            return redirect()->intended(route('admin.index'));
        }
        Log::channel('admin_auth')->warning('Admin login failed: Invalid credentials.', ['email' => $email]);

        return redirect()->back()->withInput($request->only('email'))->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
    }

    public function showChangePasswordForm()
    {
        return view('admin.auth.change_password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:5',
        ]);

        $admin = Auth::guard('admin')->user();

        // Check if the current password matches the one in the database
        if (!Hash::check($request->current_password, $admin->password)) {
            throw ValidationException::withMessages([
                'current_password' => ['The current password is incorrect.'],
            ]);
        }

        // Update admin's password
        $admin->password = Hash::make($request->password);
        $admin->save();

        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login')->with('success', 'Password updated successfully. Please login');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}