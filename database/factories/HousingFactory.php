<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Housing;
use Faker\Generator as Faker;

$factory->define(Housing::class, function (Faker $faker) {

    return [
        'price_per_night' => $faker->randomFloat($numberDecimals = 2, 30, 190),
        'description'=>'Habitación muy comoda con vistas geniales'
    ];
});
