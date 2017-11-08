<?php

use Illuminate\Database\Seeder;

class GeneroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('generos')->insert(
            [
                'nome' => "Feminino",
                'status' => "1",
            ]
        );

        DB::table('generos')->insert(
            [
                'nome' => "Masculino",
                'status' => "1",
            ]
        );

        DB::table('generos')->insert(
            [
                'nome' => "Outros",
                'status' => "1",
            ]
        );
    }
}
