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

//        DB::table('permissions')->insert([
//            [
//                'name' => 'Administrador',
//                'guard_name' => 'web',
//                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//            ],
//            [
//                'name' => 'Sercretária',
//                'guard_name' => 'web',
//                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//            ],
//            [
//                'name' => 'Professor',
//                'guard_name' => 'web',
//                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//            ],
//            [
//                'name' => 'Aluno Responsável',
//                'guard_name' => 'web',
//                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//            ]
//        ]);
    }
}
