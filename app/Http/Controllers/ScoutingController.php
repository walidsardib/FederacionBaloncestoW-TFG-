<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jugador;
use App\Models\Liga;
class ScoutingController extends Controller
{
    public function index()
    {
        $ligas = Liga::all();
        $jugadores = Jugador::with('equipo.liga')
            ->orderBy('pts', 'desc')
            ->get();
        return view('scouting.index', compact('ligas', 'jugadores'));
    }
}
