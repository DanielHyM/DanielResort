<?php

use App\Booking;
use App\User;
use Illuminate\Database\Seeder;
use App\Housing;

class BookingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(Booking::class,User::all()->count())->create();
    }
}
