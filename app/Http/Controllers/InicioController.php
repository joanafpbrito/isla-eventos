<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\Evento;

class InicioController extends Controller
{
    public function index()
    {
        $hoje = date('Y-m-d');
        $proximos = Evento::with('tipo')
            ->where('data', '>=', $hoje)
            ->orderBy('data')
            ->limit(3)
            ->get();

        return view('inicio', [
            'proximos' => $proximos,
        ]);
    }
}
