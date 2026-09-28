<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eventos</title>
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>
<body>
    <h1>Próximos Eventos</h1>
    <a href="/eventos"> || todos || </a></li>
    @foreach ($tiposDisponiveis as $tipoDisponivel)
    <a href="/eventos?tipo={{ $tipoDisponivel }}">{{ $tipoDisponivel }} || </a></li>
    @endforeach
    <br><br>
    <h2>Eventos do tipo: {{ $tipo ?? 'Todos' }}</h2>
    @forelse ($eventos as $evento)
        <ul>
            <li>{{ $loop-> iteration }}</li>
            <li> <a href="/eventos/{{ $evento['id'] }}"> {{ $evento['titulo'] }}</a></li>
            <li>{{ date('d/m/Y', strtotime($evento['data'])) }}</li>
                @if ($evento['inscritos'] >= $evento['vagas'])
                <li> <strong>Lotado!</strong></li>
                @else
                <li> Inscreve-te Agora! </li>
                @endif
        </ul>   
        @empty
        <ul colspan="4">Não há eventos para mostrar.</ul>
    @endforelse

    
</body>
</html>