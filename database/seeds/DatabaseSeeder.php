<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserSeeder::class);
         $this->call(DashboardSeeder::class);
         $this->call(ColumnSeeder::class);
         $this->call(TaskSeeder::class);
    }
}
