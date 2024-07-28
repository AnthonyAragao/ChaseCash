<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('fornecedor');
            $table->string('codigo')->unique();
            $table->decimal('custo', 8, 2);
            $table->decimal('preco_venda', 8, 2);
            $table->decimal('pontos', 8 ,2)->default(0);
            $table->integer('estoque')->nullable();
            $table->string('imagem')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
