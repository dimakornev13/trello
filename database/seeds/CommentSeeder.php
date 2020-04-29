<?php

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\User::all()->pluck('id')->toArray();

        \App\Task::all()->each(function ($task) use ($users) {
            foreach ($users as $user_id)
                factory(\App\Comment::class, 2)->create([
                    'owner_id' => $user_id,
                    'task_id' => $task->id
                ]);
        });
    }
}
