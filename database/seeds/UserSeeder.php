<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = bcrypt('test');

        $user = \App\User::create([
            'name' => 'user-1',
            'email' => 'user-1@none.com',
            'password' => $password
        ]);

        $user = \App\User::create([
            'name' => 'user-2',
            'email' => 'user-2@none.com',
            'password' => $password
        ]);
    }
}
