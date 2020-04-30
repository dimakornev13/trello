<?php

namespace App\Broadcasting;

use App\Dashboard;
use App\DashboardUser;
use App\User;

class DashboardChannel
{
    /**
     * Create a new channel instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    /**
     * Authenticate the user's access to the channel.
     *
     * @param \App\User $user
     * @param Dashboard $dashboard
     *
     * @return array|bool
     */
    public function join(User $user, Dashboard $dashboard)
    {
        return DashboardUser::isMember($user->id, $dashboard->id);
    }
}
