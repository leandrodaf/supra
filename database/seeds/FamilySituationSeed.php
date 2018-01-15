<?php

use Illuminate\Database\Seeder;

class FamilySituationSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('familySituations')->insert([
            [
                'nome' => "Solteiro(a)",
                'status' => "1",
            ],

            [
                'nome' => "Casado(a)",
                'status' => "1",
            ],

            [
                'nome' => "Separado(a)",
                'status' => "1",
            ],

            [
                'nome' => "Divorciado(a)",
                'status' => "1",
            ],

            [
                'nome' => "Viúvo(a)",
                'status' => "1",
            ]
        ]);
    }
}
