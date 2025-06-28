<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\PendingRoleUpdate;

class RoleChangeRejectedAdminNotification extends Notification implements ShouldQueue
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
            ->subject('Role Change Rejected: ' . $this->updateRequest->user->name)
            ->line('A role change request has been rejected:')
            ->line('User: ' . $this->updateRequest->user->name)
            ->line('Requested Role: ' . $this->updateRequest->getRoleDisplayName($this->updateRequest->new_role))
            ->line('Reason: ' . $this->updateRequest->rejection_reason)
            ->line('Rejected at: ' . $this->updateRequest->rejected_at->format('Y-m-d H:i'))
            ->action('View User Profile', route('login'));
    }

    public function toArray($notifiable)
    {
        return [
            'type' => 'role_change_rejected_admin',
            'user_id' => $this->updateRequest->user_id,
            'user_name' => $this->updateRequest->user->name,
            'requested_role' => $this->updateRequest->new_role,
            'reason' => $this->updateRequest->rejection_reason,
            'message' => 'User role change rejected'
        ];
    }
}