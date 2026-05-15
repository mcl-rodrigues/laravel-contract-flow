<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContratoItem extends Model
{
    protected $table = 'contrato_itens';

    protected $fillable = [
        'contrato_id',
        'servico_id',
        'quantidade',
        'valor_unitario',
    ];

    public function contrato(): BelongsTo
    {
        return $this->belongsTo(Contrato::class);
    }

    public function servico(): BelongsTo
    {
        return $this->belongsTo(Servico::class);
    }
}
