@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista das cidades</h1>

    <a href="{{ url('cidades/create') }}" class="btn btn-success btn-block">+ Novo</a>
    @if(Session::has('mensagem_sucesso'))
        <div class="alert alert-success">{!! Session::get('mensagem_sucesso') !!}</div>
    @endif
    @if(Session::has('mensagem_erro'))
        <div class="alert alert-danger">{!! Session::get('mensagem_erro') !!}</div>
    @endif
    <table class="table table-hover table-bordered table-sm mt-1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>UF</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($cidades as $cidade)
                <tr>
                    <td>{{ $cidade->id }}</td>
                    <td>{{ $cidade->nome}}</td>
                    <td>{{ $cidade->uf }}</td>
                    <td>
                        <a href="{{ url('cidades/'.$cidade->id) }}" class="btn btn-primary">Ver +</a>
                        {!! Form::open(['method'=>'DELETE', 'url'=>'cidades/'.$cidade->id, 'style'=>'display:inline']) !!}
                        {!! Form::submit('Excluir', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Não a cidades há listar</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
