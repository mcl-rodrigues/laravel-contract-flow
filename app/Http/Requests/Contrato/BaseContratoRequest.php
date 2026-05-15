<?php

namespace App\Http\Requests\Contrato;

use Illuminate\Foundation\Http\FormRequest;

abstract class BaseContratoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function rulesBase(): array
    {
        return [
            'cliente' => ['required', 'exists:clientes,id'],
            'data_inicio' => ['required', 'date'],
            'data_fim' => ['nullable', 'date', 'after_or_equal:data_inicio'],
            'status' => ['required', 'in:0,1'],
            'itens' => ['required', 'array', 'min:1'],
            'itens.*.servico_id' => ['required', 'exists:servicos,id'],
            'itens.*.quantidade' => ['required', 'integer', 'min:1'],
            'itens.*.valor' => ['required', 'numeric', 'min:0'],
        ];
    }

    protected function messagesBase(): array
    {
        return [
            // cliente
            'cliente.required' => 'O cliente é obrigatório.',
            'cliente.exists' => 'O cliente selecionado é inválido.',

            // data_inicio
            'data_inicio.required' => 'A data de início é obrigatória.',
            'data_inicio.date' => 'Informe uma data de início válida.',

            // data_fim
            'data_fim.date' => 'Informe uma data de fim válida.',
            'data_fim.after_or_equal' => 'A data de fim não pode ser menor que a data de início.',

            // status
            'status.required' => 'O status é obrigatório.',
            'status.in' => 'Status inválido. Escolha Ativo ou Inativo.',

            // itens
            'itens.required' => 'Adicione pelo menos um serviço ao contrato.',

            'itens.array' => 'Os serviços enviados são inválidos.',

            'itens.min' => 'Adicione pelo menos um serviço ao contrato.',

            // itens.serviço
            'itens.*.servico_id.required' => 'Selecione um serviço.',

            'itens.*.servico_id.exists' => 'O serviço selecionado é inválido.',

            // quantidade
            'itens.*.quantidade.required' => 'Informe a quantidade.',

            'itens.*.quantidade.integer' => 'A quantidade deve ser um número inteiro.',

            'itens.*.quantidade.min' => 'A quantidade deve ser no mínimo 1.',

            // valor
            'itens.*.valor.required' => 'Informe o valor unitário.',

            'itens.*.valor.numeric' => 'O valor unitário deve ser numérico.',

            'itens.*.valor.min' => 'O valor unitário não pode ser negativo.',
        ];
    }
}