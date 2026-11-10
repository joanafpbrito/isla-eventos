@extends('layouts.app')
@section('titulo', 'Eventos')
@section('conteudo')
<h1>Eventos</h1>
    <div>
        <span> || </span><a href="{{ route('eventos.index')}}">todos</a>
        <span> || </span><a href="{{ route('eventos.index', ['tipo' => 'proximos']) }}">proximos</a><span> || </span>
        @foreach ($tiposDisponiveis as $tipoDisponivel)
            <a href="{{ route('eventos.index', ['tipo' => $tipoDisponivel]) }}">{{ $tipoDisponivel }}</a><span> || </span>
        @endforeach
    </div>
    <br><br>
    <h2>Eventos do tipo: {{ $tipo ?? 'Todos' }}</h2>
    @forelse ($eventos as $evento)
        <x-cartao-evento :evento="$evento"/> 
        @empty
        <x-alerta> Não há eventos para mostrar.</x-alerta>
    @endforelse
@endsection