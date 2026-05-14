<?php

use App\Models\Contrato;

class ContratoService
{
    public function create(array $data)
    {
        $contrato = Contrato::create([
            'cliente_id' => $data['cliente_id'],
            'data_inicio' => $data['data_inicio'],
            'data_fim' => $data['data_fim'] ?? null,
            'status' => $data['status']
        ]);

        foreach ($data['itens'] as $item) {
            $contrato->itens()->create([
                'servico_id' => $item['servico_id'],
                'quantidade' => $item['quantidade'],
                'valor' => $item['valor']
            ]);
        }

        return $contrato;
    }
}
