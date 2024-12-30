<?php
// app/Notifications/MentorInvitationNotification.php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MentorInvitationNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $user; // The user who invited the mentor

    // Constructor to pass the user data
    public function __construct($user)
    {
        $this->user = $user;
    }

    // Define the notification channels (mail and database)
    public function via($notifiable)
    {
        return ['mail', 'database']; // Use both mail and database channels
    }

    // Send the notification email
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('You Have Been Invited to Become a Mentor')
            ->line('You have been invited by ' . $this->user->name . ' to become a mentor.')
            ->action('Accept Invitation',route('user.mentor.accept-invitation', ['id' => encrypt($notifiable->id) ]))
            ->line('Thank you for considering this opportunity!');
    }

    // Store the notification in the database
    public function toDatabase($notifiable)
    {
        return [
            'message' => $this->user->name . ' has invited you to become a mentor.',
            'url' => route('user.mentor.accept-invitation', ['id' => encrypt($notifiable->id)]),
            // 'url' => url('/accept-mentor-invitation?email=' . $notifiable->email),
        ];
    }
}
