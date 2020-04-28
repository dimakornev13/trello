<?php

use Illuminate\Database\Seeder;

class DashboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::all()->each(function ($user){
            $ids = factory(\App\Dashboard::class, 3)->create([
                'owner_id' => $user->id
            ])->pluck('id');

            $user->dashboards()->sync($ids);

            if($user->id === 2)
                $user->dashboards()->attach(1);
        });


    }
}
