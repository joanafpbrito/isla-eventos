<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class EventoController extends Controller
{
    public function index(Request $request): View
    {
        $eventos = config('eventos');
        $tipo = $request->query('tipo');
        $hoje = date('Y-m-d');
        $tiposDisponiveis = array_unique(array_column($eventos, 'tipo'));
        $porTipo = array_filter($eventos, fn ($evento) => $evento['tipo'] === $tipo);
        $proximos = array_filter($eventos, function ($evento) use ($hoje) {
            $data = date('Y-m-d', strtotime($evento['data']));
            return $data >= $hoje;
        });

        if ($tipo === 'proximos') {
            $listaEventos = $proximos;
        } elseif ($tipo) {
            $listaEventos = $porTipo;
        } else {
            $listaEventos = $eventos;
        }

        usort($listaEventos, function ($a, $b) {
            return strtotime($a['data']) - strtotime($b['data']);
        });

        return view('eventos.index', [
            'eventos' => $listaEventos,
            'tipo' => $tipo,
            'tiposDisponiveis' => $tiposDisponiveis
        ]);
    }

    public function show(int $id): View
    {
        $evento = $this->procurar($id);
        if ($evento === null) {
            abort(404);
        }
        return view('eventos.show', ['evento' => $evento]);
    }

    private function procurar(int $id): ? array
    {
        foreach (config('eventos') as $item) {
            if( $item['id'] === $id) {
                return $item;
            }
        }
        return null;
    }

}
