<?php


namespace App\Repositories;


use App\Column;
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
     * sort tasks inside column
     *
     * @param Column $task
     * @param array $set
     */
    public function sort(Column $task, array $set): void
    {
        Task::where('column_id', $task->id)
            ->get()
            ->each(function ($column) use ($set) {
                if (!in_array($column->id, $set['set']))
                    return true;

                $column->sort = array_search($column->id, $set['set']);
                $column->save();
            });

    }


    /**
     * get maximum sort field for specific dashboard and set it up for new Column
     *
     * @param array $data
     */
    private function setSort(array &$data)
    {
        $data['sort'] = Task::where('column_id', $data['column_id'])->max('sort');
    }


    /**
     * move task to new column
     *
     * @param Column $column
     * @param Task $task
     */
    public function move(Column $column, Task $task){
        $task->update([
            'column_id' => $column->id
        ]);
    }
}
