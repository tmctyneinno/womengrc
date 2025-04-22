<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class VerificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
<<<<<<< HEAD
    public $referralLink;
    public $virtualAccountData;
=======
>>>>>>> 7024077c20591e5e55fcbd48ce6f04afa2b8a5a9

    /**
     * Create a new message instance.
     *
     * @return void
     */
<<<<<<< HEAD
    public function __construct($user, $referralLink,$virtualAccountData )
    {
        $this->user = $user;
        $this->referralLink = $referralLink;
        $this->virtualAccountData = $virtualAccountData;
=======
    public function __construct($user)
    {
        $this->user = $user;
>>>>>>> 7024077c20591e5e55fcbd48ce6f04afa2b8a5a9
    }

    /**
     * Build the message.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function build() 
=======
    public function build()
>>>>>>> 7024077c20591e5e55fcbd48ce6f04afa2b8a5a9
    {
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $this->user->id, 'hash' => sha1($this->user->email)]
        );
<<<<<<< HEAD
        return $this->from('info@rabmotlicensing.com', 'Dohmayn')
        ->subject('Verify Your Email - Dohmayn')
        ->markdown('emails.verify-email')->with([
            'first_name' => $this->user->first_name, 
            'last_name' => $this->user->last_name, 
            'referralCode' => $this->referralLink, 
            'verifyUrl' => $verificationUrl,

            'bankName' => $this->virtualAccountData['bank']['name'],
            'accountName' => $this->virtualAccountData['account_name'],
            'accountNumber' => $this->virtualAccountData['account_number'],
            'currency' => $this->virtualAccountData['currency'],
            'customerCode' => $this->virtualAccountData['customer']['customer_code'],
=======
        return $this->from('info@rabmotlicensing.com', 'Women In GRC & Financial Crime Prevention')
        ->subject('Verify Your Email - Women in GRC Registration')
        ->markdown('emails.verify-email')->with([
            'name' => $this->user->name, 
            'verifyUrl' => $verificationUrl,
>>>>>>> 7024077c20591e5e55fcbd48ce6f04afa2b8a5a9
        ]);
    }
}