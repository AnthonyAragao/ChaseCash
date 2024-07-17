<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Parcela extends Model
{
    protected $table = 'parcelas';

    protected $guarded = [];

    public function getMetodoPagamentoAttribute(): MetodoPagamento
    {
        return $this->metodoPagamentoRelationship;
    }

    // Relantionships
    public function metodoPagamentoRelationship(): BelongsTo
    {
        return $this->belongsTo(MetodoPagamento::class, 'metodo_pagamento_id');
    }
}
