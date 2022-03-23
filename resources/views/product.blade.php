<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Views</title>
</head>
<body>
    <h1>Lista de Produtos</h1>
    @isset($products)
        <ol>
        @foreach ($products as $p)
            <li>{{ $p }}</li>    
        @endforeach
        </ol>
    @endisset
</body>
</html>