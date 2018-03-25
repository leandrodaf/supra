<?php

use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //



        DB::table('messages')->insert(
            [
                [
                'nome' => "Conversar com o diretor",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'data_message' => \Carbon\Carbon::now(),
                ],
                [
                'nome' => "Reunião com os Professores",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'data_message' => \Carbon\Carbon::now(),
                ],
                [
                'nome' => "Falar com mãe do aluno",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'data_message' => \Carbon\Carbon::now(),
                 ]


            ]
        );
    }
}
