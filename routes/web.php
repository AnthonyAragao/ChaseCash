<?php

use App\Http\Controllers\{ClienteController, ProdutoController, VendaController};
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Route::get('clientes/{id}/vendas', [ClienteController::class, 'vendas'])->name('clientes.vendas');
Route::resource('clientes', ClienteController::class);
Route::resource('produtos', ProdutoController::class);
Route::resource('vendas', VendaController::class);
