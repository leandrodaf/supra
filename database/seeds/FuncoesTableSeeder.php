<?php

use Illuminate\Database\Seeder;

class FuncoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('funcao')->insert([
                [
                    'nome' => "Faxineiro",
                    'status' => "1",
                ],
                [
                    'nome' => "Diretor",
                    'status' => "1",
                ],
                [
                    'nome' => "Coordenador pedagógico",
                    'status' => "1",
                ],
                [
                    'nome' => "Secretária",
                    'status' => "1",
                ],
                [
                    'nome' => "Merendeiros",
                    'status' => "1",
                ],
                [
                    'nome' => "Zelador",
                    'status' => "1",
                ],
                [
                    'nome' => "Porteiro",
                    'status' => "1",
                ]
            ]);
    }
}
