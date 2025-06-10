<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Closure;


class AdminAuthenticate
{
    public function handle(Request $request, Closure $next)
    { 
    
        // Check if user is authenticated with the 'admin' guard
        // and if that authenticated admin user has the 'is_admin' property.
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login')->with('error', 'You need admin access');
        } 
        // if (!Auth::guard('admin')->user()->is_admin) {
        //     return redirect()->route('admin.login')->with('error', 'You need admin access');
        // }

        return $next($request);
    }
}
