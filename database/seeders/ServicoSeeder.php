<?php

namespace Database\Seeders;

use App\Models\Servico;
use Illuminate\Database\Seeder;

class ServicoSeeder extends Seeder
{
    public function run(): void
    {
        $servicos = [
            ['nome' => 'Suporte Técnico', 'valor_base' => 100],
            ['nome' => 'Consultoria Estratégica', 'valor_base' => 250],
            ['nome' => 'Manutenção de Sistemas', 'valor_base' => 180],
            ['nome' => 'Desenvolvimento Sob Demanda', 'valor_base' => 400],
            ['nome' => 'Infraestrutura Cloud', 'valor_base' => 300],
            ['nome' => 'Monitoramento 24/7', 'valor_base' => 220],
            ['nome' => 'Auditoria de Sistemas', 'valor_base' => 350],
            ['nome' => 'Integração de APIs', 'valor_base' => 280],
            ['nome' => 'Backup Gerenciado', 'valor_base' => 150],
            ['nome' => 'Consultoria de Arquitetura', 'valor_base' => 500],
        ];

        foreach ($servicos as $s) {
            Servico::create($s);
        }
    }
}
