<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Cliente;
use App\Models\Contrato;
use App\Models\ContratoItem;
use App\Models\Servico;

class ContratoTest extends TestCase
{
    use RefreshDatabase;

    public function test_calcula_valor_total_do_contrato(): void
    {
        $cliente = Cliente::create([
            'nome' => 'João Silva',
            'documento' => '12345678900',
            'email' => 'joãosilva@email.com',
            'status' => true,
        ]);

        $servicoA = Servico::create([
            'nome' => 'Servico A',
            'valor_base' => 100,
        ]);

        $servicoB = Servico::create([
            'nome' => 'Servico B',
            'valor_base' => 200,
        ]);

        $contrato = Contrato::create([
            'cliente_id' => $cliente->id,
            'data_inicio' => now(),
            'status' => 'ativo',
        ]);

        ContratoItem::create([
            'contrato_id' => $contrato->id,
            'servico_id' => $servicoA->id,
            'quantidade' => 2,
            'valor_unitario' => 100,
        ]);

        ContratoItem::create([
            'contrato_id' => $contrato->id,
            'servico_id' => $servicoB->id,
            'quantidade' => 1,
            'valor_unitario' => 200,
        ]);

        $this->assertEquals(400, $contrato->valor_total);
    }

    public function test_aplica_desconto_quando_quantidade_for_maior_ou_igual_a_5(): void
    {
        $cliente = Cliente::create([
            'nome' => 'João Silva',
            'documento' => '12345678900',
            'email' => 'joãosilva@email.com',
            'status' => true,
        ]);

        $servico = Servico::create([
            'nome' => 'Servico A',
            'valor_base' => 100,
        ]);

        $contrato = Contrato::create([
            'cliente_id' => $cliente->id,
            'data_inicio' => now(),
            'status' => 'ativo',
        ]);

        ContratoItem::create([
            'contrato_id' => $contrato->id,
            'servico_id' => $servico->id,
            'quantidade' => 5,
            'valor_unitario' => 100,
        ]);

        $this->assertEquals(450, $contrato->valor_total);
    }

    public function test_nao_aplica_desconto_quando_quantidade_for_menor_que_5(): void
    {
        $cliente = Cliente::create([
            'nome' => 'João Silva',
            'documento' => '12345678900',
            'email' => 'joãosilva@email.com',
            'status' => true,
        ]);

        $servico = Servico::create([
            'nome' => 'Servico A',
            'valor_base' => 100,
        ]);

        $contrato = Contrato::create([
            'cliente_id' => $cliente->id,
            'data_inicio' => now(),
            'status' => 'ativo',
        ]);

        ContratoItem::create([
            'contrato_id' => $contrato->id,
            'servico_id' => $servico->id,
            'quantidade' => 4,
            'valor_unitario' => 100,
        ]);

        $this->assertEquals(400, $contrato->valor_total);
    }
}
