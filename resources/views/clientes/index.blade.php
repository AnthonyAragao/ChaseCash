@extends('layouts.app')

@section('content')
{{-- Caminho da página --}}
<div class="page-path-and-img">
    <div>
        <h2>Meus clientes</h2>
        <div class="page-path">
            <span class="icon"><a href="#"><i class="fa-solid fa-home"></i></a></span>
            <span class="separator"><i class="fa-solid fa-angle-right"></i></span>
            <span><a href="#" class="active">Clientes</a></span>
        </div>
    </div>
</div>

<a href="" class="add-link">
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
            @if(empty($clientes))
                <tr><td>Nenhum cliente encontrado</td></tr>
            @else
                @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->nome }}</td>
                        <td>{{ formatPhoneNumber($cliente->telefone) }}</td>
                        <td>{{ $cliente->email ?? 'Não informado' }}</td>
                        <td class="table-btns">
                            <a href="{{ route("clientes.show", Crypt::encrypt($cliente->id)) }}" class="table-btns__view__client">
                                <i class="fa-solid fa-eye"></i> Visualizar
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    {{ $clientes->links() }}
</div>
@endsection
