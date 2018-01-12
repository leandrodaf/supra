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
        DB::table('gender')->insert(
            [
                'nome' => "Feminino",
                'status' => "1",
            ]
        );

        DB::table('gender')->insert(
            [
                'nome' => "Masculino",
                'status' => "1",
            ]
        );

        DB::table('gender')->insert(
            [
                'nome' => "Outros",
                'status' => "1",
            ]
        );
    }
}
