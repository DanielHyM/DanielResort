<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Housing;
use Faker\Generator as Faker;

$factory->define(Housing::class, function (Faker $faker) {
    return [
        'floor' => $faker->unique(true)->numberBetween($min = 1, $max = 10),
        'room_number'=> $faker->unique(true)->numberBetween( $min = 1, $max = 5),
        'price_per_night' => $faker->randomFloat($numberDecimals = 2, 30, 190)
    ];
});
