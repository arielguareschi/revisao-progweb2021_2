@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Exibir cidade</h1>
    <h2>Id: {{ $cidade->id }}</h2>
    <h2>Nome: {{ $cidade->nome }}</h2>
    <h2>UF: {{ $cidade->uf }}</h2>
    <a href="{{ url('cidades/'.$cidade->id.'/edit') }}" class="btn btn-info btn-block">Editar</a>
</div>
@endsection
