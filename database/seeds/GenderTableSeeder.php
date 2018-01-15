<?php

use Illuminate\Database\Seeder;

class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genders')->insert(
            [
                [
                'nome' => "Feminino",
                'status' => "1",
                 ],

                [
                    'nome' => "Masculino",
                    'status' => "1",
                ],

                [
                    'nome' => "Outros",
                    'status' => "1",
                ]
            ]
        );


    }
}
