<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- TITLE --}}
    <title>ChaseCash</title>

    {{-- FONTAWESOME --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- CSS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <nav id="sidebar">
        <div id="sidebar_content">
            <div id="user">
                <img src="{{ asset("images/avatar.jpg") }}" id="user_avatar" alt="Avatar">

                <p id="user_infos">
                    <span class="item-description">Irineu</span>
                    <span class="item-description">Lorem ipsum</span>
                </p>
            </div>

            <ul id="side-items">
                <li class="side-item" data-id="">
                    <a href="">
                        <i class="fa-solid fa-chart-line"></i>
                        <span class="item-description">Dashboard</span>
                    </a>
                </li>

                <li class="side-item" data-id="vendas">
                    <a href="">
                        <i class="fa-solid fa-shopping-cart"></i>
                        <span class="item-description">
                            Vendas
                        </span>
                    </a>

                <li class="side-item" data-id="clientes">
                    <a href="{{ route("clientes.index") }}">
                        <i class="fa-solid fa-user"></i>
                        <span class="item-description">
                            Clientes
                        </span>
                    </a>
                </li>

                <li class="side-item" data-id="produtos">
                    <a href="{{ route("produtos.index") }}">
                        <i class="fa-solid fa-box"></i>
                        <span class="item-description">
                            Produtos
                        </span>
                    </a>
                </li>

                <li class="side-item" data-id="descricao">
                    <a href="">
                        <i class="fa-solid fa-gear"></i>
                        <span class="item-description">
                            Configurações
                        </span>
                    </a>
                </li>
            </ul>
        </div>

        <div id="logout">
            <button id="logout_btn">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span class="item-description">
                    Logout
                </span>
            </button>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    @yield('scripts')
</body>
</html>
