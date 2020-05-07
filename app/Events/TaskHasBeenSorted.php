<?php

namespace App\Events;

use App\Column;
use App\User;
use Illuminate\Auth\Authenticatable;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TaskHasBeenSorted implements ShouldBroadcast
{

    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $event;


    /**
     * Create a new event instance.
     *
     * @param Column $column
     * @param User $user
     */
    public function __construct(Column $column, User $user)
    {
        $this->event = (object)[
            'column' => $column,
            'user'   => $user
        ];
    }


    public function broadcastAs()
    {
        return 'TaskHasBeenSorted';
    }


    public function broadcastWith()
    {
        return [
            'user' => $this->event->user,
            'column' => $this->event->column,
        ];
    }


    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|Channel[]|PrivateChannel
     */
    public function broadcastOn()
    {
        return new PrivateChannel('dashboard.' . $this->event->column->dashboard_id);
    }
}
