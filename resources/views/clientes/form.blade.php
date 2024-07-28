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
            <span><a href="#" class="active">{{ $cliente->nome }}</a></span>
        </div>
    </div>
</div>

{{-- Formulário de cliente --}}
<div class="card-form">
    <div class="card-form__title">
        <h3>Informações do cliente</h3>
    </div>

    <form action="{{ route("clientes.store") }}" method="POST" class="form">
        @csrf
        <div class="row">
            <div class="form-group col-6">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" value="{{ $cliente->nome }}" {{ $form ?? null }} required>
            </div>

            <div class="form-group col-6">
                <label for="telefone">Telefone:</label>
                <input type="text" name="telefone" id="telefone" value="{{ isset($cliente->telefone) ? formatPhoneNumber($cliente->telefone) : '' }}"
                    {{ $form ?? null }}>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-4">
                <label for="cpf">CPF:</label>
                <input type="text" name="cpf" id="cpf" value="{{ isset($cliente->cpf) ? formatCpf($cliente->cpf) : '' }}" {{ $form ?? null }}>
            </div>

            <div class="form-group col-4">
                <label for="data_nascimento">Data de nascimento:</label>
                <input type="date" name="data_nascimento" id="nome" value="{{ isset($cliente->data_nascimento) ? $cliente->data_nascimento : '' }}" {{ $form ?? null }}>
            </div>

            <div class="form-group col-4">
                <label for="email">E-mail:</label>
                <input type="email" name="email" id="email" value="{{ isset($cliente->email) ? $cliente->email : '' }}" {{ $form ?? null }}>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-3">
                <label for="cep">CEP:</label>
                <input type="text" name="cep" id="cep" value="{{ isset($cliente->endereco) ? $cliente->endereco->cep : ''}}"  {{ $form ?? null }}>
            </div>

            <div class="form-group col-3">
                <label for="cidade">Cidade:</label>
                <input type="text" name="cidade" id="cidade" value="{{  isset($cliente->endereco) ? $cliente->endereco->cidade : '' }}" {{ $form ?? null }}>
            </div>

            <div class="form-group col-3">
                <label for="logradouro">Logradouro:</label>
                <input type="text" name="logradouro" id="logradouro" value="{{  isset($cliente->endereco) ? $cliente->endereco->logradouro : '' }}" {{ $form ?? null }}>
            </div>

            <div class="form-group col-3">
                <label for="numero">Número:</label>
                <input type="text" name="numero" id="numero" value="{{  isset($cliente->endereco) ? $cliente->endereco->numero : '' }}" {{ $form ?? null }}>
            </div>
        </div>

        <div class="group-btns">
            <a href="{{ route("clientes.vendas", Crypt::encrypt($cliente->id)) }}" class="btn__view__sales">
                <i class="fa-solid fa-list"></i> Ver vendas
            </a>

            <a href="" class="btn__edit">
                <i class="fa-solid fa-pen"></i> Editar
            </a>

            <a href="" class="btn__delete">
                <i class="fa-solid fa-trash"></i> Excluir
            </a>
        </div>
    </form>
</div>

<div class="row">
    {{-- Relacionado a compra --}}
    <div class="col-6 card__bolhas">
        <h3 class="card-form__title">Sobre o cliente</h3>

        <div class="container-bolhas">
            <div class="bolhas bolha1"></div>
            <div class="bolhas bolha2"></div>
            <div class="bolhas bolha3"></div>
            <div class="bolhas bolha4"></div>
            <div class="bolhas bolha5"></div>
        </div>

        <div class="about-client">
            <h4>Top 3 produtos mais comprados:</h4>
            <ul>
                <li>Produto 1</li>
                <li>Produto 2</li>
                <li>Produto 3</li>
            </ul>

            <h4>Data da última compra:</h4>
            <p>10/10/2021</p>
        </div>
    </div>

    {{-- Chat Whatsapp --}}
    <div class="card-form col-6">
        <button id="chatButton" class="chat-whats"><i class="fa-brands fa-whatsapp"></i> Iniciar chat</button>

        <div id="containerChat">
            <div class="form-group">
                <label for="mensagem">Mensagem:</label>
                <textarea name="mensagem" id="mensagem" cols="30" rows="5" class="form-group__chat"></textarea>
            </div>

            <button id="sendMessage" class="chat-whats"><i class="fa-solid fa-paper-plane"></i> Enviar mensagem</button>
        </div>
    </div>
</div>
@endsection


@section('scripts')
    <script>
        const chatButton = document.getElementById('chatButton');
        const containerChat = document.getElementById('containerChat');
        const sendMessage = document.getElementById('sendMessage');

        chatButton.addEventListener('click', () => {
            containerChat.classList.toggle('chat-whats--open');

            if (containerChat.classList.contains('chat-whats--open')) {
                chatButton.innerHTML = '<i class="fa-brands fa-whatsapp"></i> Fechar chat';
            } else {
                chatButton.innerHTML = '<i class="fa-brands fa-whatsapp"></i> Iniciar chat';
            }
        });

        sendMessage.addEventListener('click', () => {
            const mensagem = document.getElementById('mensagem').value;
            const telefone = document.getElementById('telefone').value.replace(/\D/g, '');

            const url = `https://api.whatsapp.com/send?phone=55${telefone}&text=${mensagem}`;
            window.open(url, '_blank');
        });
    </script>
@endsection
