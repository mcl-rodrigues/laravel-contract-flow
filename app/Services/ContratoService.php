<?php

namespace App\Services;

use App\Models\Contrato;
use Illuminate\Support\Facades\DB;

class ContratoService
{
    public function create(array $data): Contrato
    {
        return DB::transaction(function () use ($data) {

            $contrato = Contrato::create([
                'cliente_id' => $data['cliente'],
                'data_inicio' => $data['data_inicio'],
                'data_fim' => $data['data_fim'] ?? null,
                'status' => $data['status'],
            ]);

            foreach ($data['itens'] as $item) {
                $contrato->itens()->create([
                    'servico_id' => $item['servico_id'],
                    'quantidade' => $item['quantidade'],
                    'valor' => $item['valor']
                ]);
            }

            return $contrato;
        });
    }

    public function update(Contrato $contrato, array $data): Contrato
    {
        return DB::transaction(function () use ($contrato, $data) {

            $contrato->update([
                'cliente_id' => $data['cliente'],
                'data_inicio' => $data['data_inicio'],
                'data_fim' => $data['data_fim'] ?? null,
                'status' => $data['status']
            ]);

            $contrato->itens()->delete();

            foreach ($data['itens'] as $item) {

                $contrato->itens()->create([
                    'servico_id' => $item['servico_id'],
                    'quantidade' => $item['quantidade'],
                    'valor' => $item['valor']
                ]);
            }

            return $contrato;
        });
    }
}
