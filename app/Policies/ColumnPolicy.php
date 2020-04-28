<?php

namespace App\Policies;

use App\Column;
use App\DashboardUser;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ColumnPolicy
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
        //
    }


    /**
     * Determine whether the user can view the model.
     *
     * @param \App\User $user
     * @param \App\Column $column
     *
     * @return mixed
     */
    public function view(User $user, Column $column)
    {
        //
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
        return DashboardUser::isMember($user->id, request('dashboard_id', 0));
    }

    /**
     * Determine whether the user can sort models.
     *
     * @param \App\User $user
     *
     * @return mixed
     */
    public function sort(User $user)
    {
        return DashboardUser::isMember($user->id, request('dashboard_id', 0));
    }


    /**
     * Determine whether the user can update the model.
     *
     * @param \App\User $user
     * @param \App\Column $column
     *
     * @return mixed
     */
    public function update(User $user, Column $column)
    {
        return DashboardUser::isMember($user->id, $column->dashboard_id);
    }


    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\User $user
     * @param \App\Column $column
     *
     * @return mixed
     */
    public function delete(User $user, Column $column)
    {
        return DashboardUser::isMember($user->id, $column->dashboard_id);
    }


    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\User $user
     * @param \App\Column $column
     *
     * @return mixed
     */
    public function restore(User $user, Column $column)
    {
        //
    }


    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\User $user
     * @param \App\Column $column
     *
     * @return mixed
     */
    public function forceDelete(User $user, Column $column)
    {
        //
    }
}
