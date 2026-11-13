@extends('layouts.app')
@section('titulo', $evento->titulo)
@section('conteudo')
    <h1>{{ $evento->titulo }}</h1>
    <p>Tipo: {{ $evento->tipo->nome }}</p>
    <p>Data: {{ date('d/m/Y', strtotime($evento->data)) }}</p>
    <p>Local: {{ $evento->local }}</p>
    @if ($evento->descricao)
        <p>Descrição: {{ $evento->descricao }}</p>
    @endif
    <p>  Inscritos: {{ $evento->inscritos }} de {{ $evento->vagas }}</p>
    <p><a href="{{ route('eventos.index') }}" role="button">Voltar</a></p>
@endsection