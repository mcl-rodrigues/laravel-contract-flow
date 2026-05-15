<?php

namespace App\Http\Requests\Servico;

class UpdateServicoRequest extends BaseServicoRequest
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
