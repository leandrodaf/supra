<?php

use Illuminate\Database\Seeder;

class SchoolSubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schoolsubjects')->insert([

            ['nome' => 'PORTUGUÊS',
                'status' => "1"
            ],
            [
                'nome' => 'MATEMÁTICA',
                'status' => "1",
            ],
            [
                'nome' => 'HISTÓRIA',
                'status' => "1",
            ],
            [
                'nome' => 'GEOGRAFIA',
                'status' => "1",
            ],
            [
                'nome' => 'CIÊNCIAS',
                'status' => "1",
            ],
            [
                'nome' => 'INGLÊS',
                'status' => "1",
            ],
            [
                'nome' => 'EDUCAÇÃO FÍSICA',
                'status' => "1",
            ],
            [
                'nome' => 'EDUCAÇÃO ARTÍSTICA',
                'status' => "1",
            ]
        ]);
    }
}
