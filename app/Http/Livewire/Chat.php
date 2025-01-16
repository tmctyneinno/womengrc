<?php

namespace App\Http\Livewire;
use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\Message;
use App\Models\User;
use App\Models\MentorInvitations;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Auth;

class Chat extends Component
{
    use WithFileUploads;
    public $mentorId;
    public $message;
    public $messages = [];
    public $uploadedFile;
    public $acceptedUsers = [];

    // This will fetch accepted mentors and mentees
    public function mount()
    {
        // $this->messages = Message::all();
        $this->mentorId = request()->route('mentorId');
        $this->loadMessages(); // Load messages for the current mentor
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
    
        if ($this->uploadedFile) {
            $fileName = time() . '_' . preg_replace('/[^a-zA-Z0-9-_\.]/', '', $this->uploadedFile->getClientOriginalName());
        
            // Use storage path for uploads
            // $uploadDirectory = storage_path('app/public/uploads');
            $filePath = $this->uploadedFile->storeAs('public/uploads', $fileName);



            // Move the file to the storage directory
            // $this->uploadedFile->move($uploadDirectory, $fileName);
            $fileUrl = asset('storage/uploads/' . $fileName);
    
            // Save the message with the uploaded file
            Message::create([
                'user_id' => Auth::id(),
                'receiver_id' => $this->mentorId,
                'message' => $this->message ?: '',
                'file_path' => $fileUrl,
                'file_type' => $this->uploadedFile->getMimeType(),
            ]);
        } else {
            // Save the message without a file
            Message::create([
                'user_id' => Auth::id(),
                'receiver_id' => $this->mentorId,
                'message' => $this->message ?: '',
            ]);
        }
    
        // Reset the input fields
        $this->reset('message', 'uploadedFile');
    
        // Reload messages
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
        $this->loadMessages();
    }

    public function render()
    {
        return view('livewire.chat', ['messages' => $this->messages]);
    }
}
