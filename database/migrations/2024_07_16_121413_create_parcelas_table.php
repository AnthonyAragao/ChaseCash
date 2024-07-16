<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('parcelas', function (Blueprint $table) {
            $table->id();
            $table->float('valor');
            $table->boolean('pago')->default(false);
            $table->date('data_vencimento');
            $table->foreignId('metodo_pagamento_id')->constrained('metodos_pagamento');
            $table->foreignId('venda_id')->constrained('vendas');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('parcelas');
    }
};
