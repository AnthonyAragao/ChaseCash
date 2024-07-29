@extends('layouts.app')

@section('content')
{{-- Caminho da página --}}
<div class="page-path-and-img">
    <div>
        <h2>Minhas vendas</h2>
        <div class="page-path">
            <span class="icon"><a href="#"><i class="fa-solid fa-home"></i></a></span>
            <span class="separator"><i class="fa-solid fa-angle-right"></i></span>
            <span><a href="{{ route("vendas.index") }}">Vendas</a></span>
            <span class="separator"><i class="fa-solid fa-angle-right"></i></span>
            <span><a href="#" class="active">Nova venda</a></span>
        </div>
    </div>
</div>

{{-- Card etapas --}}
<div class="card-phases">
    <div class="card-phases__stage">
        <div class="card-phases__stage-progress progess-active">
            <div></div>
            <span><i class="fa-solid fa-circle-check"></i></span>
            <div></div>
        </div>

        <span class="card-phases__stage-title title-active">Cliente</span>
    </div>

    <div class="card-phases__stage">
        <div class="card-phases__stage-progress progess-active">
            <div></div>
            <span><i class="fa-solid fa-circle-check"></i></span>
            <div></div>
        </div>

        <span class="card-phases__stage-title title-active">Itens compra</span>
    </div>

    <div class="card-phases__stage">
        <div class="card-phases__stage-progress">
            <div></div>
            <span><i class="fa-regular fa-circle"></i></span>
            <div></div>
        </div>

        <span class="card-phases__stage-title">Pagamento</span>
    </div>
</div>
@endsection
