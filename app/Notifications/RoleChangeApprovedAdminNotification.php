<?php 


namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\PendingRoleUpdate;

class RoleChangeApprovedAdminNotification extends Notification implements ShouldQueue
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
            ->subject('Role Change Approved: ' . $this->updateRequest->user->name)
            ->line('A role change request has been approved:')
            ->line('User: ' . $this->updateRequest->user->name)
            ->line('From: ' . $this->updateRequest->getRoleDisplayName($this->updateRequest->current_role))
            ->line('To: ' . $this->updateRequest->getRoleDisplayName($this->updateRequest->new_role))
            ->line('Approved at: ' . $this->updateRequest->approved_at->format('Y-m-d H:i'))
            ->action('View User Profile', url('/admin/users/' . $this->updateRequest->user_id));
    }

    public function toArray($notifiable)
    {
        return [
            'type' => 'role_change_approved_admin',
            'user_id' => $this->updateRequest->user_id,
            'user_name' => $this->updateRequest->user->name,
            'old_role' => $this->updateRequest->current_role,
            'new_role' => $this->updateRequest->new_role,
            'message' => 'User role change approved'
        ];
    }
}