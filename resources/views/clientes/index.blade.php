@extends('layouts.app')

@section('content')
    <h2>Clientes</h2>
    <div class="search-and-add">
        <input type="search" placeholder="Pesquisar" class="search-and-add__input">

        <a href="" class="search-and-add__link">
            <i class="fa-solid fa-plus"></i> Adicionar cliente
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->telefone }}</td>
                    <td>{{ number_format($cliente->preco_venda, 2, ',', '.') }}</td>
                    <td>
                        <a href="">
                            <i class="fa-solid fa-ellipsis fa-xl"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
