<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],
        'App\Events\LockUserCustomer' => [
            'App\Listeners\SendMailAfterLockUserCustomer',
        ],
        'App\Events\LockUser' => [
            'App\Listeners\SendMailAfterLockUser',
        ],
        'App\Events\RegisterAdmin' => [
            'App\Listeners\SendMailAfterRegisterAdmin'
        ],
        'App\Events\CountViewEvent' => [
            'App\Listeners\CountViewListener'
        ],

        'App\Events\ChangeEmail' => [
            'App\Listeners\SendMailAfterChangeMail'
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
