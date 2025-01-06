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
        session()->reflash();
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
        try {
            $receiverId = decrypt($this->mentorId);
            
            // Check if the decrypted receiverId is valid
            if (!is_numeric($receiverId)) {
                throw new \Exception("Invalid mentor ID.");
            }
        } catch (\Exception $e) {
            logger('Decryption failed or invalid mentor ID: ' . $e->getMessage());
            return;
        }

        $message = Message::create([
            'user_id' => Auth::id(),
            'receiver_id' =>  $receiverId,
            'message' => $this->message,
        ]);
        $this->loadMessages();

        // broadcast(new MessageSent($message)); 

        $this->message = ''; 
        $this->loadMessages(); 
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
