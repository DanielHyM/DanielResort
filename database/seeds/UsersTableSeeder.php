<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::firstOrCreate([
            'name'=>'Daniel',
            'dni'=>'49130181-L',
            'email'=>'dhidalgo@10code.es',
            'user'=>'admin',
            'password'=> bcrypt('admin')
            ]);

        $userSecond = User::firstOrCreate([
            'name'=>'user',
            'dni'=>'49130181-L',
            'email'=>'user@user.es',
            'user'=>'user',
            'password'=> bcrypt('user')
        ]);

        $userSecond->assignRole('user');
        $user->assignRole('admin');

        factory(User::class,10)->create()->each(function($userClient){

            $userClient->assignRole('user');


        });



    }
}
