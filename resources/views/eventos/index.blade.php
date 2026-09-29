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
    <h1>Eventos</h1>
    <div>
        <span> || </span><a href="/eventos">todos</a>
        <span> || </span><a href="/eventos?tipo=proximos">proximos</a><span> || </span>
        @foreach ($tiposDisponiveis as $tipoDisponivel)
            <a href="/eventos?tipo={{ $tipoDisponivel }}">{{ $tipoDisponivel }}</a><span> || </span>
        @endforeach
    </div>
    <br><br>
    <h2>Eventos do tipo: {{ $tipo ?? 'Todos' }}</h2>
    @forelse ($eventos as $evento)
        <ul>
            <li>{{ $loop->iteration }}</li>
            <li> <a href="/eventos/{{ $evento['id'] }}"> {{ $evento['titulo'] }}</a></li>
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

    
</body>
</html>