<?php

use Illuminate\Database\Seeder;

class PessoaResponsavelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pessoas')->insert([
            [
                'nome' => str_random(10),
                'cpf_cnpj' => rand(100, 900) . '.' . rand(100, 900) . '.' . rand(100, 900) . '-' . rand(10, 90),
                'sexo' => rand(1, 3),
                'rg' => rand(10, 90) . '.' . rand(100, 900) . '.' . rand(100, 900) . '-' . rand(1, 9),
                'dataNascimento' => \Carbon\Carbon::now(),
                'familySituation' => rand(1, 5),
                'razaoSocial' => null,
                'nomeFantasia' => null,
                'inscricaoEstadual' => null,
                'citizenship' => 7,
                'status' => 1,
                'tipo_pessoas_id' => 2
            ],
            [
                'nome' => str_random(10),
                'cpf_cnpj' => rand(100, 900) . '.' . rand(100, 900) . '.' . rand(100, 900) . '-' . rand(10, 90),
                'sexo' => rand(1, 3),
                'rg' => rand(10, 90) . '.' . rand(100, 900) . '.' . rand(100, 900) . '-' . rand(1, 9),
                'dataNascimento' => \Carbon\Carbon::now(),
                'familySituation' => rand(1, 5),
                'razaoSocial' => null,
                'nomeFantasia' => null,
                'inscricaoEstadual' => null,
                'citizenship' => 7,
                'status' => 1,
                'tipo_pessoas_id' => 2
            ],
            [
                'nome' => str_random(10),
                'cpf_cnpj' => rand(100, 900) . '.' . rand(100, 900) . '.' . rand(100, 900) . '-' . rand(10, 90),
                'sexo' => rand(1, 3),
                'rg' => rand(10, 90) . '.' . rand(100, 900) . '.' . rand(100, 900) . '-' . rand(1, 9),
                'dataNascimento' => \Carbon\Carbon::now(),
                'familySituation' => rand(1, 5),
                'razaoSocial' => null,
                'nomeFantasia' => null,
                'inscricaoEstadual' => null,
                'citizenship' => 7,
                'status' => 1,
                'tipo_pessoas_id' => 2
            ],
            [
                'nome' => str_random(10),
                'cpf_cnpj' => rand(100, 900) . '.' . rand(100, 900) . '.' . rand(100, 900) . '-' . rand(10, 90),
                'sexo' => rand(1, 3),
                'rg' => rand(10, 90) . '.' . rand(100, 900) . '.' . rand(100, 900) . '-' . rand(1, 9),
                'dataNascimento' => \Carbon\Carbon::now(),
                'familySituation' => rand(1, 5),
                'razaoSocial' => null,
                'nomeFantasia' => null,
                'inscricaoEstadual' => null,
                'citizenship' => 7,
                'status' => 1,
                'tipo_pessoas_id' => 2
            ],
            [
                'nome' => str_random(10),
                'cpf_cnpj' => rand(100, 900) . '.' . rand(100, 900) . '.' . rand(100, 900) . '-' . rand(10, 90),
                'sexo' => rand(1, 3),
                'rg' => rand(10, 90) . '.' . rand(100, 900) . '.' . rand(100, 900) . '-' . rand(1, 9),
                'dataNascimento' => \Carbon\Carbon::now(),
                'familySituation' => rand(1, 5),
                'razaoSocial' => null,
                'nomeFantasia' => null,
                'inscricaoEstadual' => null,
                'citizenship' => 7,
                'status' => 1,
                'tipo_pessoas_id' => 2
            ],
            [
                'nome' => str_random(10),
                'cpf_cnpj' => rand(100, 900) . '.' . rand(100, 900) . '.' . rand(100, 900) . '-' . rand(10, 90),
                'sexo' => rand(1, 3),
                'rg' => rand(10, 90) . '.' . rand(100, 900) . '.' . rand(100, 900) . '-' . rand(1, 9),
                'dataNascimento' => \Carbon\Carbon::now(),
                'familySituation' => rand(1, 5),
                'razaoSocial' => null,
                'nomeFantasia' => null,
                'inscricaoEstadual' => null,
                'citizenship' => 7,
                'status' => 1,
                'tipo_pessoas_id' => 2
            ],
            [
                'nome' => str_random(10),
                'cpf_cnpj' => rand(100, 900) . '.' . rand(100, 900) . '.' . rand(100, 900) . '-' . rand(10, 90),
                'sexo' => rand(1, 3),
                'rg' => rand(10, 90) . '.' . rand(100, 900) . '.' . rand(100, 900) . '-' . rand(1, 9),
                'dataNascimento' => \Carbon\Carbon::now(),
                'familySituation' => rand(1, 5),
                'razaoSocial' => null,
                'nomeFantasia' => null,
                'inscricaoEstadual' => null,
                'citizenship' => 7,
                'status' => 1,
                'tipo_pessoas_id' => 2
            ],
            [
                'nome' => str_random(10),
                'cpf_cnpj' => rand(100, 900) . '.' . rand(100, 900) . '.' . rand(100, 900) . '-' . rand(10, 90),
                'sexo' => rand(1, 3),
                'rg' => rand(10, 90) . '.' . rand(100, 900) . '.' . rand(100, 900) . '-' . rand(1, 9),
                'dataNascimento' => \Carbon\Carbon::now(),
                'familySituation' => rand(1, 5),
                'razaoSocial' => null,
                'nomeFantasia' => null,
                'inscricaoEstadual' => null,
                'citizenship' => 7,
                'status' => 1,
                'tipo_pessoas_id' => 2
            ],
            [
                'nome' => str_random(10),
                'cpf_cnpj' => rand(100, 900) . '.' . rand(100, 900) . '.' . rand(100, 900) . '-' . rand(10, 90),
                'sexo' => rand(1, 3),
                'rg' => rand(10, 90) . '.' . rand(100, 900) . '.' . rand(100, 900) . '-' . rand(1, 9),
                'dataNascimento' => \Carbon\Carbon::now(),
                'familySituation' => rand(1, 5),
                'razaoSocial' => null,
                'nomeFantasia' => null,
                'inscricaoEstadual' => null,
                'citizenship' => 7,
                'status' => 1,
                'tipo_pessoas_id' => 2
            ],
            [
                'nome' => str_random(10),
                'cpf_cnpj' => rand(100, 900) . '.' . rand(100, 900) . '.' . rand(100, 900) . '-' . rand(10, 90),
                'sexo' => rand(1, 3),
                'rg' => rand(10, 90) . '.' . rand(100, 900) . '.' . rand(100, 900) . '-' . rand(1, 9),
                'dataNascimento' => \Carbon\Carbon::now(),
                'familySituation' => rand(1, 5),
                'razaoSocial' => null,
                'nomeFantasia' => null,
                'inscricaoEstadual' => null,
                'citizenship' => 7,
                'status' => 1,
                'tipo_pessoas_id' => 2
            ],
            [
                'nome' => str_random(10),
                'cpf_cnpj' => rand(100, 900) . '.' . rand(100, 900) . '.' . rand(100, 900) . '-' . rand(10, 90),
                'sexo' => rand(1, 3),
                'rg' => rand(10, 90) . '.' . rand(100, 900) . '.' . rand(100, 900) . '-' . rand(1, 9),
                'dataNascimento' => \Carbon\Carbon::now(),
                'familySituation' => rand(1, 5),
                'razaoSocial' => null,
                'nomeFantasia' => null,
                'inscricaoEstadual' => null,
                'citizenship' => 7,
                'status' => 1,
                'tipo_pessoas_id' => 2
            ],
            [
                'nome' => str_random(10),
                'cpf_cnpj' => rand(100, 900) . '.' . rand(100, 900) . '.' . rand(100, 900) . '-' . rand(10, 90),
                'sexo' => rand(1, 3),
                'rg' => rand(10, 90) . '.' . rand(100, 900) . '.' . rand(100, 900) . '-' . rand(1, 9),
                'dataNascimento' => \Carbon\Carbon::now(),
                'familySituation' => rand(1, 5),
                'razaoSocial' => null,
                'nomeFantasia' => null,
                'inscricaoEstadual' => null,
                'citizenship' => 7,
                'status' => 1,
                'tipo_pessoas_id' => 2
            ],
            [
                'nome' => str_random(10),
                'cpf_cnpj' => rand(100, 900) . '.' . rand(100, 900) . '.' . rand(100, 900) . '-' . rand(10, 90),
                'sexo' => rand(1, 3),
                'rg' => rand(10, 90) . '.' . rand(100, 900) . '.' . rand(100, 900) . '-' . rand(1, 9),
                'dataNascimento' => \Carbon\Carbon::now(),
                'familySituation' => rand(1, 5),
                'razaoSocial' => null,
                'nomeFantasia' => null,
                'inscricaoEstadual' => null,
                'citizenship' => 7,
                'status' => 1,
                'tipo_pessoas_id' => 2
            ],
            [
                'nome' => str_random(10),
                'cpf_cnpj' => rand(100, 900) . '.' . rand(100, 900) . '.' . rand(100, 900) . '-' . rand(10, 90),
                'sexo' => rand(1, 3),
                'rg' => rand(10, 90) . '.' . rand(100, 900) . '.' . rand(100, 900) . '-' . rand(1, 9),
                'dataNascimento' => \Carbon\Carbon::now(),
                'familySituation' => rand(1, 5),
                'razaoSocial' => null,
                'nomeFantasia' => null,
                'inscricaoEstadual' => null,
                'citizenship' => 7,
                'status' => 1,
                'tipo_pessoas_id' => 2
            ],

        ]);
    }
}
