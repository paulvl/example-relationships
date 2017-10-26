<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Clase::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'teacher_id' => 1
    ];
});
