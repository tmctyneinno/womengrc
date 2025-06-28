<?php

namespace App\Http\Controllers\Guests;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\GuestModel;
use Illuminate\Http\Request;


class GuestsDashboardController extends Controller
{ 
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    public function index(){ 
        $user = Auth::user();
        if ($user->role !== 'guests') {
            Auth::logout();
            return redirect('/login')->with('error', 'Unauthorized access to guest dashboard.');
        }

        if (is_null($user)) {
            return redirect()->route('guests.profile.edit')->with('warning', 'Please create your guest profile to access the dashboard.');
        }

        // Check if required fields are filled
        $profileCompletionFields = [
            'linkedin'    => 'user', 
            'twitter_profile'     => 'user',
            'facebook_profile'    => 'user',
            'bio'                 => 'user',
            'expertise'           => 'user',
            'years_of_experience' => 'user',
            'profile_image'       => 'user',  
            'upload_cv'           => 'user',  
        ];

        foreach ($profileCompletionFields as $field => $location) {
            $value = null;
            if ($location === 'guest') {
                // At this point, $user->guest is confirmed to be non-null
                // due to the check above.
                $value = $user->$field;
            } elseif ($location === 'user') {
                $value = $user->$field;
            }

            $isFieldEmpty = ($field === 'years_of_experience') ? is_null($value) : empty($value);
            // dd($isFieldEmpty, $value, $field);

            if ($isFieldEmpty) {
                $fieldNameReadable = ucwords(str_replace('_', ' ', $field));
                return redirect()->route('guests.profile.edit')->with('warning', "Please complete your profile. The '{$fieldNameReadable}' field is missing.");
            }
        }
        $mentorCount = $user->mentors()->count();
        $menteeCount = $user->mentees()->count();

        // If the profile is complete, show the dashboard
        return view('user.dashboard',compact('user','menteeCount') ); 
    }  

}
