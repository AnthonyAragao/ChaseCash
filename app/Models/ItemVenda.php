<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemVenda extends Model
{
    protected $table = 'itens_venda';

    protected $guarded = [];

    // Getters
    public function getProdutoAttribute(): Produto
    {
        return $this->produtoRelationship;
    }

    public function getVendaAttribute(): Venda
    {
        return $this->vendaRelationship;
    }

    // Setters
    public function setProdutoAttribute($value): void
    {
        if (isset($value)) {
            $this->attributes['produto_id'] = Produto::whereId($value)->first()->id;
        }
    }

    public function setVendaAttribute($value): void
    {
        if (isset($value)) {
            $this->attributes['venda_id'] = Venda::whereId($value)->first()->id;
        }
    }

    // Relantionships
    public function produtoRelationship(): BelongsTo
    {
        return $this->belongsTo(Produto::class, 'produto_id');
    }

    public function vendaRelationship(): BelongsTo
    {
        return $this->belongsTo(Venda::class, 'venda_id');
    }
}
