<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\{Cliente, MetodoPagamento, Produto, Venda};
use Illuminate\Http\RedirectResponse;

class VendaController extends Controller
{
    public function __construct(
        private Venda $vendas,
        private Cliente $clientes,
        private Produto $produtos,
        private MetodoPagamento $metodosPagamento
    ){}

    public function index(): View
    {
        return view('vendas.index', [
            'vendas' => $this->vendas->paginate(10)
        ]);
    }

    public function create(): View
    {
        return view('vendas.form', [
            'clientes' => $this->clientes->all(),
            'produtos' => $this->produtos->all(),
            'metodos_pagamento' => $this->metodosPagamento->all()
        ]);
    }
}
