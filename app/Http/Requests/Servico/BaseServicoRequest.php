<?php

namespace App\Http\Requests\Servico;

use Illuminate\Foundation\Http\FormRequest;

abstract class BaseServicoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function rulesBase(): array
    {
        return [
            'nome' => ['required', 'string', 'min:3', 'max:50'],
            'valor_base' => ['required', 'numeric'],
        ];
    }

    protected function messagesBase(): array
    {
        return [
            // nome
            'nome.required' => 'O nome do serviço é obrigatório.',
            'nome.string' => 'O nome do serviço deve ser um texto válido.',
            'nome.min' => 'O nome do serviço não pode ter menos de 3 caracteres.',
            'nome.max' => 'O nome do serviço não pode ter mais de 50 caracteres.',

            // valor base
            'valor_base.required' => 'O valor base é obrigatório.',

            'valor_base.numeric' => 'O valor base deve ser numérico.',
        ];
    }
}
