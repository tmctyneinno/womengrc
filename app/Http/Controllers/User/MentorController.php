<?php

namespace App\Http\Controllers\User;

use App\Notifications\MentorInvitationSentNotification;
use App\Notifications\MentorInvitationNotification;
use App\Http\Controllers\Controller;
use App\Mail\MentorInvitationMail;
use App\Models\MentorInvitations;
use Illuminate\Http\Request;
use App\Models\User; 
use Mail;

class MentorController extends Controller
{
    public function findMentor()
    {
        $userId = auth()->id();
        $mentors = User::
        where('role', 'mentor')
        // ->where('role', '!=', 'mentee')
        ->where('email_verified_at', '!=', null)
        ->where('id', '!=', $userId)
        ->get();
        return view('user.membership.mentors.index', compact('mentors'));
    }

    public function addMentor($mentorId)
    {
        $mentor = User::findOrFail($mentorId); 
        // dd($mentor);
        $user = auth()->user(); 

        if ($user->mentors->contains('mentor_id', $mentor->id)) {
            return back()->with('error', 'You have already invited this mentor.');
        }

        Mail::to($mentor->email)->send(new MentorInvitationMail($user));

        $mentor->notify(new MentorInvitationNotification($user));
        $user->notify(new MentorInvitationSentNotification($mentor));


        $user->mentorInvitations()->create([
            'mentor_id' => $mentor->id,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Your invitation has been sent to ' . $mentor->name . '!');
    }

    public function acceptMentorInvitation($id)
    {
        try {
            $mentorId = decrypt($id);
            // dd($mentorId);

            $user = auth()->user(); 

            $mentor = User::where('id', $mentorId)->first();
            // dd($mentor);

            // dd($mentor->id);
           
            $invitation = MentorInvitations::where('mentor_id', $mentor->id)->where('status', 'pending')->first();
            
            if (!$invitation) {
                return redirect()->route('dashboard')->with('error', 'No pending invitation found for this mentor.');
            }

            $invitation->update(['status' => 'accepted']);

            // dd($invitation);
            
            $mentor = User::where('email', $email)->first();
            $user->mentors()->attach($mentor->id);

            // Mark the related mentor invitation notification as read
            $notification = $user->notifications()->where('type', 'App\Notifications\MentorInvitationNotification')
                                                ->where('data->mentor_id', $mentor->id) // Assuming you have 'mentor_id' in the notification data
                                                ->first();

            if ($notification) {
                $notification->markAsRead(); // Mark the notification as read
            }
            
            return redirect()->back()->with('success', 'You have successfully accepted the mentor invitation!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while accepting the invitation.'.$e);
        }
    }


   


}
