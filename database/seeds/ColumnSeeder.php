<?php

use Illuminate\Database\Seeder;

class ColumnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Dashboard::all()->each(function ($dashboard){
            factory(\App\Column::class, 3)->create([
                'dashboard_id' => $dashboard->id
            ]);
        });
    }
}
