<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});


Route::resource('produtos', ProdutoController::class);
