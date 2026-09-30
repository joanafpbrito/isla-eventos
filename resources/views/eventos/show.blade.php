<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Evento - Detalhe</title>
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>
<body>
    <h1>{{ $evento['titulo'] }}</h1>
    <p>Tipo: {{ ($evento['tipo'])}}</p>
    <p>Data: {{ date('d/m/Y', strtotime($evento['data'])) }}</p>
    <p>Local: {{ ($evento['local']) }}</p>
    <p>Inscritos: {{($evento['inscritos'])}} de {{($evento['vagas'])}}</p>
    <p><a href="{{ route('eventos.index') }}" role="button">Voltar</a></p>
    
</body>
</html>