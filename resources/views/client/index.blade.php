{{-- inherits the 'base' view --}}
@extends('base')

@section('content')
    
    {{-- create the view --}}
    <h3>Listando os clientes cadastrados</h3>
    <hr>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Cidade</th>
            <th>E-mail</th>
            <th colspan="3">Comandos</th>
        </tr>
        @if(isset($clients))
            @foreach($clients as $client)
                <tr>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->city }}</td>
                    <td>{{ $client->email }}</td>
                    <td> <a href=" {{ route('client.show', $client->id) }} ">Exibir</a> </td>
                    <td> <a href=" {{ route('client.edit', $client->id) }} ">Editar</a>  </td>
                    <td> Excluir </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4">Não há dados cadastrados!</td>
            </tr>
        @endif
    </table>

@endsection

