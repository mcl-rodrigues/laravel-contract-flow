<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'nome',
        'documento',
        'email',
        'status',
    ];

    public function contratos(): HasMany
    {
        return $this->hasMany(Contrato::class);
    }
}
