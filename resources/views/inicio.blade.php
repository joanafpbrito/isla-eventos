@extends('layouts.app')
@section('titulo', 'Isla Eventos')
@section('conteudo')
    <h1>{{ config('app.name') }}</h1>
    <p>Workshops, palestras e hackathons do ISLA Gaia.</p>
    <h2> Próximos Eventos </h2>
    @forelse ($proximos as $item)
    <x-cartao-evento :evento="$item" />
    @empty
    <x-alerta tipo="info">Não há eventos para mostrar!</x-alerta>
    @endforelse
    <p><a href="{{ route('eventos.index') }}" role="button">Ver eventos</a></p>
@endsection