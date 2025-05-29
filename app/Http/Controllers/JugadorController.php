<?php

namespace App\Http\Controllers;
use App\Models\Jugador;
use Illuminate\Http\Request;

class JugadorController extends Controller
{
    public function index(Jugador $jugador)
    {
        return view('jugadores.index', compact('jugador'));
    }

    public function create(Request $request)
    {
        $equipoId = $request->query('equipo_id');
        return view('jugadores.create', compact('equipoId'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'dorsal' => 'nullable|integer',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('jugadores', 'public');
        }

        Jugador::create([
            'nombre' => $request->nombre,
            'foto' => $fotoPath,
            'dorsal' => $request->dorsal,
            'idEquipo' => auth()->user()->idEquipo,
        ]);

        return redirect()->route('equipos.show', auth()->user()->idEquipo)->with('success', 'Jugador añadido correctamente.');
    }

    public function edit(Jugador $jugador)
    {
        return view('jugadores.edit', compact('jugador'));
    }

    public function update(Request $request, Jugador $jugador)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'dorsal' => 'nullable|integer',
        ]);

        $fotoPath = $jugador->foto;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('jugadores', 'public');
        }

        $jugador->update([
            'nombre' => $request->nombre,
            'foto' => $fotoPath,
            'dorsal' => $request->dorsal,
        ]);

        return redirect()->route('equipos.show', $jugador->idEquipo)->with('success', 'Jugador actualizado correctamente.');
    }

    public function destroy(Jugador $jugador)
    {
        $jugador->estadisticas()->delete();
        $jugador->accionPartido()->delete();
        $jugador->delete();

        return redirect()->route('equipos.show', $jugador->idEquipo)->with('success', 'Jugador eliminado correctamente.');
    }
}
