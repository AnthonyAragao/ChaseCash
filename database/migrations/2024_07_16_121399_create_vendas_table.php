<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->float('valor_total');
            $table->date('data_venda');
            $table->foreignId('cliente_id')->constrained('clientes');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('vendas');
    }
};
