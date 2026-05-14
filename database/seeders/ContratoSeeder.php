<?php

namespace Database\Seeders;

use App\Models\Contrato;
use Illuminate\Database\Seeder;

class ContratoSeeder extends Seeder
{
    public function run(): void
    {
        Contrato::create(['cliente_id' => 1, 'data_inicio' => '2025-01-01', 'data_fim' => null, 'status' => true]);

        Contrato::create(['cliente_id' => 2, 'data_inicio' => '2025-01-10', 'data_fim' => '2025-03-10', 'status' => true]);

        Contrato::create(['cliente_id' => 3, 'data_inicio' => '2025-02-01', 'data_fim' => null, 'status' => true]);

        Contrato::create(['cliente_id' => 4, 'data_inicio' => '2025-02-15', 'data_fim' => null, 'status' => false]);

        Contrato::create(['cliente_id' => 5, 'data_inicio' => '2025-03-01', 'data_fim' => null, 'status' => true]);

        Contrato::create(['cliente_id' => 6, 'data_inicio' => '2025-03-10', 'data_fim' => null, 'status' => false]);

        Contrato::create(['cliente_id' => 7, 'data_inicio' => '2025-04-01', 'data_fim' => null, 'status' => true]);

        Contrato::create(['cliente_id' => 8, 'data_inicio' => '2025-04-15', 'data_fim' => null, 'status' => true]);

        Contrato::create(['cliente_id' => 9, 'data_inicio' => '2025-05-01', 'data_fim' => '2026-05-10', 'status' => true]);

        Contrato::create(['cliente_id' => 10, 'data_inicio' => '2025-05-10', 'data_fim' => null, 'status' => true]);
    }
}