@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cadastro de cidades</h1>
    @if(Session::has('mensagem_sucesso'))
        <div class="alert alert-success">{!! Session::get('mensagem_sucesso') !!}</div>
    @endif
    @if(Session::has('mensagem_erro'))
        <div class="alert alert-danger">{!! Session::get('mensagem_erro') !!}</div>
    @endif
    @if(Route::is('cidades.edit'))
        {!! Form::model($cidade, ['method'=>'PATCH', 'url'=>'cidades/'.$cidade->id]) !!}
    @else
        {!! Form::open(['method'=>'POST', 'url'=>'cidades']) !!}
    @endif
    {!! Form::label('nome', "Nome") !!}
    {!! Form::input('text', 'nome', null, ['class'=>'form-control', 'autofocus']) !!}
    {!! Form::label('uf', "UF") !!}
    {!! Form::input('text', 'uf', null, ['class'=>'form-control']) !!}
    {!! Form::submit('Salvar', ['class'=>'btn btn-primary btn-lg btn-block mt-1']) !!}
    {!! Form::close() !!}
</div>
@endsection
