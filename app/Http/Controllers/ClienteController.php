<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ClienteController extends Controller
{
    public function __construct(
        private Cliente $clientes
    ){}

    public function index()
    {
        return view('clientes.index', [
            'clientes' => $this->clientes->paginate(10)
        ]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        $cliente = $this->clientes->find(Crypt::decrypt($id));
        return view('clientes.form', [
            'cliente' => $cliente
        ]);
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
