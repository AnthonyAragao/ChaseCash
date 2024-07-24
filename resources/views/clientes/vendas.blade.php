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


<div style="margin-top: 2rem ">
    <h2>Relatório de Vendas</h2>

    <div style="margin-top:6px" class="card-form">
        <div class="card-form__title">
            <h4>Venda #1205215 - 14/07/2024</h4>
        </div>

        <p style="
            font-size: .8rem;
            font-weight: 600;
            color: #333;">
            <strong>Parcelas pagas:</strong> 1/2
        </p>
        <p style="
            font-size: .8rem;
            font-weight: 600;
            color: #333;">
            <strong>Saldo devedor:</strong> R$ 100,00</p>
        <p style="
            font-size: .8rem;
            font-weight: 600;
            color: #333;">
            <strong>Valor total:</strong> R$ 100,00</p>
        <p style="
            font-size: .8rem;
            font-weight: 600;
            color: #333;">
            <strong>Status: <span style="color: green;">Finalizada</span></strong>
        </p>

        <table style="background-color: transparent">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Valor unitário</th>
                    <th>Valor total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>036060 - Hidratante Desodorante Corporal Inebriante For Her 200g</td>
                    <td>2</td>
                    <td>R$ 50,00</td>
                    <td>R$ 100,00</td>
                </tr>

                <tr>
                    <td>036060 - Hidratante Desodorante Corporal Inebriante For Her 200g</td>
                    <td>2</td>
                    <td>R$ 50,00</td>
                    <td>R$ 100,00</td>
                </tr>
            </tbody>

            <tfoot>
                <tr>
                    <td
                    style="
                        padding: 6px 10px;
                        font-size: 14px;
                        color: #1f2937;
                        font-weight: bold;">(Total pontos: 43,64)</td>
                    <td></td>
                    <td></td>
                    <td style="
                        padding: 6px 10px;
                        font-size: 14px;
                        color: #1f2937;
                        font-weight: bold;">
                        Subtotal: R$ 100,00
                    </td>
                </tr>
            </tfoot>
        </table>



    </div>
</div>
@endsection
