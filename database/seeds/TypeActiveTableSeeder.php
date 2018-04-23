<?php

use Illuminate\Database\Seeder;

class TypeActiveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_active')->insert([
            [
                'nome' => "Entrada",
                'status' => "1",
            ],
            [
                'nome' => "Saída",
                'status' => "1",
            ]
        ]);



    }
}
