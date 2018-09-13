<?php

namespace App\Listeners;

use App\Events\LockUser;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use File;
use Mail;

class SendMailAfterLockUser
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
     * @param  LockUser  $event
     * @return void
     */
    public function handle(LockUser $event)
    {
        sleep(0);

        $email    = $event->admin->email;
        $username = $event->admin->username;
        $fullname = $event->admin->fullname;
        $to_time  = $event->admin->time_lock_end;

        $data = array('fullname'=> $fullname, "email" => $email, "username" => $username, 'to_time' => $to_time);
        
        Mail::send('emails.lockuser', $data, function($message) use ($email) {
            $message->to($email, 'Phimvui.net')
                    ->subject('Phimvui.net Thông báo khóa tài khoản tạm thời!');
            $message->from('ictnews123@gmail.com','Phimvui.net');
        });
        return true;
    }
}
