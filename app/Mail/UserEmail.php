<?php 

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user_name;

    public function __construct($user_name)
    {
        $this->user_name = $user_name;
    }

    public function build()
    {
        $user_name = $this->user_name; 
        return $this->view('emails.refferal-email',compact('user_name'))
                    ->subject('Account Reffer');
    }
}