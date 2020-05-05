<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class DashboardUser extends Pivot
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'dashboard_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];


    /**
     * check if an user is a member of a dashboard
     *
     * @param int $userID
     * @param int $dashboardID
     *
     * @return bool
     */
    public static function isMember(int $userID, int $dashboardID): bool
    {
        return static::where('user_id', $userID)
            ->where('dashboard_id', $dashboardID)
            ->exists();
    }

    /**
     * return dashboards id where user is member
     *
     * @param int $userID
     * @param int $dashboardID
     *
     * @return mixed
     */
    public static function getDashboardsID(int $userID)
    {
        return static::query()->select('dashboard_id')
            ->where('user_id', $userID)
            ->get();
    }
}
