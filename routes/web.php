<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\TipoController;

$interesses = ['Laravel', 'MySQL', 'Git'];

Route::get('/', [InicioController::class, 'index'])
->name('inicio');

Route::get('/eventos', [EventoController::class, 'index'])
->name('eventos.index');

Route::get('eventos/tipo/{tipo}', [TipoController::class, 'porTipo'])
->name('eventos.tipo');

Route::get('/eventos/{id}', [EventoController::class, 'show'])
->whereNumber('id')
->name('eventos.show');

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

Route:: fallback(function () {
    return response()->view('errors.404', [], 404);
});