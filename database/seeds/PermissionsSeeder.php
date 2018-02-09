<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        Permission::create(['name' => 'view']);
        Permission::create(['name' => 'creation']);
        Permission::create(['name' => 'update']);
        Permission::create(['name' => 'delete']);

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo('view');
        $role->givePermissionTo('creation');
        $role->givePermissionTo('update');
        $role->givePermissionTo('delete');


        $role = Role::create(['name' => 'secretaria']);
        $role->givePermissionTo('view');
        $role->givePermissionTo('creation');
        $role->givePermissionTo('update');


        $role = Role::create(['name' => 'Professor']);
        $role->givePermissionTo('view');
        $role->givePermissionTo('creation');
        $role->givePermissionTo('update');


        $role = Role::create(['name' => 'Aluno']);
        $role->givePermissionTo('view');
        $role->givePermissionTo('creation');
        $role->givePermissionTo('update');

    }
}
