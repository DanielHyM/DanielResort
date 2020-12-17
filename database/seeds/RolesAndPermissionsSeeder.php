<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roleAdmin = Role::create(['name' => 'admin']);
        $permissionAdmin = Permission::create(['name' => 'admin']);

        $roleUser = Role::create(['name' => 'user']);
        $permissionUser = Permission::create(['name' => 'user']);

        $roleAdmin->givePermissionTo($permissionAdmin);
        $roleUser->givePermissionTo($permissionUser);




    }
}
