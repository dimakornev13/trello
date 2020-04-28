<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\DashboardUser;
use Faker\Generator as Faker;

$factory->define(DashboardUser::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomNumber(),
        'dashboard_id' => $faker->randomNumber(),
    ];
});
