<?php


namespace App\Repositories;


use App\Events\TaskCreated;
use App\Task;

class TaskRepository
{

    public function store(array $data): Task
    {
        $data['archived'] = false;

        $this->setSort($data);

        $task = Task::create($data);

        event(new TaskCreated($task));

        return $task;
    }


    public function update(Task $task, array $data): Task
    {
        $task->update($data);

        return $task;
    }


    public function delete(Task $task): void
    {
        $task->delete();
    }

    /**
     * get maximum sort field for specific dashboard and set it up for new Column
     */
    private function setSort(array &$data)
    {
        $data['sort'] = Task::where('column_id', $data['column_id'])->max('sort');
    }
}
