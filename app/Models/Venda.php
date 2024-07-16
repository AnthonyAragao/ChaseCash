<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class Venda extends Model
{
    protected $table = 'vendas';

    protected $guarded = [];

    // Getters
    public function getClienteAttribute(): Cliente
    {
        return $this->clienteRelationship;
    }

    public function getItensVendaAttribute(): array
    {
        return $this->itensVendaRelationship->toArray();
    }

    public function getParcelasAttribute(): array
    {
        return $this->parcelasRelationship->toArray();
    }

    // Setters
    public function setClienteAttribute($value): void
    {
        if (isset($value)) {
            $this->attributes['cliente_id'] = Cliente::whereId($value)->first()->id;
        }
    }

    public function setItensVendaAttribute($value): void
    {
        if (isset($value)) {
            $this->attributes['venda_id'] = Venda::whereId($value)->first()->id;
        }
    }

    public function setParcelasAttribute($value): void
    {
        if (isset($value)) {
            $this->attributes['venda_id'] = Venda::whereId($value)->first()->id;
        }
    }

    // Relantions
    public function clienteRelationship(): BelongsTo
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function itensVendaRelationship(): HasMany
    {
        return $this->hasMany(ItemVenda::class, 'venda_id');
    }

    public function parcelasRelationship(): HasMany
    {
        return $this->hasMany(Parcela::class, 'venda_id');
    }
}
