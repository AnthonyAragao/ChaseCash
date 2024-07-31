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
                    <select name="cliente" id="cliente" required>
                        <option value="">Selecione um cliente</option>
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-6">
                    <label for="data">Data da venda: <span>*</span></label>
                    <input type="date" name="data" id="data" required>
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
                </tbody>

                <tfoot style="
                    display: flow-root;
                    margin-top: 30px;
                    ">
                    <tr>
                        <td class="form-group">
                            <label for="produto" style="font-size: 11px; color:#7d7d7d">Produto a adicionar:</label>
                            <select name="produto" id="produto">
                                <option value="">Selecione um produto</option>
                                @foreach ($produtos as $produto)
                                    <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
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
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const produtoSelect = document.getElementById('produto');
        const tbody = document.querySelector('tbody');

        const produtos = @json($produtos); 

        produtoSelect.addEventListener('change', function() {
            const produtoId = this.value;
            const produto = produtos.find(p => p.id == produtoId);

            if (produto) {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${produto.nome}</td>
                    <td><input type="number" value="1" min="1" class="quantidade" /></td>
                    <td>${produto.preco_venda}</td>
                    <td class="valor-total">${produto.preco_venda}</td>
                    <td><button type="button" class="remove-btn btn__delete">Remover</button></td>
                `;

                tbody.appendChild(row);

                // Adiciona evento para atualizar o valor total quando a quantidade mudar
                row.querySelector('.quantidade').addEventListener('input', function() {
                    const quantidade = this.value;
                    const valorUnitario = produto.preco_venda;
                    const valorTotal = quantidade * valorUnitario;
                    row.querySelector('.valor-total').innerText = valorTotal.toFixed(2);
                });

                // Adiciona evento para remover a linha
                row.querySelector('.remove-btn').addEventListener('click', function() {
                    tbody.removeChild(row);
                });
            }
        });
    });
</script>
