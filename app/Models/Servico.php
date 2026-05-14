<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Servico extends Model
{
    protected $table = 'servicos';

    protected $fillable = [
        'nome',
        'valor_base',
    ];

    public function itensContrato(): HasMany
    {
        return $this->hasMany(ContratoItem::class);
    }
}