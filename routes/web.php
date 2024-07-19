<?php

use App\Http\Controllers\{ClienteController, ProdutoController};
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});


Route::resource('produtos', ProdutoController::class);
Route::resource('clientes', ClienteController::class);
