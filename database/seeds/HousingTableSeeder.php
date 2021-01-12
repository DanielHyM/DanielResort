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

        for( $f = 1; $f < 11; $f++) {
            for($i = 1 ; $i < 6; $i++){

                factory(Housing::class)->create(['floor'=>$f,'room_number'=>$f.'0'.$i]);

            }

         }
    }
}
