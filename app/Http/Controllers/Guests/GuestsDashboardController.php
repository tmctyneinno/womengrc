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
        $this->middleware('auth');
    }
  
    public function index(){
        $user = Auth::user();

        // 1. Ensure the user is actually a guest.
        // This should ideally also be enforced by route middleware (e.g., middleware('role:guests')).
        if ($user->role !== 'guests') {
            // Redirect non-guests or show an unauthorized error.
            // Logging them out and redirecting to login is one option if they somehow reached here.
            Auth::logout();
            return redirect('/login')->with('error', 'Unauthorized access to guest dashboard.');
        }
        // 2. Check if the guest-specific profile data exists.
        if (is_null($user->guest)) {
            return redirect()->route('guests.profile.edit')->with('warning', 'Please create your guest profile to access the dashboard.');
        }
        // Check if required fields are filled
        // Fields are derived from GuestModel::$fillable, considering where they are actually stored.
        $profileCompletionFields = [
            'linkedin_profile'    => 'guest', 
            'twitter_profile'     => 'guest',
            'facebook_profile'    => 'guest',
            'bio'                 => 'guest',
            'expertise'           => 'guest',
            'years_of_experience' => 'guest',
            'profile_image'       => 'guest',  
            'upload_cv'           => 'guest',  
        ];

        foreach ($profileCompletionFields as $field => $location) {
            $value = null;
            if ($location === 'guest') {
                // At this point, $user->guest is confirmed to be non-null
                // due to the check above.
                $value = $user->guest->$field;
            } elseif ($location === 'user') {
                $value = $user->$field;
            }

             $isFieldEmpty = ($field === 'years_of_experience') ? is_null($value) : empty($value);

            if ($isFieldEmpty) {
                $fieldNameReadable = ucwords(str_replace('_', ' ', $field));
                return redirect()->route('guests.profile.edit')->with('warning', "Please complete your profile. The '{$fieldNameReadable}' field is missing.");
            }
        }

        // If the profile is complete, show the dashboard
        return view('guests.dashboard',compact('user') ); 
    } 

}
