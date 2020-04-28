<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'content' => $faker->paragraphs(3, true),
        'owner_id' => $faker->word,
        'task_id' => $faker->word,
    ];
});
