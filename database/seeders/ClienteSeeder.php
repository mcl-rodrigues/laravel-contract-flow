<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    public function run(): void
    {
        Cliente::create(['nome' => 'Lucas Almeida Hitaki', 'documento' => '11111111111', 'email' => 'lucas@email.com', 'status' => true]);
        Cliente::create(['nome' => 'Pulsar Cloud Services', 'documento' => '55555555000155', 'email' => 'contato@pulsar.com', 'status' => true]);
        Cliente::create(['nome' => 'Infinity Data LTDA', 'documento' => '88888888000188', 'email' => 'contato@infinitydata.com', 'status' => false]);
        Cliente::create(['nome' => 'Rafael Costa Podolski', 'documento' => '33333333333', 'email' => 'rafael@email.com', 'status' => false]);
        Cliente::create(['nome' => 'Tech Solutions LTDA', 'documento' => '11111111000111', 'email' => 'contato@techsolutions.com', 'status' => true]);
        Cliente::create(['nome' => 'Bruno Lima', 'documento' => '55555555555', 'email' => 'bruno@email.com', 'status' => true]);
        Cliente::create(['nome' => 'Fernanda Martins', 'documento' => '66666666666', 'email' => 'fernanda@email.com', 'status' => true]);
        Cliente::create(['nome' => 'Diego Carvalho', 'documento' => '77777777777', 'email' => 'diego@email.com', 'status' => true]);
        Cliente::create(['nome' => 'Patricia Mendes', 'documento' => '88888888888', 'email' => 'patricia@email.com', 'status' => false]);
        Cliente::create(['nome' => 'Eduardo Nogueira', 'documento' => '99999999999', 'email' => 'eduardo@email.com', 'status' => true]);
        Cliente::create(['nome' => 'Alpha Sistemas LTDA', 'documento' => '22222222000122', 'email' => 'contato@alpha.com', 'status' => true]);
        Cliente::create(['nome' => 'Nexus Tecnologia SA', 'documento' => '33333333000133', 'email' => 'contato@nexus.com', 'status' => true]);
        Cliente::create(['nome' => 'Orion Digital LTDA', 'documento' => '44444444000144', 'email' => 'contato@orion.com', 'status' => false]);
        Cliente::create(['nome' => 'Camila Rocha Veiga', 'documento' => '44444444444', 'email' => 'camila@email.com', 'status' => true]);
        Cliente::create(['nome' => 'Mariana Souza', 'documento' => '22222222222', 'email' => 'mariana@email.com', 'status' => true]);
        Cliente::create(['nome' => 'Vertex Software LTDA', 'documento' => '66666666000166', 'email' => 'contato@vertex.com', 'status' => true]);
        Cliente::create(['nome' => 'Solaris Tech SA', 'documento' => '77777777000177', 'email' => 'contato@solaris.com', 'status' => true]);
        Cliente::create(['nome' => 'Quantum Networks', 'documento' => '99999999000199', 'email' => 'contato@quantum.com', 'status' => true]);
    }
}
