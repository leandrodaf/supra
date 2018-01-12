<?php

use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('department')->insert([
            [
                'nome' => "Departamento financeiro",
                'status' => "1",
            ],
            [
                'nome' => "Setor acadêmico",
                'status' => "1",
            ],
            [
                'nome' => "Área pedagógica",
                'status' => "1",
            ],
            [
                'nome' => "Marketing",
                'status' => "1",
            ]
        ]);
    }
}
