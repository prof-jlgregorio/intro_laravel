@extends('base')

@section('content')
    
<h2>Atualizar Dados do Produto</h2>

<form action="{{ route('product.update', $product->id) }}" method="post">
    @csrf
    @method('put')
    <label for="name">Nome do Produto:</label>
    <input type="text" name="name" id="name" value="{{ $product->name }}">
    <br>
    <label for="value">Valor</label>
    <input type="number" name="value" id="value" step="0.01"
          value="{{ $product->value }}">
    <br>
    <input type="reset" value="Limpar Dados">
    <input type="submit" value="Atualizar">
</form>

@endsection