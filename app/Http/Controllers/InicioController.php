<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class InicioController extends Controller
{
    public function index()
    {
        $hoje = date('Y-m-d');
        $proximos = DB::table('eventos')
            ->where('data', '>=', $hoje)
            ->orderBy('data')
            ->limit(3)
            ->get();

        return view('inicio', [
            'proximos' => $proximos,
        ]);
    }
}
