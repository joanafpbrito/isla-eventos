<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class TipoController extends Controller
{
    public function porTipo(string $tipo): View
    {
        $eventos = config('eventos');
        $tiposDisponiveis = array_unique(array_column($eventos, 'tipo'));

        if (!in_array($tipo, $tiposDisponiveis)) {
            abort(404);
        }
        $porTipo = array_filter($eventos, fn ($evento) => $evento['tipo'] === $tipo);

        usort($porTipo, function ($a, $b) {
            return strtotime($a['data']) - strtotime($b['data']);
        });

        return view('eventos.index', [
            'eventos' => $porTipo,
            'tipo' => $tipo,
            'tiposDisponiveis' => $tiposDisponiveis
            ]);
        }
}
