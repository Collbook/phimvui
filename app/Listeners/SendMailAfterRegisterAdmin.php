<?php

namespace App\Listeners;

use App\Events\RegisterAdmin;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use File;
use Mail;

class SendMailAfterRegisterAdmin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  RegisterAdmin  $event
     * @return void
     */
    public function handle(RegisterAdmin $event)
    {
        sleep(0);
        $email       = $event->admin->email;
        $fullname    = $event->admin->fullname;
        $email_token = $event->admin->email_token;

        $data = array('fullname'=> $fullname, "email" => $email, "email_token" => $email_token);
        
        Mail::send('emails.verification-email', $data, function($message) use ($email) {
            $message->to($email, 'Phimvui.net')
                    ->subject('Phimvui.net Thông báo kích hoạt tài khoản!');
            $message->from('ictnews123@gmail.com','Phimvui.net');
        });
        return true;
    }
}
