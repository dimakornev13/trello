<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\History;
use Faker\Generator as Faker;

$factory->define(History::class, function (Faker $faker) {
    return [
        'content' => $faker->paragraphs(3, true),
        'dashboard_id' => $faker->randomNumber(),
        'task_id' => $faker->randomNumber(),
    ];
});
