<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Column;
use Faker\Generator as Faker;

$factory->define(Column::class, function (Faker $faker) {
    return [
        'dashboard_id' => $faker->word,
        'title' => $faker->sentence(4),
        'sort' => $faker->randomNumber(),
    ];
});
