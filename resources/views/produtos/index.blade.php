@extends('layouts.app')

@section('content')
<h2>Meus produtos</h2>

<div class="breadcrumb">
    <span class="icon"><a href="#"><i class="fa-solid fa-home"></i></a></span>
    <span class="separator"><i class="fa-solid fa-angle-right"></i></span>
    <span class="active">
        <a href="#" class="">Produtos</a>
    </span>
</div>

<div class="search-and-add">
    <input type="search" placeholder="Pesquisar" class="search-and-add__input">

    <a href="" class="search-and-add__link" id="btn_open_modal">
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

<div>
    {{ $produtos->links() }}
</div>


{{-- Modal add produto --}}
<x-modal title="Novo produto">
    <form action="{{ route("produtos.store") }}" method="POST">
        @csrf
        <div class="row">
            <div class="form-group col-6">
                <label for="fornecedor">Fornecedor: <span>*</span></label>
                <select name="fornecedor" id="fornecedor" disabled>
                    <option value="hinode">Hinode</option>
                </select>
            </div>

            <div class="form-group col-6">
                <label for="codigo">Código: <span>*</span></label>
                <input type="text" id="codigo" name="codigo" placeholder="Insira o código do produto">
            </div>
        </div>

        <div class="form-group">
            <label for="nome">Nome: <span>*</span></label>
            <input type="text" id="nome" name="nome" placeholder="Insira o nome do produto">
        </div>

        <div class="row">
            <div class="form-group col-6">
                <label for="pontos">Pontos: <span>*</span></label>
                <input type="text" id="pontos" name="pontos" placeholder="Pontos do produto">
            </div>

            <div class="form-group col-6">
                <label for="estoque">Estoque:</label>
                <input type="text" id="estoque" name="estoque" placeholder="Estoque disponível">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-6">
                <label for="custo">Custo(R$): <span>*</span></label>
                <input type="text" id="custo" name="custo" placeholder="Insira o custo do produto">
            </div>

            <div class="form-group col-6">
                <label for="preco_venda">Preço de venda(R$): <span>*</span></label>
                <input type="text" id="preco_venda" name="preco_venda" placeholder="Insira o preço de venda">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-6">
                <label for="Margem">Margem:</label>
                <input type="text" id="Margem" name="Margem" disabled>
            </div>

            <div class="form-group col-6">
                <label for="markup">Markup:</label>
                <input type="text" id="markup" name="markup" disabled>
            </div>
        </div>

        <div class="modal__footer">
            <button type="button" class="btn_close_modal">Fechar</button>
            <button type="submit" class="modal-footer__salvar">Salvar</button>
        </div>
    </form>
</x-modal>
@endsection


@section('scripts')
    <script>
        const margem = document.getElementById('Margem');
        const markup = document.getElementById('markup');
        const custo = document.getElementById('custo');
        const preco_venda = document.getElementById('preco_venda');

        function calcularMargemEMarkup() {
            const custoValue = parseFloat(custo.value.replace(',', '.'));
            const precoVendaValue = parseFloat(preco_venda.value.replace(',', '.'));

            if (!isNaN(custoValue) && !isNaN(precoVendaValue)) {
                const margemValue = precoVendaValue - custoValue;
                margem.value = margemValue.toFixed(2).replace('.', ',');

                const markupValue = (margemValue / custoValue) * 100;
                markup.value = markupValue.toFixed(2).replace('.', ',') + ' %';
            } else {
                margem.value = '';
                markup.value = '';
            }
        }

        custo.addEventListener('input', calcularMargemEMarkup);
        preco_venda.addEventListener('input', calcularMargemEMarkup);
    </script>
@endsection
