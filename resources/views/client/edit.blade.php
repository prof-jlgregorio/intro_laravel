@extends('base')

@section('content')
    
    <form method="POST" action="{{ route('client.update', $client->id) }}">
        @method('PUT')
        @csrf
        <label for="name">Nome</label>
        <input type="text" name="name" maxlength="50" 
            required value="{{ $client->name }}">
        <br>
        <label for="city">Cidade</label>
        <input type="text" name="city" maxlength="50" required 
            value="{{ $client->city }}">
        <br>

        <label for="email">E-mail</label>
        <input type="text" name="email" maxlength="50" required 
            value="{{ $client->email }}">
        <br>
        <input type="submit" value="Atualizar">

    </form>


@endsection