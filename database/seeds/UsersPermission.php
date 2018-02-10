<?php

use Illuminate\Database\Seeder;

class UsersPermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('model_has_permissions')->insert([
            'permission_id' => 5,
            'model_id' => 1,
            'model_type' => 'Usuário App\User',
        ]);
    }
}
