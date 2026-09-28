<?php

use Illuminate\Support\Facades\Route;

$eventos = [
    [
    'id' => 1, 
    'titulo' => 'Workshop de Laravel', 
    'tipo' => 'workshop',
    'data' => '2026-10-14', 
    'local' => 'Laboratório 2.05', 
    'vagas' => 20, 
    'inscritos' => 12
    ],
    ['id' => 2, 
    'titulo' => 'Palestra: Carreiras em Cibersegurança', 
    'tipo' => 'palestra',
    'data' => '2026-10-21', 
    'local' => 'Auditório', 
    'vagas' => 120, 
    'inscritos' => 120
    ],
    ['id' => 3, 
    'titulo' => 'Hackathon ISLA 24h', 
    'tipo' => 'hackathon',
    'data' => '2026-11-06', 
    'local' => 'Átrio principal', 
    'vagas' => 60, 
    'inscritos' => 41
    ],
    ['id' => 4, 
    'titulo' => 'Git e GitHub para iniciantes', 
    'tipo' => 'workshop',
    'data' => '2026-09-30', 
    'local' => 'Laboratório 1.02', 
    'vagas' => 25,
    'inscritos' => 25
    ],
    ['id' => 5, 
    'titulo' => 'Conversa com antigos alunos DWDM', 
    'tipo' => 'palestra',
    'data' => '2026-12-02', 
    'local' => 'Sala 3.10', 
    'vagas' => 40, 
    'inscritos' => 9
    ],
    [
    'id' => 6, 
    'titulo' => 'Oficina de Python', 
    'tipo' => 'workshop',
    'data' => '2026-11-15', 
    'local' => 'Laboratório 2.01',
    'vagas' => 30,
    'inscritos' => 30
    ]
];


$interesses = ['Laravel', 'MySQL', 'Git'];

Route::get('/', function () {
    return view('inicio');
});

Route::get('/eventos', function () use ($eventos) {
    $tipo = request('tipo');
    $tiposDisponiveis = array_unique(array_column($eventos, 'tipo'));

    if ($tipo) {
        $eventos = array_filter($eventos, fn ($evento) => $evento['tipo'] === $tipo);
    }
    return view('eventos.index', [
        'eventos' => $eventos,
        'tipo' => $tipo,
        'tiposDisponiveis' => $tiposDisponiveis
    ]);
});

Route::get('/eventos/{id}', function (int $id) use ($eventos) {
    $evento = null;
    foreach ($eventos as $item) {
        if ($item['id'] === $id) {
        $evento = $item;
        }
    }
    if ($evento === null) { abort(404);}
    return view('eventos.show', ['evento' => $evento]);
})->whereNumber('id');

Route::get('/ola', function () {
    return 'Olá, DWDM!';
});

Route::get('/sobre', function () {
    return view('sobre');
});

Route::get('/ola/{nome}', function (string $nome) {
 return 'Olá, ' . e($nome) . '!';
});

Route::get('/aluno/{nome}/{curso}', function (string $nome, string $curso) {
    return e($nome) .' está no curso de ' . e($curso) . '!';
});

Route::get('/saudacao/{nome?}', function (string $nome = null) {
    return 'Bem-vindo, ' . e($nome?? 'Visitante') . '!';
});

Route::get('/saudacao1/{nome?}', function (string $nome = 'Visitante') {
    return 'Bem-vindo, ' . e($nome) . '!';
});

Route::get('/dobro/{numero}', function (string $numero) {
    return 'O dobro de ' . e($numero) . ' é ' . e(2*$numero) . '.';
})->whereNumber('numero');

Route::get('/perfil', function () use ($interesses) {
    return view('perfil', [
        'nome' => 'Joana Brito',
        'curso' => 'DWDM',
        'ano' => 2,
        'interesses' => $interesses,
    ]);
});

/*
Route::get('/perfil/{interesse}', function (string $interesse) use ($interesses) {
    if (in_array($interesse, $interesses)) {
        return e($interesse) . ' é um dos meus interesses!';
    } else {
        return 'Não gosto nada disso.';
    }
});
*/

Route::get('/perfil/{interesse}', function (string $interesse) use ($interesses) {
    $interesseUrl = strtolower($interesse);

    $interessesLista = array_map('strtolower', $interesses);

    if (in_array($interesseUrl, $interessesLista)) {
        return Str::ucfirst(e($interesse)) . ' é um dos meus interesses!';
    } else {
        return 'Não gosto nada disso.';
    }
});
