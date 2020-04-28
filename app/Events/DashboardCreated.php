<?php

namespace App\Events;

use App\Dashboard;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DashboardCreated
{
    use Dispatchable, SerializesModels;

    public $dashboard;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Dashboard $dashboard)
    {
        $this->dashboard = $dashboard;
    }
}
