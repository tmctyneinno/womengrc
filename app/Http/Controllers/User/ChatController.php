<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Message;

class ChatController extends Controller
{ 
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // Logic to show all chats or a list of mentors
        return view('user.pages.chat.index'); // Update with actual view
    }
    public function show($mentorId = null){

        if (!($mentorId) ) {
            session()->flash('error', 'No mentor has been added. Please select a mentor to proceed.');
            return redirect()->back();
        }
       
        $mentor = User::findOrFail(($mentorId));
        if (!$mentor) {
            session()->flash('error', 'The specified mentor does not exist.');
            return redirect()->back();
        }

        $messages = Message::where(function ($query) use ($mentorId) {
                $query->where('user_id', Auth::id())
                      ->where('receiver_id', $mentorId);
            })
            ->orWhere(function ($query) use ($mentorId) {
                $query->where('user_id', $mentorId)
                      ->where('receiver_id', Auth::id());
            })
            ->orderBy('created_at', 'asc') // Order messages by the created date
            ->get();
        

        return view('user.pages.chat.index', compact('messages', 'mentor'));
    }
}
