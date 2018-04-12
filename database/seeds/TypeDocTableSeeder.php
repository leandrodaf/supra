<?php

use Illuminate\Database\Seeder;

class TypeDocTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_doc')->insert([
            [
                'name' => "RG",
                'status' => "1",
            ],
            [
                'name' => "Certidão de Nascimento",
                'status' => "1",
            ],
            [
                'name' => "Certidão de Casamento",
                'status' => "1",
            ],
            [
                'name' => "CPF",
                'status' => "1",
            ],
            [
                'name' => "Comprovante de Endereço",
                'status' => "1",
            ],
            [
                'name' => "Carteira de Vacinação",
                'status' => "1",
            ],
            [
                'name' => "Outros",
                'status' => "1",
            ]
        ]);
    }
}
