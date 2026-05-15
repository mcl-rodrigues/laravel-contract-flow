<?php

namespace App\Http\Requests\Cliente;

class UpdateClienteRequest extends BaseClienteRequest
{
    public function rules(): array
    {
        $cliente = $this->route('cliente');

        return array_merge(
            $this->rulesBase(),
            [
                'documento' => ['required', 'regex:/^(\d{11}|\d{14})$/', 'unique:clientes,documento,' . $cliente->id],
                'email' => ['required', 'email', 'max:50', 'unique:clientes,email,' . $cliente->id],
            ]
        );
    }

    public function messages(): array
    {
        return $this->messagesBase();
    }
}
