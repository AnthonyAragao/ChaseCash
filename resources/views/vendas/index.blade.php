@extends('layouts.app')

@section('content')
{{-- Caminho da página --}}
<div class="page-path-and-img">
    <div>
        <h2>Minhas vendas</h2>
        <div class="page-path">
            <span class="icon"><a href="#"><i class="fa-solid fa-home"></i></a></span>
            <span class="separator"><i class="fa-solid fa-angle-right"></i></span>
            <span><a href="#" class="active">Vendas</a></span>
        </div>
    </div>
</div>


<a href="{{ route("vendas.create") }}" class="add-link">
    <i class="fa-solid fa-plus"></i> Novo venda
</a>
@endsection
