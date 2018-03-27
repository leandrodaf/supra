<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TipoPessoaTableSeeder::class);
        $this->call(GenderTableSeeder::class);
        $this->call(FamilySituationSeed::class);
        $this->call(CitizenshipSeed::class);
        $this->call(RolesTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(SchoolSubjectsTableSeeder::class);
        $this->call(PermissionsSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(NotificationTypeTableSeeder::class);

    }
}
