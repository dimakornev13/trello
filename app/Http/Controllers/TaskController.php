<?php

namespace App\Http\Controllers;

use App\Column;
use App\Http\Requests\SortTasks;
use App\Http\Requests\StoreAndUpdateTask;
use App\Http\Requests\StoreAndUpdateTask as StoreAndUpdateTaskAlias;
use App\Repositories\TaskRepository;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Task::class, 'task');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAndUpdateTaskAlias $request
     * @param TaskRepository $repository
     *
     * @return Task
     */
    public function store(StoreAndUpdateTaskAlias $request, TaskRepository $repository)
    {
        return $repository->store($request->validated());
    }


    /**
     * Update the specified resource in storage.
     *
     * @param StoreAndUpdateTaskAlias $request
     * @param Task $task
     * @param TaskRepository $repository
     *
     * @return Task
     */
    public function update(StoreAndUpdateTask $request, Task $task, TaskRepository $repository)
    {
        return $repository->update($task, $request->validated());
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Task $task
     * @param TaskRepository $repository
     */
    public function destroy(Task $task, TaskRepository $repository)
    {
        $repository->delete($task);
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
        $data = $request->validated();

        Gate::authorize('sort', [Task::class, $column]);

        $repository->sort($column, $data);
    }


    /**
     * move tasks inside column
     *
     * @param Column $column
     * @param Task $task
     * @param TaskRepository $repository
     */
    public function move(Column $column, Task $task, TaskRepository $repository)
    {
        Gate::authorize('move', [Task::class, $column, $task]);

        $repository->move($column, $task);
    }
}
