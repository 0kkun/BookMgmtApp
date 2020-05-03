<?php

use Faker\Generator as Faker;

$factory->define(Shelf::class, function (Faker $faker) {
    return [
        'book_id' => $faker->numberBetween(1, 30),
        'status' => $faker->numberBetween($min = 1, $max = 3),
        'point' => $faker->numberBetween($min = 1, $max = 100),
        'finished_amount' => $faker->numberBetween($min = 1, $max = 100),
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
    ];
});

