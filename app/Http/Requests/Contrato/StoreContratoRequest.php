<?php

namespace App\Http\Requests\Contrato;

class StoreContratoRequest extends BaseContratoRequest
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
