<?php

namespace App\Http\Controllers\Advisory;
use Auth;
use App\Http\Controllers\Controller;
use App\Models\AdvisoryProfile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('advisory.pages.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Ensure only advisory members can update their profile
        if ($user->role !== 'advisory_member') {
            abort(403, 'Only advisory members can update this profile.');
        }

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'linkedin' => 'required|url',
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

        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); // Use getClientOriginalExtension() for accuracy
            $destinationPath = public_path('assets/advisoryProfile/');

            // Ensure the directory exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Move the uploaded image to the destination path
            $image->move($destinationPath, $imageName);

            // Save the image path to the user's profile
            $user->profile_image = 'assets/advisoryProfile/' . $imageName;
            $user->save(); // Save the user model to update the profile_image field
        }

        if ($request->hasFile('upload_cv')) {
            $image = $request->file('upload_cv');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); // Use getClientOriginalExtension() for accuracy
            $destinationPath = public_path('assets/advisoryProfile/');

            // Ensure the directory exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Move the uploaded image to the destination path
            $image->move($destinationPath, $imageName);

            // Save the image path to the user's profile
            $user->upload_cv = 'assets/advisoryProfile/' . $imageName;
            $user->save(); // Save the user model to update the profile_image field
        }

        // Update or create the advisory profile
        $user->updateOrCreate(
            ['id' => $user->id],
            $request->only([
                'linkedin',
                'twitter_profile',
                'facebook_profile',
                'bio',
                'expertise',
                'years_of_experience',
            ])
        );

        // Redirect back with a success message
        return redirect()->route('advisory.profile.edit')->with('success', 'Profile updated successfully!');
    }

}
