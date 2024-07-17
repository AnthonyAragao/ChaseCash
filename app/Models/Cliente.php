<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{HasMany, BelongsTo};

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $guarded = [];

    // Getters
    public function getVendasAttribute()
    {
        return $this->vendasRelationship;
    }

    public function getEnderecoAttribute(): Endereco
    {
        return $this->enderecoRelationship;
    }

    // Relantionships
    public function vendasRelationship(): HasMany
    {
        return $this->hasMany(Venda::class, 'cliente_id');
    }

    public function enderecoRelationship(): BelongsTo
    {
        return $this->belongsTo(Endereco::class, 'endereco_id');
    }
}
