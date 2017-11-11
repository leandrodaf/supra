<?php

use Illuminate\Database\Seeder;

class EstadoCivilSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estado_civil')->insert(
            [
                'nome' => "Solteiro",
                'status' => "1",
            ]
        );

        DB::table('estado_civil')->insert(
            [
                'nome' => "Casado",
                'status' => "1",
            ]
        );

        DB::table('estado_civil')->insert(
            [
                'nome' => "Separado",
                'status' => "1",
            ]
        );

        DB::table('estado_civil')->insert(
            [
                'nome' => "Divorciado",
                'status' => "1",
            ]
        );

        DB::table('estado_civil')->insert(
            [
                'nome' => "Viúvo(a)",
                'status' => "1",
            ]
        );
    }
}
