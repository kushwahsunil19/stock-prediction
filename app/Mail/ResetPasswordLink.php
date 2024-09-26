<?php 

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordLink extends Mailable
{
    use Queueable, SerializesModels;

    public $user_name;

    public function __construct($user_name,$email)
    {
        $this->user_name = $user_name;
          $this->email = $email;
       
    }

    public function build()
    {
         $user_name = $this->user_name; 
         $email = $this->email;
        return $this->view('emails.reset-link',compact('user_name','email'))
                    ->subject('Reset Password');
    }
}