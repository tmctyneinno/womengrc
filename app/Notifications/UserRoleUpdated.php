<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserRoleUpdated extends Notification
{
    use Queueable;
 
    protected $user;
    protected $token;
    protected $role;

    public function __construct($user, $token, $role)
    {
        $this->user = $user;
        $this->token = $token; 
        $this->role = $role; 
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        $roleDisplay = $this->getRoleDisplayName($this->role);
        $responseUrl = route('admin.role-update.response-form', $this->token);
        // $responseUrl = url('/role-update/respond/' . $this->token);
        
        return (new MailMessage)
            ->subject('Role Update Request at Women in GRC & Financial Crime Prevention')
            ->line('Dear ' . $this->user->name . ',')
            ->line('A request has been made to update your role to: ' . $roleDisplay)
            ->action('Respond to Role Update Request', $responseUrl)
            ->line('If you did not request this change, please click the link and select "Reject".')
            ->line('Thank you for being part of our community.')
            ->line('Warm regards,')
            ->line('The Women in GRC & Financial Crime Prevention (WGRCFP) Team');
    }

    public function toArray($notifiable)
    {
        return [
            'type' => 'user_role_update_request',
            'user_id' => $this->user->id,
            'role' => $this->user->role,
            'token' => $this->token,
            'message' => 'Role update request to ' . $this->user->role,
        ];
    }

    protected function getRoleDisplayName($role)
    {
        $displayNames = [
            'advisory_member' => '**Advisory Member**',
            'guests' => '**Guests**',
            'mentor' => '**Mentor**',
            'mentee' => '**Mentee**',
        ];
        
        return $displayNames[$role] ?? $role;
    }
}