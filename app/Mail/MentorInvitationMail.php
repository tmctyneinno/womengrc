<?php
// app/Mail/MentorInvitationMail.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MentorInvitationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('You Have Been Invited to Become a Mentor')
                    ->view('emails.mentor_invitation')
                    ->with([
                        'name' => $this->user->name,
                        'email' => $this->user->email,
                    ]);
    } 
}
