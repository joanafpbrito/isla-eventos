<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
</head>
<body>
    <h1>{{ $nome }}</h1>
    <p>Curso: {{ $curso }} . {{ $ano }}.º ano</p>
    @if ($ano == 2) 
        <p> Estás no último ano do curso! Yeeey</p> 
    @endif
    <ul>
        @if (count($interesses) > 0)
            <h2>{{ count($interesses) }} Interesses</h2>
        @endif
        @foreach ($interesses as $item)
            <li>{{ $item }}</li>
        @endforeach

    </ul>

</body>
</html>