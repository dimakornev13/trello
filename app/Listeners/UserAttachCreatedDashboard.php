<?php

namespace App\Listeners;

class UserAttachCreatedDashboard
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        auth()->user()->dashboards()->attach($event->dashboard->id);
    }
}
