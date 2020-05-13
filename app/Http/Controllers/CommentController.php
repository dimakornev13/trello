<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CreateComment;
use App\Task;

class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateComment $request
     * @param Task $task
     *
     * @return
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(CreateComment $request, Task $task)
    {
        $this->authorize('create', [Comment::class, $task]);

        $data = $request->validated();
        $data['task_id'] = $task->id;
        $data['owner_id'] = auth()->user()->id;

        $comment = Comment::create($data);

        return $comment;
    }


    /**
     * @param CreateComment $request
     * @param Comment $comment
     *
     * @return mixed
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(CreateComment $request, Comment $comment)
    {
        $this->authorize('update', [Comment::class, $comment]);

        $comment->update($request->validated());

        return $comment;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Comment $comment
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Comment $comment)
    {
        $this->authorize('delete', [Comment::class, $comment]);

        $comment->delete();
    }
}
