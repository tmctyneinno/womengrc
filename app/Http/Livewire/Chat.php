<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Message;
use App\Models\User;
use App\Models\MentorInvitations;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Auth;

class Chat extends Component
{
    public $mentorId;
    public $message;
    public $messages = [];
    // public $messages;
    public $acceptedUsers = [];

    // This will fetch accepted mentors and mentees
    public function mount()
    {
        $this->messages = Message::all();
        $this->mentorId = request()->route('mentorId');
        $this->loadAcceptedUsers();
    } 

    // Fetch accepted mentors or mentees
    public function loadAcceptedUsers()
    {
        $user = Auth::user();
        $this->acceptedUsers = MentorInvitations::where('status', 'accepted')
            ->where(function ($query) use ($user) {
                $query->where('mentor_id', $user->id)
                      ->orWhere('user_id', $user->id);
            })
            ->get()
            ->map(function ($invitation) use ($user) {
                return $invitation->mentor_id === $user->id ? $invitation->user : $invitation->mentor;
            });
    }

    // Send a message to the selected mentor/mentee
    public function sendMessage()
    {
        logger('Message submitted');
        // log('dd');
        // dd('message');

        // $this->validate([
        //     'message' => 'required|string|max:255',
        // ]);
        // dd($this->mentorId);
        $message = Message::create([
            'user_id' => Auth::id(),
            'receiver_id' => $this->mentorId,
            'message' => $this->message,
        ]);
        // Broadcast the message to all users in the chat room
        // MessageSent::dispatch($message);
        // broadcast(new MessageSent($message));
        $this->message = ''; // Reset the message field
        $this->loadMessages(); // Reload messages
    }

    // Load messages between the current user and the selected mentor/mentee
    public function loadMessages()
    {
        $user = Auth::user();
        $this->messages = Message::where(function ($query) use ($user) {
                $query->where('user_id', $user->id)
                      ->where('receiver_id', $this->mentorId);
            })
            ->orWhere(function ($query) use ($user) {
                $query->where('user_id', $this->mentorId)
                      ->where('receiver_id', $user->id);
            })
            ->orderBy('created_at', 'asc')
            ->get();
    }

    public function getListeners()
    {
        return [
            "echo-private:newmessage,NewMessageSent" => 'refreshMessages',
        ];
    }

    public function refreshMessages($data)
    {
        $this->messages = Message::all();
    }

    public function render()
    {
        return view('livewire.chat', ['messages' => $this->messages]);
    }
}
