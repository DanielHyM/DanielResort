<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Booking;
use App\Housing;
use App\User;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Booking::class, function (Faker $faker) {
    $date = Carbon::now();
    $startOfYear = $date->copy()->startOfYear();
    $endOfYear   = $date->copy()->endOfYear();

    $chckIn = $faker->dateTimeBetween($startOfYear, $endOfYear);
    $CheckInDate =  $chckIn->format("Y-m-d"); // 1994-09-24;
    $CheckOutDate = $faker->dateTimeBetween($chckIn, $endOfYear)->format("Y-m-d");
    $countUsers = User::all()->count();

    return [
        'user_id' => $faker->randomFloat( 0, 2, $countUsers),
        'housing_id'=> $faker->randomFloat( 0, 2, Housing::all()->count()),
        'check_in_date' => $CheckInDate,
        'check_in_time' => $faker->time($format = 'H:i:s'), // '20:49:42',
        'check_out_date' => $CheckOutDate,
        'check_out_time' => $faker->time($format = 'H:i:s')
    ];
});
