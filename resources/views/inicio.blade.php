@extends('layouts.app')
@section('titulo', 'Isla Eventos')
@section('conteudo')
    <h1>{{ config('app.name') }}</h1>
    <p>Workshops, palestras e hackathons do ISLA Gaia.</p>
    <h2> Próximos Eventos </h2>
    @forelse ($proximos as $item)
    <ul>
        <li>{{ $loop->iteration }}</li>
        <li> <a href="{{ route('eventos.show', ['id' => $item['id']]) }}"> {{ $item['titulo'] }}</a></li>
        <li>{{ date('d/m/Y', strtotime($item['data'])) }}</li>
            @if ($item['inscritos'] >= $item['vagas'])
            <li> <strong>Lotado!</strong></li>
            @else
            <li> Inscreve-te Agora! </li>
            @endif
    </ul>   
    @empty
    <p>Não há eventos para mostrar.</p>
    @endforelse
    <p><a href="{{ route('eventos.index') }}" role="button">Ver eventos</a></p>
@endsection