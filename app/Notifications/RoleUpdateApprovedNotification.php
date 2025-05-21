<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

use Illuminate\Notifications\Messages\MailMessage;

class RoleUpdateApprovedNotification extends Notification
{
    use Queueable;

    protected $updateRequest;

    public function __construct($updateRequest)
    {
        $this->updateRequest = $updateRequest;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Your Role Change Has Been Approved')
            ->line('Your role change request has been approved.')
            ->line('New Role: ' . $this->updateRequest->getRoleDisplayName($this->updateRequest->new_role))
            ->action('Login to Your Account', url('/login'))
            ->line('Thank you for using our platform!');
    }

    public function toArray($notifiable)
    {
        return [
            'message' => 'Your role change to ' . $this->updateRequest->new_role . ' has been approved',
            'new_role' => $this->updateRequest->new_role,
        ];
    }
}