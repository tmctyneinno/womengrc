<?php

namespace App\Http\Controllers\Advisory;
use Auth;
use App\Http\Controllers\Controller;
use App\Models\AdvisoryProfile;
use Illuminate\Http\Request;


class AdvisoryDashboardController extends Controller
{ 
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index(){
        $user = Auth::user();
        // Check if the user has an advisory profile
        if (!$user) {
            return redirect()->route('advisory.profile.edit')->with('warning', 'Please complete your profile to access the dashboard.');
        }

        // Check if required fields are filled
        $requiredFields = ['linkedin', 'bio', 'expertise', 'years_of_experience'];
        foreach ($requiredFields as $field) {
            if (empty($user->$field)) {
                return redirect()->route('advisory.profile.edit')->with('warning', 'Please complete your profile to access the dashboard.');
            }
        }
        // If the profile is complete, show the dashboard
        return view('advisory.dashboard',compact('user') ); 
    } 

}
