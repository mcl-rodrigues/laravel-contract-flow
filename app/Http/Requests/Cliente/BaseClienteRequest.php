<?php

namespace App\Http\Requests\Cliente;

use Illuminate\Foundation\Http\FormRequest;

abstract class BaseClienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function rulesBase(): array
    {
        return [
            'nome' => ['required', 'string', 'min:3', 'max:50'],
            'documento' => ['required', 'regex:/^(\d{11}|\d{14})$/'],
            'email' => ['required', 'email', 'max:50'],
            'status' => ['required', 'in:0,1'],
        ];
    }

    protected function messagesBase(): array
    {
        return [
            // nome
            'nome.required' => 'O nome é obrigatório.',
            'nome.string' => 'O nome deve ser um texto válido.',
            'nome.min' => 'O nome não pode ter menos de 3 caracteres.',
            'nome.max' => 'O nome não pode ter mais de 50 caracteres.',

            // documento
            'documento.required' => 'O documento é obrigatório.',
            'documento.regex' => 'O documento deve conter 11 dígitos (CPF) ou 14 dígitos (CNPJ).',

            'documento.unique' => 'Este documento já está cadastrado.',

            // email
            'email.required' => 'O e-mail é obrigatório.',
            'email.email' => 'Informe um e-mail válido.',
            'email.max' => 'O e-mail não pode ter mais de 50 caracteres.',
            'email.unique' => 'Este e-mail já está cadastrado.',

            // status
            'status.required' => 'O status é obrigatório.',
            'status.in' => 'Status inválido. Escolha Ativo ou Inativo.',
        ];
    }
}
