<?php

use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Column::all()->each(function ($task){
            factory(\App\Task::class, 5)->create([
                'column_id' => $task
            ]);
        });
    }
}
