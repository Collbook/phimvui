<?php

namespace App\Listeners;

use App\Events\CountViewEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CountViewListener
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
     * @param  CountViewEvent  $event
     * @return void
     */
    public function handle(CountViewEvent $event)
    {
        $film = $event->films->increment('view_count');
    }
}
