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

    // Constructor to pass the user instance and the new role
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database']; // Send notification via both mail and database
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $roleDisplay = $this->user->role;
        if ($this->user->role === 'advisory_member') {
            $roleDisplay = '**Advisory Member**'; 
        }elseif($this->user->role === 'guests'){
            $roleDisplay = '**Guests**'; 
        }elseif($this->user->role === 'mentor'){
            $roleDisplay = '**Mentor**'; 
        }elseif($this->user->role === 'mentee'){
            $roleDisplay = '**Mentee**'; 
        }
        return (new MailMessage)
                    ->subject('Your Role has been Updated at Women in Governance, Risk, Compliance, and Financial Crime Prevention')
                    ->line('Dear ' . $this->user->name . ',')
                    ->line('We are excited to inform you that your role has been successfully updated to: ' . $roleDisplay)
                    ->line('')
                    ->line('We believe in the power of diversity and inclusion to drive ethical practices, enhance professional excellence, and tackle the complex challenges of today\'s global landscape.')
                    ->line('')
                    ->line('Your updated role as **' . $roleDisplay . '** aligns with our mission to support and empower women professionals like yourself.')
                    ->action('View Dashboard', url('/login'))
                    ->line('Thank you for being a part of our platform and community.')
                    ->line('We look forward to your continued contributions and success!')
                    ->line('Warm regards,')
                    ->line('The Women in GRC & Financial Crime Prevention (WGRCFP) Team');
    }

    /**
     * Get the database representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'type' => 'user_role',
            'user_id' => $this->user->id,
            'role' => $this->user->role,
            'message' => 'Your role has been updated to ' . $this->user->role,
        ];
    }
}
