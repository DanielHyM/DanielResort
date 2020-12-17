<?php

use Illuminate\Database\Seeder;
use App\Housing;

class HousingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        factory(Housing::class, 30)->create();



    }
}
