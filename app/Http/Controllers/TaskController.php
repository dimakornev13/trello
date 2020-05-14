<?php

namespace App\Http\Controllers;

use App\Column;
use App\Events\TaskHasBeenSorted;
use App\Http\Requests\SortTasks;
use App\Http\Requests\StoreAndUpdateTask;
use App\Repositories\TaskRepository;
use App\Task;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{

    private $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->authorizeResource(Task::class, 'task');

        $this->repository = $repository;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAndUpdateTask $request
     *
     * @return Task
     */
    public function store(StoreAndUpdateTask $request)
    {
        return $this->repository->store($request->validated());
    }


    /**
     * @param Task $task
     *
     * @return Task
     */
    public function show(Task $task)
    {
        $task->load(['comments', 'comments.user', 'history']);

        return $task;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param StoreAndUpdateTask $request
     * @param Task $task
     *
     * @return Task
     */
    public function update(StoreAndUpdateTask $request, Task $task)
    {
        $task->update($request->validated());

        return $task;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Task $task
     *
     * @throws \Exception
     */
    public function destroy(Task $task)
    {
        $task->delete();
    }


    /**
     * sort tasks inside column
     *
     * @param SortTasks $request
     * @param Column $column
     * @param TaskRepository $repository
     */
    public function sort(SortTasks $request, Column $column, TaskRepository $repository)
    {
        Gate::authorize('sort', [Task::class, $column]);

        $data = $request->validated();

        $repository->sort($column, $data);

        $column->load('tasks');

        event(new TaskHasBeenSorted($column, auth()->user()));
    }

}
