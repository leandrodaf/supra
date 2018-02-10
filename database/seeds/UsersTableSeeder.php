<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = new App\User();

        $user->name = 'Usuário padrão';
        $user->email = 'supra@gmail.com';
        $user->password = bcrypt('supra');
        $user->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $user->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $user->save();

        $user->assignRole('admin');


    }
}
