<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('itens_venda', function (Blueprint $table) {
            $table->id();
            $table->integer('quantidade');
            $table->decimal('preco_unitario', 8, 2);
            $table->foreignId('produto_id')->constrained('produtos');
            $table->foreignId('venda_id')->constrained('vendas');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('itens_venda');
    }
};
