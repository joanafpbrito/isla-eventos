<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class TipoController extends Controller
{
    public function porTipo(string $tipo): View
    {
        $eventos = DB::table('eventos')->get();
        $tiposDisponiveis = $eventos->pluck('tipo')
            ->unique()
            ->values();

        if (!$tiposDisponiveis->contains($tipo)) {
            abort(404);
        }

        $porTipo = $eventos->filter(function ($evento) use ($tipo) {
            return $evento->tipo === $tipo;
        });

        $porTipo = $porTipo->sortBy('data')->values();

        return view('eventos.index', [
            'eventos' => $porTipo,
            'tipo' => $tipo,
            'tiposDisponiveis' => $tiposDisponiveis
        ]);
    }
}
