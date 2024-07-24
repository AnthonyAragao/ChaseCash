@extends('layouts.app')

@section('content')
{{-- Caminho da página --}}
<div class="page-path-and-img">
    <div>
        <h2>Meus clientes</h2>
        <div class="page-path">
            <span class="icon"><a href="#"><i class="fa-solid fa-home"></i></a></span>
            <span class="separator"><i class="fa-solid fa-angle-right"></i></span>
            <span><a href="{{ route("clientes.index") }}">Clientes</a></span>
            <span class="separator"><i class="fa-solid fa-angle-right"></i></span>
            <span><a href="{{ route("clientes.show", Crypt::encrypt($cliente->id)) }}">{{ $cliente->nome }}</a></span>
            <span class="separator"><i class="fa-solid fa-angle-right"></i></span>
            <span><a href="#" class="active">Vendas</a></span>
        </div>
    </div>
</div>

<div class="card-form name-and-info">
    <div class="name-and-info__perfil">
        <h3>{{ $cliente->nome }}</h3>
        <div class="name-and-info__perfil--links">
            <a href="{{ route("clientes.edit", Crypt::encrypt($cliente->id)) }}">
                <i class="fa-solid fa-edit"></i>
            </a>
            <a href=""><i class="fa-brands fa-whatsapp"></i></a>
            <a href=""><i class="fa-solid fa-envelope"></i></a>
        </div>
    </div>

    <p class="name-and-info__info">
        <i class="fa-solid fa-location-dot"></i>
        {{ $cliente->endereco->logradouro }} número: {{ $cliente->endereco->numero }}, {{ $cliente->endereco->bairro }}
    </p>

    <p class="name-and-info__info">
        <i class="fa-solid fa-phone"></i> {{ formatPhoneNumber($cliente->telefone) }}
    </p>
</div>


{{-- Compras do cliente --}}
<div class="container-report-sales">
    <h2 class="container-report-sales__title">Relatório de Vendas</h2>

    @if($vendas->isEmpty())
        <p>Nenhuma venda registrada para este cliente.</p>
    @endif

    @foreach ($vendas as $venda)
        <div class="card-form">
            <div class="card-form__title">
                <h4>Venda #1205215 - {{ formatDate($venda->data_venda) }}</h4>
            </div>
            <p class="card-form__info"><strong>Parcelas pagas:</strong> {{ $venda->parcelasPagas }}/{{ $venda->quantidadeParcelas }} </p>
            <p class="card-form__info"><strong>Saldo devedor:</strong> R$ {{ formatNumber($venda->saldo_devedor) }}</p>
            <p class="card-form__info"><strong>Valor total:</strong> R$ {{ formatNumber($venda->valor_total) }}</p>
            <p class="card-form__info"><strong>Status:
                <span class="card-form__info--status @if ($venda->status == 'pendente') card-form__info--status-pendente @endif">
                    {{ $venda->status }}
                </span></strong>
            </p>

            <table class="container-report-sales__table">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Valor unitário</th>
                        <th>Valor total</th>
                    </tr>
                </thead>

                @foreach ($venda->itensVenda as $item)
                    <tbody>
                        <tr>
                            <td>{{ $item->produto->codigo }} - {{ $item->produto->nome }}</td>
                            <td>{{ $item->quantidade }}</td>
                            <td>R$ {{ formatNumber($item->preco_unitario) }}</td>
                            <td>R$ {{ formatNumber($item->preco_unitario * $item->quantidade) }}</td>
                        </tr>
                    </tbody>
                @endforeach

                <tfoot>
                    <tr>
                        <td>(Total pontos: {{ $venda->quantidadePontos }})</td>
                        <td></td>
                        <td></td>
                        <td>Subtotal: R$ {{ formatNumber($venda->valor_total) }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    @endforeach
</div>
@endsection
