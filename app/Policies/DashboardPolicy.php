<?php

namespace App\Policies;

use App\Dashboard;
use App\DashboardUser;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DashboardPolicy
{

    use HandlesAuthorization;


    /**
     * Determine whether the user can view any models.
     *
     * @param \App\User $user
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }


    /**
     * Determine whether the user can view the model.
     *
     * @param \App\User $user
     * @param \App\Dashboard $dashboard
     *
     * @return mixed
     */
    public function view(User $user, Dashboard $dashboard)
    {
        return DashboardUser::where('user_id', $user->id)
            ->where('dashboard_id', $dashboard->id)
            ->exists();
    }


    /**
     * Determine whether the user can create models.
     *
     * @param \App\User $user
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }


    /**
     * Determine whether the user can update the model.
     *
     * @param \App\User $user
     * @param \App\Dashboard $dashboard
     *
     * @return mixed
     */
    public function update(User $user, Dashboard $dashboard)
    {
        return $user->id === (int)$dashboard->owner_id;
    }


    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\User $user
     * @param \App\Dashboard $dashboard
     *
     * @return mixed
     */
    public function delete(User $user, Dashboard $dashboard)
    {
        return $user->id === $dashboard->owner_id;
    }


    /**
     * Determine whether the user can sort models.
     *
     * @param \App\User $user
     * @param Dashboard $dashboard
     *
     * @return mixed
     */
    public function sort(User $user, Dashboard $dashboard)
    {
        return DashboardUser::isMember($user->id, $dashboard->id);
    }
}
