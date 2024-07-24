<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class Venda extends Model
{
    protected $table = 'vendas';

    protected $guarded = [];

    // Acessors
    public function getQuantidadePontosAttribute()
    {
        $quantidadePontos = 0;
        foreach($this->itensVenda as $item){
            $quantidadePontos += $item->produto->pontos;
        }

        return $quantidadePontos;
    }

    public function getQuantidadeParcelasAttribute()
    {
        return $this->parcelas->count();
    }

    public function getParcelasPagasAttribute()
    {
        return $this->parcelas->where('pago', '1')->count();
    }

    // Getters
    public function getClienteAttribute(): Cliente
    {
        return $this->clienteRelationship;
    }

    public function getItensVendaAttribute()
    {
        return $this->itensVendaRelationship;
    }

    public function getParcelasAttribute()
    {
        return $this->parcelasRelationship;
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
