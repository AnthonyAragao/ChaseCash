<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetodosPagamentoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('metodos_pagamento')->insert([
            ['nome' => 'Dinheiro'],
            ['nome' => 'Cartão de Crédito'],
            ['nome' => 'Cartão de Débito'],
            ['nome' => 'Pix'],
            ['nome' => 'Boleto'],
        ]);
    }
}
