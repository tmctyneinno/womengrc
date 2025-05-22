<?php

namespace App\Http\Controllers\Guests;
use Illuminate\Support\Facades\Auth; // It's good practice to use the full namespace for Auth facade
use App\Http\Controllers\Controller;
// use App\Models\AdvisoryProfile; // AdvisoryProfile is not used for guest updates
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('guests.pages.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Authorization: Ensure the user is a guest.
        // This can also be handled by route middleware (e.g., middleware('role:guests'))
        // If not using route middleware for this specific check:
        if ($user->role !== 'guests') {
            abort(403, 'Unauthorized action. Only guests can update this profile.');
        }
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'linkedin_profile' => 'required|url',
            'twitter_profile' => 'required|url',
            'facebook_profile' => 'required|url', 
            'bio' => 'required|string|max:1000',
            'expertise' => 'required|string|max:255',
            'years_of_experience' => 'required|integer|min:0',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image upload
            'upload_cv' => 'nullable|file|mimes:pdf,doc,docx|max:5120', // Max 5MB for CV
        ]);
        $user->name = $request->input('name');
        $user->save(); 

        // Define a more specific path for guest assets for clarity
        $guestAssetsPath = 'assets/guestProfile/';
        $publicGuestAssetsPath = public_path($guestAssetsPath);

        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Make filename more unique
            $destinationPath = $publicGuestAssetsPath;

            // Ensure the directory exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            // Move the uploaded image to the destination path
            $image->move($destinationPath, $imageName);

            // Save the image path to the user's profile
            $user->profile_image = $guestAssetsPath . $imageName;
            $user->save(); // Save the user model to update the profile_image field
        }

        if ($request->hasFile('upload_cv')) {
            $cvFile = $request->file('upload_cv');
            $cvName = time() . '_' . $cvFile->getClientOriginalName(); // Make filename more unique
            $destinationPath = $publicGuestAssetsPath;

            // Ensure the directory exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            // Move the uploaded image to the destination path
            $cvFile->move($destinationPath, $cvName);

            // Save the image path to the user's profile
            $user->upload_cv = $guestAssetsPath . $cvName;
            $user->save(); // Save the user model to update the profile_image field
        }

        // Update or create the guest's profile using the 'guest' relationship
        // This assumes your User model has: public function guest() { return $this->hasOne(GuestModel::class); }
        $user->guest()->updateOrCreate(
            ['user_id' => $user->id],
            $request->only([
                'linkedin_profile',
                'twitter_profile',
                'facebook_profile',
                'bio',
                'expertise',
                'years_of_experience',
            ])
        );
        // Redirect back with a success message
        return redirect()->route('guests.profile.edit')->with('success', 'Profile updated successfully!');
    }
 
}
