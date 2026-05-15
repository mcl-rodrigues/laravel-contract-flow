<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClienteTest extends TestCase
{
    use RefreshDatabase;

    public function test_nao_cria_cliente_com_email_invalido(): void
    {
        $response = $this->post('/clientes', [
            'nome' => 'João Silva',
            'documento' => '12345678900',
            'email' => 'email-invalido',
            'status' => true,
        ]);

        $response->assertSessionHasErrors('email');
    }
}
