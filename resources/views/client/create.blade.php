@extends('base')

@section('content')
    
    <form method="POST" action="{{ route('client.store') }}">
        @csrf
        <label for="name">Nome</label>
        <input type="text" name="name" maxlength="50" required>
        <br>

        <label for="city">Cidade</label>
        <input type="text" name="city" maxlength="50" required>
        <br>

        <label for="email">E-mail</label>
        <input type="text" name="email" maxlength="50" required>
        <br>

        <input type="submit" value="Salvar">

    </form>


@endsection