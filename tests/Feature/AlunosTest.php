<?php

namespace Tests\Feature;

use App\Models\Alunos;
use App\User;
use Tests\TestCase;

class AlunosTest extends TestCase
{

    /**
     * Cadastra novo aluno.
     *
     * @return void
     */
    public function testRespostaRequestAjaxResponsaveis()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->get('/alunos/getAjax?q=leandro');


        $response->assertStatus(200)
            ->assertJson([]);;
    }



}
