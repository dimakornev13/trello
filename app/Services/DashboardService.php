<?php


namespace App\Services;


use App\Dashboard;
use App\DashboardUser;
use App\User;

class DashboardService
{
    public static function getUserDashboards(User $user){
        return Dashboard::whereIn('id', DashboardUser::getDashboardsID($user->id))->get();
    }
}
