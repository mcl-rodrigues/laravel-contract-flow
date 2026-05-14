<?php

namespace Database\Seeders;

use App\Models\ContratoItem;
use Illuminate\Database\Seeder;

class ContratoItemSeeder extends Seeder
{
    public function run(): void
    {
        // contrato 1
        ContratoItem::create(['contrato_id' => 1, 'servico_id' => 1, 'quantidade' => 2, 'valor' => 100]);
        ContratoItem::create(['contrato_id' => 1, 'servico_id' => 2, 'quantidade' => 1, 'valor' => 250]);

        // contrato 2
        ContratoItem::create(['contrato_id' => 2, 'servico_id' => 3, 'quantidade' => 3, 'valor' => 180]);

        // contrato 3
        ContratoItem::create(['contrato_id' => 3, 'servico_id' => 5, 'quantidade' => 2, 'valor' => 300]);
        ContratoItem::create(['contrato_id' => 3, 'servico_id' => 6, 'quantidade' => 1, 'valor' => 220]);

        // contrato 4
        ContratoItem::create(['contrato_id' => 4, 'servico_id' => 7, 'quantidade' => 1, 'valor' => 350]);
        ContratoItem::create(['contrato_id' => 4, 'servico_id' => 8, 'quantidade' => 2, 'valor' => 280]);
        ContratoItem::create(['contrato_id' => 4, 'servico_id' => 8, 'quantidade' => 2, 'valor' => 280]);

        // contrato 5
        ContratoItem::create(['contrato_id' => 5, 'servico_id' => 9, 'quantidade' => 3, 'valor' => 150]);
        ContratoItem::create(['contrato_id' => 5, 'servico_id' => 10, 'quantidade' => 1, 'valor' => 500]);

        // contrato 6
        ContratoItem::create(['contrato_id' => 6, 'servico_id' => 1, 'quantidade' => 1, 'valor' => 100]);
        ContratoItem::create(['contrato_id' => 6, 'servico_id' => 1, 'quantidade' => 1, 'valor' => 100]);
        ContratoItem::create(['contrato_id' => 6, 'servico_id' => 1, 'quantidade' => 1, 'valor' => 100]);
        ContratoItem::create(['contrato_id' => 6, 'servico_id' => 2, 'quantidade' => 2, 'valor' => 250]);

        // contrato 7
        ContratoItem::create(['contrato_id' => 7, 'servico_id' => 3, 'quantidade' => 1, 'valor' => 180]);

        // contrato 8
        ContratoItem::create(['contrato_id' => 8, 'servico_id' => 5, 'quantidade' => 1, 'valor' => 300]);

        // contrato 9
        ContratoItem::create(['contrato_id' => 9, 'servico_id' => 7, 'quantidade' => 2, 'valor' => 350]);
        ContratoItem::create(['contrato_id' => 9, 'servico_id' => 8, 'quantidade' => 1, 'valor' => 280]);
        ContratoItem::create(['contrato_id' => 9, 'servico_id' => 8, 'quantidade' => 1, 'valor' => 280]);

        // contrato 10
        ContratoItem::create(['contrato_id' => 10, 'servico_id' => 9, 'quantidade' => 2, 'valor' => 150]);
        ContratoItem::create(['contrato_id' => 10, 'servico_id' => 10, 'quantidade' => 1, 'valor' => 500]);
    }
}
