<?php

namespace App\Policies;

use App\Comment;
use App\DashboardUser;
use App\Task;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;


    /**
     * Determine whether the user can create models.
     *
     * @param \App\User $user
     * @param Task $task
     *
     * @return mixed
     */
    public function create(User $user, Task $task)
    {
        return DashboardUser::isMember($user->id, $task->dashboard_id);
    }


    /**
     * Determine whether the user can update the model.
     *
     * @param \App\User $user
     * @param \App\Comment $comment
     *
     * @return mixed
     */
    public function update(User $user, Comment $comment)
    {
        return $comment->owner_id === $user->id;
    }


    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\User $user
     * @param \App\Comment $comment
     *
     * @return mixed
     */
    public function delete(User $user, Comment $comment)
    {
        return $comment->owner_id === $user->id;
    }

}
