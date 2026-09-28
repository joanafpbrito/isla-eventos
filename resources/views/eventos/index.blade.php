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
    @forelse ($eventos as $evento)
        <ul>
            <il>{{ $loop->iteration }}</il>
            <il> <a href="/eventos/{{ $evento['id'] }}"> {{ $evento['titulo'] }}</a></il>
            <il>{{ date('d/m/Y', strtotime($evento['data'])) }}</il>
                @if ($evento['inscritos'] >= $evento['vagas'])
                <il> <strong>Lotado!</il>
                @else
                <il> Inscreve-te Agora! </il>
                @endif
        </ul>   
        @empty
        <ul>colspan="4">Não há eventos para mostrar.</ul>
    @endforelse

    
</body>
</html>