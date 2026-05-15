<?php

namespace App\Http\Requests\Cliente;

class StoreClienteRequest extends BaseClienteRequest
{
    public function rules(): array
    {
        return array_merge(
            $this->rulesBase(),
            [
                'documento' => ['required', 'regex:/^(\d{11}|\d{14})$/', 'unique:clientes,documento'],
                'email' => ['required', 'email', 'max:50', 'unique:clientes,email'],
            ]
        );
    }

    public function messages(): array
    {
        return $this->messagesBase();
    }
}
