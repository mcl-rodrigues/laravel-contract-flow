<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contrato extends Model
{
    protected $table = 'contratos';

    protected $fillable = [
        'cliente_id',
        'data_inicio',
        'data_fim',
        'status',
    ];

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    public function itens(): HasMany
    {
        return $this->hasMany(ContratoItem::class);
    }

    public function calcularSubtotal()
    {
        return $this->itens->sum(function ($item) {
            return $item->quantidade * $item->valor;
        });
    }

    public function calcularDesconto()
    {
        $quantidadeTotal = $this->itens->sum('quantidade');

        if ($quantidadeTotal >= 5) {
            return $this->calcularSubtotal() * 0.10;
        }

        return 0;
    }

    public function getValorTotalAttribute()
    {
        return $this->calcularSubtotal() - $this->calcularDesconto();
    }
}
