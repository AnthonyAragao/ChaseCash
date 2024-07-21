@extends('layouts.app')

@section('content')
{{-- Caminho da página --}}
<div class="page-path-and-img">
    <img src="{{asset("images/produtos.png")}}" alt="">

    <div>
        <h2>Meus produtos</h2>
        <div class="page-path">
            <span class="icon"><a href="#"><i class="fa-solid fa-home"></i></a></span>
            <span class="separator"><i class="fa-solid fa-angle-right"></i></span>
            <span><a href="#" class="active">Produtos</a></span>
        </div>
    </div>
</div>

<a href="" class="add__link" id="btn_open_modal">
    <i class="fa-solid fa-plus"></i> Novo produto
</a>

{{-- Tabela de produtos --}}
<div class="title-and-table">
    <div class="title-and-table__container">
        <h3>Produtos</h3>
        <input type="search" placeholder="Pesquisar">
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
            @if(empty($produtos))
                <tr><td>Nenhum produto encontrado</td></tr>
            @else
                @foreach ($produtos as $produto)
                    <tr>
                        <td>{{ $produto->fornecedor }}</td>
                        <td>{{ $produto->codigo }}</td>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ number_format($produto->preco_venda, 2, ',', '.') }}</td>
                        <td>{{ $produto->pontos }}</td>
                        <td class="table-btns">
                            <a href="" class="table-btns__edit">
                                <i class="fa-solid fa-pen"></i> Editar
                            </a>

                            <a href="" class="table-btns__delete">
                                <i class="fa-solid fa-trash"></i> Excluir
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    
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
                <input type="text" id="codigo" name="codigo" placeholder="Insira o código do produto" required>
            </div>
        </div>

        <div class="form-group">
            <label for="nome">Nome: <span>*</span></label>
            <input type="text" id="nome" name="nome" placeholder="Insira o nome do produto" required>
        </div>

        <div class="row">
            <div class="form-group col-6">
                <label for="pontos">Pontos: <span>*</span></label>
                <input type="text" id="pontos" name="pontos" placeholder="Pontos do produto" required>
            </div>

            <div class="form-group col-6">
                <label for="estoque">Estoque:</label>
                <input type="text" id="estoque" name="estoque" placeholder="Estoque disponível">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-6">
                <label for="custo">Custo(R$): <span>*</span></label>
                <input type="text" id="custo" name="custo" placeholder="Insira o custo do produto" required>
            </div>

            <div class="form-group col-6">
                <label for="preco_venda">Preço de venda(R$): <span>*</span></label>
                <input type="text" id="preco_venda" name="preco_venda" placeholder="Insira o preço de venda" required>
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
