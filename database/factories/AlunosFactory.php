<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Alunos::class, function (Faker $faker) {
    return [
        'nome_aluno' => $faker->name,
        'foto_aluno' => "",
        'rg_aluno' => $faker->randomNumber,
        'sexo_aluno' => str_random(1),


    ];
});
