<?php

use Illuminate\Database\Seeder;

class NotificationTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notification_type')->insert([
            [
                'title' => "Financeiro",
                'description' => "Você recebeu uma mensagem do financeiro, por favor acesse a central do aluno!",
                'status' => "1",
            ],
            [
                'title' => "Atividade",
                'description' => "Uma nova atividade está disponivel, acesse a central do aluno para saber mais!",
                'status' => "1",
            ],
            [
                'title' => "Professor",
                'description' => "O seu professor enviou uma nova mensagem, acesse a central do aluno para saber mais!",
                'status' => "1",
            ]
        ]);
    }
}
