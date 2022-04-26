@extends('base')

@section('content')

    <div style="width: 500px; border: solid black thin; margin: 0 auto;">

        <h2>Informações do Produto</h2>

        <p><strong>Nome:</strong>{{ $product->name }} </p>

        <p><strong>Valor:</strong>{{ $product->value }} </p>

        <button> 
            <a href="{{ route('product.index') }}">Voltar</a> 
        </button>


    </div>
    
@endsection