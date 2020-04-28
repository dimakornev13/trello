<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Dashboard;
use Faker\Generator as Faker;

$factory->define(Dashboard::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4),
        'owner_id' => $faker->word,
        'background' => $faker->word,
    ];
});
