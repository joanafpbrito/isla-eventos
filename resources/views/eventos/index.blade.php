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
        <ul>
            <li>{{ $loop->iteration }}</li>
            <li> <a href="{{ route('eventos.show', ['id' => $evento['id']]) }}"> {{ $evento['titulo'] }}</a></li>
            <li>{{ date('d/m/Y', strtotime($evento['data'])) }}</li>
                @if ($evento['inscritos'] >= $evento['vagas'])
                <li> <strong>Lotado!</strong></li>
                @else
                <li> Inscreve-te Agora! </li>
                @endif
        </ul>   
        @empty
        <p>Não há eventos para mostrar.</p>
    @endforelse
@endsection