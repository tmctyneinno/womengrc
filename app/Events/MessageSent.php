<?php

namespace App\Events;

use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
   
    public $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    // public function broadcastOn()
    // {
    //     return new Channel('chat'); 
    // }
    public function broadcastOn()
    {
        return new Channel('chat.' . $this->message->receiver_id); // Broadcast to a channel named for the receiver
    } 

    // public function broadcastAs() 
    // {
    //     return 'new-message'; 
    // }

    public function broadcastAs()
    {
        return 'message.sent';
    }
}
