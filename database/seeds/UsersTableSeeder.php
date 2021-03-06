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
        $user = User::create([
            'name'=>'Admin',
            'dni'=>'45432345-L',
            'email'=>'admin@admin.es',
            'user'=>'admin',
            'password'=> bcrypt('admin')
            ]);

        $userSecond = User::create([
            'name'=>'user',
            'dni'=>'456786543-X',
            'email'=>'user@user.es',
            'user'=>'user',
            'password'=> bcrypt('user')
        ]);

        $userSecond->assignRole('user');
        $user->assignRole('admin');

        factory(User::class,150)->create()->each(function($userClient){

            $userClient->assignRole('user');

        });



    }
}
