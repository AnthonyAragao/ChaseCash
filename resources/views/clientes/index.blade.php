@extends('layouts.app')

@section('content')

{{-- Caminho da página --}}
<div class="page-path-and-img">
    <div>
        <h2>Meus clientes</h2>
        <div class="page-path">
            <span class="icon"><a href="#"><i class="fa-solid fa-home"></i></a></span>
            <span class="separator"><i class="fa-solid fa-angle-right"></i></span>
            <span class="active">
                <a href="#">Clientes</a>
            </span>
        </div>
    </div>
</div>

<a href="" class="add__link">
    <i class="fa-solid fa-plus"></i> Novo cliente
</a>

{{-- Tabela de clientes --}}
<div class="title-and-table">
    <div class="title-and-table__container">
        <h3>Clientes</h3>
        <input type="search" placeholder="Pesquisar">
    </div>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->telefone }}</td>
                    <td>{{ $cliente->email ?? 'Não informado' }}</td>
                    <td class="table-btns">
                        <a href="" class="table-btns__view">
                            <i class="fa-solid fa-eye"></i> Visualizar
                        </a>

                        <a href="" class="table-btns__edit">
                            <i class="fa-solid fa-pen"></i> Editar
                        </a>

                        <a href="" class="table-btns__delete">
                            <i class="fa-solid fa-trash"></i> Excluir
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $clientes->links() }}
</div>
@endsection
