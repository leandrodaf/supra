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
        DB::table('tipo_pessoas')->insert(
            [
                'nome' => "Aluno",
                'status' => "1",
            ]
        );

        DB::table('tipo_pessoas')->insert(
            [
                'nome' => "Responsável",
                'status' => "1",
            ]
        );

        DB::table('tipo_pessoas')->insert(
            [
                'nome' => "Autorizado",
                'status' => "1",
            ]
        );

        DB::table('tipo_pessoas')->insert(
            [
                'nome' => "Professor",
                'status' => "1",
            ]
        );
    }
}
