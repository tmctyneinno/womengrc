<?php


namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\PendingRoleUpdate;

class RoleUpdateRejectedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $updateRequest;

    public function __construct(PendingRoleUpdate $updateRequest)
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
            ->subject('Role Update Request Rejected')
            ->line('Your request to change your role to ' . $this->updateRequest->getRoleDisplayName($this->updateRequest->new_role) . ' has been rejected.')
            ->line('Reason: ' . $this->updateRequest->rejection_reason)
            ->action('View Your Account', url('/profile'))
            ->line('If you believe this was a mistake, please contact support.');
    }

    public function toArray($notifiable)
    {
        return [
            'type' => 'role_update_rejected',
            'current_role' => $this->updateRequest->current_role,
            'requested_role' => $this->updateRequest->new_role,
            'reason' => $this->updateRequest->rejection_reason,
            'message' => 'Your role change request was rejected'
        ];
    }
}