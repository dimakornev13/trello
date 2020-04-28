<?php

namespace App\Events;

use App\Column;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ColumnCreated
{

    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $column;


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Column $column)
    {
        $this->column = $column;
    }

}
