{{-- inherits the base content view from view 'base' --}}
@extends('base')

{{-- customize the view using the 'section' directive --}}
@section('content')

<h2>Produtos Cadastrados</h2>
<hr>

@if (count($products) > 0)
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Valor</th>
            <th>Visualizar</th>
            <th>Editar</th>
        </tr>
    @foreach ($products as $product)
        <tr>
            <td>{{$product->name}}</td>
            <td>{{$product->value}}</td>
            <td>
                <button>
                    <a href="{{ route('product.show', $product->id) }}">Visualizar</a> 
                </button>
            </td>
            <td>
                <button>
                    <a href="{{ route('product.edit', $product->id) }}">Editar</a> 
                </button>
            </td>
        </tr>
    @endforeach
    </table>
@else
    <h3>Não há produtos cadastrados!</h3>    
@endif

@endsection