@extends('base')

@section('content')
    
<h2>Cadastro de Produtos</h2>

<form action="{{ route('product.store') }}" method="post">
    @csrf
    <label for="name">Nome do Produto:</label>
    <input type="text" name="name" id="name">
    <br>
    <label for="value">Valor</label>
    <input type="number" name="value" id="value" step="0.01">
    <br>
    <input type="reset" value="Limpar Dados">
    <input type="submit" value="Cadastrar">
</form>

@endsection