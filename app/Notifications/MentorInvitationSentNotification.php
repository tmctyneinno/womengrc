<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MentorInvitationSentNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $mentor; // The mentor to whom the invitation was sent

    // Constructor to pass the mentor data
    public function __construct($mentor)
    {
        $this->mentor = $mentor;
    }

    // Define the notification channels (mail and database in this case)
    public function via($notifiable)
    {
        return ['database', 'mail']; // You can also add 'mail' if you want to send an email to the sender
    }

    // Send the notification email (optional)
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('You Have Sent an Invitation to Mentor')
            ->line('You have sent an invitation to ' . $this->mentor->name . ' to become a mentor.')
            ->line('The mentor will review and respond to your invitation.');
    }

    // Optionally, you can add a database channel for notifications
    public function toDatabase($notifiable)
    {
        return [
            'message' => 'You have sent an invitation to ' . $this->mentor->name . ' to become a mentor.',
            'url' => route('user.dashboard'), // You can redirect to the mentor page or a related page
        ];
    }
}
