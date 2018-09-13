<?php

namespace App\Listeners;

use App\Events\LockUserCustomer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class SendMailAfterLockUserCustomer
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
     * @param  LockUserCustomer  $event
     * @return void
     */
    public function handle(LockUserCustomer $event)
    {
        sleep(6);
        $email    = $event->customer->email;
        $username = $event->customer->username;
        $fullname = $event->customer->fullname;
        $to_time  = $event->customer->time_lock_end;

        $data = array('fullname'=> $fullname, "email" => $email, "username" => $username, 'to_time' => $to_time);
        
        Mail::send('emails.lockuser', $data, function($message) use ($email) {
            $message->to($email, 'Phimvui.net')
                    ->subject('Phimvui.net Thông báo khóa tài khoản tạm thời!');
            $message->from('ictnews123@gmail.com','Phimvui.net');
        });
        return true;
    }
}
