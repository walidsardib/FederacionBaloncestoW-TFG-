<?php
namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Partido;
use App\Models\Jugador;
use App\Models\Liga;

class IndexController extends Controller
{
     public function index()
    {
            $equipo = auth()->user()->equipo ?? null;
        $liga = $equipo && $equipo->idLiga
            ? Equipo::where('idLiga', $equipo->idLiga)->orderBy('pts', 'desc')->get()
            : [];

        return view('equipos.index', compact('equipo', 'liga'));
    }
}