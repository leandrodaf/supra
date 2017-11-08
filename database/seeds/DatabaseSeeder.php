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
    }
}
