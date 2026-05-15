<?php

namespace App\Http\Requests\Contrato;

class UpdateContratoRequest extends BaseContratoRequest
{
    public function rules(): array
    {
        return $this->rulesBase();
    }

    public function messages(): array
    {
        return $this->messagesBase();
    }
}