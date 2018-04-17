<?php

use Illuminate\Database\Seeder;

class PhonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
            DB::table('phones')->insert(
                    [
                        [
                          'number' => rand(92222, 93333) . '-' . rand(3333, 5555),
                          'created_at' => \Carbon\Carbon::now(),
                          'updated_at' => \Carbon\Carbon::now(),
                          'deleted_at' => \Carbon\Carbon::now(),
                          'message_id' => rand(1, 3),
                        ],
                      [
                        'number' => rand(92222, 93333) . '-' . rand(3333, 5555),
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now(),
                        'deleted_at' => \Carbon\Carbon::now(),
                        'message_id' => rand(1, 3),
                    ],
                    [
                      'number' => rand(92222, 93333) . '-' . rand(3333, 5555),
                      'created_at' => \Carbon\Carbon::now(),
                      'updated_at' => \Carbon\Carbon::now(),
                      'deleted_at' => \Carbon\Carbon::now(),
                      'message_id' => rand(1, 3),
                  ]
                    ]
           );
    }
}
