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
            $table->decimal('saldo_devedor', 8, 2);
            $table->decimal('valor_total', 8, 2);
            $table->enum('status', ['pendente', 'finalizado']);
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
