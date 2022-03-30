@extends('base')

@section('content')
   
<h2>Visualizando Dados do Client</h2>

<p><strong>ID:</strong>{{ $client->id }}</p>

<p><strong>Nome:</strong>{{ $client->name }}</p>

<p><strong>Cidade:</strong>{{ $client->city }}</p>

<p><strong>E-mail:</strong>{{ $client->email }}</p>

<a href="{{ route('client.index') }}">Voltar</a>

<hr>


@endsection