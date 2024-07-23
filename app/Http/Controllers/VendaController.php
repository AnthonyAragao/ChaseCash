<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\{Cliente, Venda};
use Illuminate\Support\Facades\Crypt;

class VendaController extends Controller
{
    public function __construct(
        private Venda $vendas,
        private Cliente $clientes
    ){}

    public function index(): View
    {
        return view('vendas.index', [
            'vendas' => $this->vendas->paginate(10)
        ]);
    }
}
