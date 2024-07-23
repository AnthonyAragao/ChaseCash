<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\View\View;

class ClienteController extends Controller
{
    public function __construct(
        private Cliente $clientes
    ){}

    public function index(): View
    {
        return view('clientes.index', [
            'clientes' => $this->clientes->paginate(10)
        ]);
    }

    public function show(string $id): View
    {
        $cliente = $this->clientes->find(Crypt::decrypt($id));
        return view('clientes.form', [
            'cliente' => $cliente,
            'form' => 'disabled'
        ]);
    }


    public function edit(string $id)
    {
        $cliente = $this->clientes->find(Crypt::decrypt($id));
        return view('clientes.form', [
            'cliente' => $cliente,
        ]);
    }

    public function vendas(string $id): View
    {
        $cliente =  $this->clientes->findOrFail(Crypt::decrypt($id));
        $vendas = $cliente->vendas;

        return view('clientes.vendas', compact('cliente', 'vendas'));
    }
}
