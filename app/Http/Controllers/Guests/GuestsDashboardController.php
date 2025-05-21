<?php

namespace App\Http\Controllers\Guests;
use Auth;
use App\Http\Controllers\Controller;
use App\Models\GuestModel;
use Illuminate\Http\Request;


class GuestsDashboardController extends Controller
{ 
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index(){
        $user = Auth::user();
        // Check if the user has an advisory profile
        if (!$user->guest) {
            return redirect()->route('guests.profile.edit')->with('warning', 'Please complete your profile to access the dashboard.');
        }

        // Check if required fields are filled
        $requiredFields = ['linkedin_profile', 'bio', 'expertise', 'years_of_experience'];
        foreach ($requiredFields as $field) {
            if (empty($user->guest->$field)) {
                return redirect()->route('guests.profile.edit')->with('warning', 'Please complete your profile to access the dashboard.');
            }
        }
        // If the profile is complete, show the dashboard
        return view('guests.dashboard',compact('user') ); 
    } 

}
