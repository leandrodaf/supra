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
        DB::table('familySituation')->insert(
            [
                'nome' => "Solteiro(a)",
                'status' => "1",
            ]
        );

        DB::table('familySituation')->insert(
            [
                'nome' => "Casado(a)",
                'status' => "1",
            ]
        );

        DB::table('familySituation')->insert(
            [
                'nome' => "Separado(a)",
                'status' => "1",
            ]
        );

        DB::table('familySituation')->insert(
            [
                'nome' => "Divorciado(a)",
                'status' => "1",
            ]
        );

        DB::table('familySituation')->insert(
            [
                'nome' => "Viúvo(a)",
                'status' => "1",
            ]
        );
    }
}
