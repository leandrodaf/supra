<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RotasIniciaisTest extends TestCase
{

    public function testRotaDeLogin()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function testRotaDeRecuperarSenha()
    {
        $response = $this->get('/password/reset');

        $response->assertStatus(200);
    }
}
