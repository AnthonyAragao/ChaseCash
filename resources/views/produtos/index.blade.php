@extends('layouts.app')

@section('content')
    <h2>Produtos</h2>
    <div class="search-and-add">
        <input type="search" placeholder="Pesquisar" class="search-and-add__input">

        <a href="" class="search-and-add__link">
            <i class="fa-solid fa-plus"></i> Novo produto
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Fornecedor</th>
                <th>Código</th>
                <th>Produto</th>
                <th>Preço</th>
                <th>Pontos</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($produtos as $produto)
                <tr>
                    <td>{{ $produto->fornecedor }}</td>
                    <td>{{ $produto->codigo }}</td>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ number_format($produto->preco_venda, 2, ',', '.') }}</td>
                    <td>{{ $produto->pontos }}</td>
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
