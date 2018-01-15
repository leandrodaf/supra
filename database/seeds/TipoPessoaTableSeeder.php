<?php

use Illuminate\Database\Seeder;

class TipoPessoaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_pessoas')->insert([
            [
                'nome' => "Aluno",
                'status' => "1",
            ],
            [
                'nome' => "Responsável",
                'status' => "1",
            ],
            [
                'nome' => "Autorizado",
                'status' => "1",
            ],
            [
                'nome' => "Professor",
                'status' => "1",
            ],
            [
                'nome' => "Empresa",
                'status' => "1",
            ]
        ]);


    }
}
