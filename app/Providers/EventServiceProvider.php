<?php

namespace App\Providers;

use App\Events\DashboardCreated;
use App\Events\DashboardDeleted;
use App\Listeners\DeleteAllConnectedToDeletedDashboard;
use App\Listeners\UserAttachCreatedDashboard;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        DashboardCreated::class => [
            UserAttachCreatedDashboard::class
        ],

        DashboardDeleted::class => [
            DeleteAllConnectedToDeletedDashboard::class
        ]
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
