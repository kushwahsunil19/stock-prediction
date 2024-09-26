<?php 

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AccountActiveEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user_name;
    public $activation_token;

    public function __construct($user_name, $activation_token)
    {
        $this->user_name = $user_name;
        $this->activation_token = $activation_token;
    }

    public function build()
    {
        return $this->view('emails.account-activation')
                    ->with([
                        'user_name' => $this->user_name,
                        'activation_token' => $this->activation_token,
                    ]);
    }
}