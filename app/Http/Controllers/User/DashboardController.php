<?php

namespace App\Http\Controllers\User;

use Auth;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\Property;
use App\Models\Certification;
use App\Models\Transaction;
use Illuminate\Support\Facades\Log;  
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    public function index(){
        $user = Auth::user();
        // dd($user->role);
        switch ($user->role) {
            case 'facilitator':
                Log::info('User is facilitator, redirecting from user.dashboard to facilitator.dashboard.', ['user_id' => $user->id]);
                return redirect()->route('facilitator.dashboard');
            case 'advisory_member': 
                Log::info('User is advisory_member, redirecting from user.dashboard to advisory.dashboard.', ['user_id' => $user->id]);
                return redirect()->route('advisory.dashboard');
            case 'guests':
                Log::info('User is guest, redirecting from user.dashboard to guests.dashboard.', ['user_id' => $user->id]);
                return redirect()->route('guests.dashboard');
                // return redirect()->route('advisory.dashboard');

            default:
                Log::info('User role is default or user-specific, showing user.dashboard.', ['user_id' => $user->id, 'role' => $user->role]);
                $data['mentorCount'] = $user->mentors()->count();
                $data['menteeCount'] = $user->mentees()->count();
                $data['pendingInvitationsCount'] = $user->mentorInvitations()->where('status', 'pending')->count();
                
                return view('user.dashboard', $data);
        }
    } 
  
    public function edit()
    { 
        $user = Auth::user();
        return view('user.pages.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Ensure only advisory members can update their profile
        if ($user->role !== 'mentor') {
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
        return redirect()->route('user.profile.edit')->with('success', 'Profile updated successfully!');
    }
    
    public function upcomingEvent()
    {
        if (!auth()->user()->hasActiveSubscription()) {
            return redirect()->route('user.membership.plans')->with('error', 'Please subscribe to access member features');
        }
        $events = Event::query()
        // ->where('start_time', '>', now())
        ->orderBy('created_at')
        ->paginate(10);

        return view('user.pages.events.index', compact('events'));
    }

    public function showUpcomingEvent($slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();

        // Check if the user has an active subscription
        if (!auth()->user()->hasActiveSubscription()) {
            return redirect()->route('user.membership.plans')->with('error', 'Please subscribe to access member features');
        }

        return view('user.pages.events.show', compact('event'));
    }

    public function trainingIndex()
    {
        $trainingCertifications = Certification::latest()->get();
        return view('user.pages.training.index', compact('trainingCertifications'));
    }

    public function showTraining(Certification $certification)
    {
        abort_unless($certification->isRequiredForUser(auth()->id()), 403);

        return view('training.show', [
            'certification' => $certification->load('modules'),
            'userProgress' => auth()->user()->certificationProgress($certification->id)
        ]);
    }

    public function markCompleteTraining(Request $request, Certification $certification)
    {
        $request->validate([
            'certificate' => 'sometimes|file|mimes:pdf|max:2048'
        ]);

        auth()->user()->certifications()->syncWithoutDetaching([
            $certification->id => [
                'completed_at' => now(),
                'expires_at' => now()->addYear(),
                'certificate_file_path' => $request->hasFile('certificate') 
                    ? $request->file('certificate')->store('certificates') 
                    : null
            ]
        ]);

        return redirect()->route('training.index')
            ->with('success', 'Certification marked as complete!');
    }
}
