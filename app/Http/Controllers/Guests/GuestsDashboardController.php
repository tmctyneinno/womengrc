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

        // dd($user->role);
        if (!$user->role === 'guests') {
            return redirect()->route('guests.profile.edit')->with('warning', 'Please create your guest profile to access the dashboard.');
        }
        
        // Check if required fields are filled
        // Fields are derived from GuestModel::$fillable, considering where they are actually stored.
        $profileCompletionFields = [
            'linkedin_profile'    => 'guest', // Stored on User->guest relationship
            'twitter_profile'     => 'guest',
            'facebook_profile'    => 'guest',
            'bio'                 => 'guest',
            'expertise'           => 'guest',
            'years_of_experience' => 'guest',
            'profile_image'       => 'user',  // Stored directly on User model
            'upload_cv'           => 'user',  // Stored directly on User model
        ];

        foreach ($profileCompletionFields as $field => $location) {
            $value = null;
            if ($location === 'guest') {
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
