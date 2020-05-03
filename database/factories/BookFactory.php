<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title' => $faker->realText($maxNbChars = 20, $indexSize = 1),
        'genre' => $faker->numberBetween($min = 1, $max = 20),
        'book_volume' => $faker->numberBetween($min = 10, $max = 100),
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
    ];
});
