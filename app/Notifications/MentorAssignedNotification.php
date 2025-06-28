<?php

// app/Notifications/MentorAssignedNotification.php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class MentorAssignedNotification extends Notification
{
    public function __construct($user)
    {
        // You can pass the user data here to notify the mentor
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('You have a new mentee!')
                    ->line('You have been selected as a mentor by a user.')
                    ->action('View User', url('/'))
                    ->line('Thank you for being a mentor!');
    }
}
