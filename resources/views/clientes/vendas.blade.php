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

<div class="card-form w-content">
    <div style="
        display: flex;
        justify-content: space-between;
        gap: 60px;
        ">
        <h3>{{ $cliente->nome }}</h3>
        <div style="
            display: flex;
            text-decoration: none;
            align-items: center;
            gap: 5px;">
            <a href="{{ route("clientes.edit", Crypt::encrypt($cliente->id)) }}" style=" color: #333">
                <i class="fa-solid fa-edit"></i>
            </a>

            <a href="" style=" color: #333">
                <i class="fa-brands fa-whatsapp"></i>
            </a>

            <a href="" style=" color: #333">
                <i class="fa-solid fa-envelope"></i>
            </a>
        </div>
    </div>

    <p style="
        margin-top:10px;
        font-size: .8rem;
        font-weight: 600;
        color: #333;">
        <i class="fa-solid fa-location-dot"></i>
        {{ $cliente->endereco->logradouro }} número: {{ $cliente->endereco->numero }}, {{ $cliente->endereco->bairro }}
    </p>

    <p style="
        font-size: .8rem;
        font-weight: 600;
        color: #333;">
        <i class="fa-solid fa-phone"></i> {{ formatPhoneNumber($cliente->telefone) }}
    </p>
</div>
@endsection
