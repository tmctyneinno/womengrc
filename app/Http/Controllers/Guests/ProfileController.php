<?php

namespace App\Http\Controllers\Guests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        // Authorization check
        if ($user->role !== 'guests') {
            abort(403, 'Unauthorized action. Only guests can update this profile.');
        }

        // Validation
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'linkedin_profile' => 'required|url',
            'twitter_profile' => 'required|url',
            'facebook_profile' => 'required|url',
            'bio' => 'required|string|max:1000',
            'expertise' => 'required|string|max:255',
            'years_of_experience' => 'required|integer|min:0',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'upload_cv' => 'nullable|file|mimes:pdf,doc,docx|max:8120',
        ]);

        DB::transaction(function () use ($user, $request, $validatedData) {
            // Update user basic info
            $user->name = $validatedData['name'];

            // Handle profile image upload
            if ($request->hasFile('profile_image')) {
                // Delete old image if exists
                if ($user->profile_image && Storage::exists($user->profile_image)) {
                    Storage::delete($user->profile_image);
                }

                $path = $request->file('profile_image')->store('public/guest_profile_images');
                $user->profile_image = str_replace('public/', 'storage/', $path);
            }

            // Handle CV upload
            if ($request->hasFile('upload_cv')) {
                // Delete old CV if exists
                if ($user->upload_cv && Storage::exists($user->upload_cv)) {
                    Storage::delete($user->upload_cv);
                }

                $path = $request->file('upload_cv')->store('public/guest_cvs');
                $user->upload_cv = str_replace('public/', 'storage/', $path);
            }

            // Save user changes
            $user->save();

            // Update or create guest profile
            $user->updateOrCreate(
                ['id' => $user->id],
                [
                    'linkedin' => $validatedData['linkedin_profile'],
                    'twitter_profile' => $validatedData['twitter_profile'],
                    'facebook_profile' => $validatedData['facebook_profile'],
                    'bio' => $validatedData['bio'],
                    'expertise' => $validatedData['expertise'],
                    'years_of_experience' => $validatedData['years_of_experience'],
                ]
            );
        });

        return redirect()->route('guests.profile.edit')
                        ->with('success', 'Profile updated successfully!');
    }
}