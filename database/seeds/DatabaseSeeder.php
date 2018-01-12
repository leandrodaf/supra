<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TipoPessoaTableSeeder::class);
        $this->call(GeneroTableSeeder::class);
        $this->call(EstadoCivilSeed::class);
        $this->call(NacionalidadeSeed::class);
        $this->call(PessoaResponsavelTableSeeder::class);
        $this->call(FuncoesTableSeeder::class);
        $this->call(SetoresTableSeeder::class);
        $this->call(MateriasTableSeeder::class);
    }
}
