<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class EventoController extends Controller
{
    public function index(Request $request): View
    {
        $eventos = DB::table('eventos')->orderBy('data')->get();
        $tipo = $request->query('tipo');
        $hoje = date('Y-m-d');
        $tiposDisponiveis = $eventos->pluck('tipo')
            ->unique()
            ->values();
        $porTipo = $eventos->filter(function ($evento) use ($tipo) {
            return $evento->tipo === $tipo;
        });
        $proximos = $eventos->filter(function ($evento) use ($hoje) {
            return $evento->data >= $hoje;
        });

        if ($tipo === 'proximos') {
            $listaEventos = $proximos;
        } elseif ($tipo) {
            $listaEventos = $porTipo;
        } else {
            $listaEventos = $eventos;
        }
     
        return view('eventos.index', [
            'eventos' => $listaEventos,
            'tipo' => $tipo,
            'tiposDisponiveis' => $tiposDisponiveis
        ]);
    }

    public function show(int $id): View
    {
        $evento = DB::table('eventos')->where('id', $id)->first();

        if ($evento === null) {
            abort(404);
        }

        return view('eventos.show', ['evento' => $evento]);
    }
}
