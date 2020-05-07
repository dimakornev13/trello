<?php

use Illuminate\Support\Facades\Broadcast;
use \App\Broadcasting;

Broadcast::channel('dashboard.{dashboard_id}', function ($user, $dashboard_id){
    return \App\DashboardUser::isMember($user->id, (int)$dashboard_id);
});
