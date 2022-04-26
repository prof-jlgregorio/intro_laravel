<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Introdução ao Laravel</title>
</head>

<body>
    <div class="container">
        <header>
            <h1>Introdução ao Laravel</h1>
        </header>
        <nav>
            {{-- <h2>Cadastro de Clientes</h2> --}}
            <ul>
                <li>Clientes
                    <ul>
                        <li><a href="{{ route('client.index') }}">Início</a></li>
                        <li><a href="{{ route('client.create') }}">Novo Cliente</a></li>
                    </ul>
                </li>
                {{-- ---------------------------------------------------- --}}
                <li>Produtos
                    <ul>
                        <li><a href="{{ route('product.index') }}">Início</a></li>
                        <li><a href="{{ route('product.create') }}">Novo Produto</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <section>
            @yield('content')
        </section>
        <footer>
            <small>Tecnologia em Sistemas para Internet</small>
        </footer>
    </div>

</body>

</html>
