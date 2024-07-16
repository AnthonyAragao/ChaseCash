<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produto extends Model
{
    protected $table = 'produtos';

    protected $guarded = [];

    public function getItensVendaAttribute(): HasMany
    {
        return $this->itensVendaRelationship;
    }

    public function setItensVendaAttribute($value): void
    {
        if (isset($value)) {
            $this->attributes['produto_id'] = Produto::whereId($value)->first()->id;
        }
    }

    // Relantionships
    public function itensVendaRelationship(): HasMany
    {
        return $this->hasMany(ItemVenda::class, 'produto_id');
    }
}
