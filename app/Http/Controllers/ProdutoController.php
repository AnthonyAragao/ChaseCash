<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\View\View;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\{RedirectResponse, Request};

class ProdutoController extends Controller
{
    public function __construct(
        private Produto $produtos
    ){}

    public function index(): View
    {
        return view('produtos.index', [
            'produtos' => $this->produtos->paginate(10)
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $this->produtos->create($request->all());
        return redirect()->route('produtos.index');
    }


    public function show(string $id): View
    {
        $produto = $this->produtos->find(Crypt::decrypt($id));
        return view('produtos.form', compact('produto'));
    }


    public function edit(string $id): View
    {
        $produto = $this->produtos->find(Crypt::decrypt($id));
        return view('produtos.form', compact('produto'));
    }


    public function update(Request $request, string $id): RedirectResponse
    {
        $produto = $this->produtos->find(Crypt::decrypt($id));
        $produto->update($request->all());

        return redirect()->route('produtos.index');
    }


    public function destroy(string $id): RedirectResponse
    {
        $this->produtos->destroy(Crypt::decrypt($id));
        return redirect()->route('produtos.index');
    }
}
