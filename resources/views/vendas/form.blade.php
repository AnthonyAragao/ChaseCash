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
    <div class="card-phases__stage" id="stage-1">
        <div class="card-phases__stage-progress">
            <div></div>
            <span><i class="fa-solid fa-circle"></i></span>
            <div></div>
        </div>

        <span class="card-phases__stage-title">Cliente</span>
    </div>

    <div class="card-phases__stage" id="stage-2">
        <div class="card-phases__stage-progress">
            <div></div>
            <span><i class="fa-regular fa-circle"></i></span>
            <div></div>
        </div>

        <span class="card-phases__stage-title">Itens compra</span>
    </div>

    <div class="card-phases__stage" id="stage-3">
        <div class="card-phases__stage-progress">
            <div></div>
            <span><i class="fa-regular fa-circle"></i></span>
            <div></div>
        </div>

        <span class="card-phases__stage-title">Pagamento</span>
    </div>
</div>

{{-- Formulário etapas --}}
<div class="card-form-phases">
    <form action="{{ route("vendas.store") }}" method="POST">
        @csrf
        {{-- Etapa 01 --}}
        <div id="first-stage">
            <h2 class="card-form-phases__title">Informe o cliente da venda </h2>

            <div class="row">
                <div class="form-group col-6">
                    <label for="cliente">Cliente: <span>*</span></label>
                    <select name="cliente" id="cliente" class="form-control" required>
                        <option value="">Selecione um cliente</option>
                        <option value="1">Cliente 01</option>
                        <option value="2">Cliente 02</option>
                        <option value="3">Cliente 03</option>
                    </select>
                </div>

                <div class="form-group col-6">
                    <label for="data">Data da venda: <span>*</span></label>
                    <input type="date" name="data" id="data" class="form-control" required>
                </div>
            </div>
        </div>

        {{-- Etapa 02 --}}
        <div id="second-stage">
            <h2 class="card-form-phases__title">Itens da venda </h2>

            <table style="background-color: transparent">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Valor unitário</th>
                        <th>Valor total</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Etapa 03 --}}
        <div id="third-stage">
            <h2 class="card-form-phases__title">Informe o pagamento </h2>

            <div></div>
        </div>

        {{-- Btns prosseguir nas etapas --}}
        <div class="group-btns__phases">
            <button type="button" id="prevBtn">Voltar</button>
            <button type="button" id="nextBtn">Prosseguir</button>
        </div>
    </form>
</div>
@endsection


{{-- Scripts --}}
@vite('resources/js/etapas-cadastro-venda.js')
