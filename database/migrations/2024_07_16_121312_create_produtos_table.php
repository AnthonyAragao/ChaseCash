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
            $table->float('custo');
            $table->float('preco_venda');
            $table->string('codigo')->unique()->nullable();
            $table->string('fornecedor');
            $table->bigInteger('pontos')->default(0);
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
