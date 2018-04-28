<?php

use Illuminate\Database\Seeder;

class PaymentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment')->insert([
            [
                'nome' => "Débito",
                'status' => "1",
            ],
            [
                'nome' => "Crédito",
                'status' => "1",
            ]
        ]);
    }
}
