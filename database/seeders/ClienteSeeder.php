<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    public function run(): void
    {
        // CPF (pessoas)
        Cliente::create(['nome' => 'Lucas Almeida Hitaki', 'documento' => '11111111111', 'email' => 'lucas@email.com', 'status' => true]);
        Cliente::create(['nome' => 'Mariana Souza', 'documento' => '22222222222', 'email' => 'mariana@email.com', 'status' => true]);
        Cliente::create(['nome' => 'Rafael Costa Podolski', 'documento' => '33333333333', 'email' => 'rafael@email.com', 'status' => false]);
        Cliente::create(['nome' => 'Camila Rocha Veiga', 'documento' => '44444444444', 'email' => 'camila@email.com', 'status' => true]);
        Cliente::create(['nome' => 'Bruno Lima', 'documento' => '55555555555', 'email' => 'bruno@email.com', 'status' => true]);

        // CNPJ (empresas)
        Cliente::create(['nome' => 'Tech Solutions LTDA', 'documento' => '11111111000111', 'email' => 'contato@techsolutions.com', 'status' => true]);
        Cliente::create(['nome' => 'Alpha Sistemas LTDA', 'documento' => '22222222000122', 'email' => 'contato@alpha.com', 'status' => true]);
        Cliente::create(['nome' => 'Nexus Tecnologia SA', 'documento' => '33333333000133', 'email' => 'contato@nexus.com', 'status' => true]);
        Cliente::create(['nome' => 'Orion Digital LTDA', 'documento' => '44444444000144', 'email' => 'contato@orion.com', 'status' => false]);
        Cliente::create(['nome' => 'Pulsar Cloud Services', 'documento' => '55555555000155', 'email' => 'contato@pulsar.com', 'status' => true]);
    }
}
