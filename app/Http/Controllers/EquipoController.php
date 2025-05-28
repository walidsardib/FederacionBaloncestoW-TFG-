<?php
namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Partido;
use App\Models\Jugador;
use App\Models\Liga;

class EquipoController extends Controller
{
    public function index()
    {
        $equipo = auth()->user()->equipo ?? null;
        $liga = $equipo && $equipo->idLiga
            ? Equipo::where('idLiga', $equipo->idLiga)->orderBy('pts', 'desc')->get()
            : [];

        return view('equipos.index', compact('equipo', 'liga'));
    }
    public function profile($idEquipo)
    {
        $equipo = Equipo::findOrFail($idEquipo);
        $jugadores = Jugador::where('idEquipo', $idEquipo)
            ->orderBy('pts', 'asc')
            ->get();

        $ultimoPartido = Partido::where(function ($query) use ($idEquipo) {
            $query->where('idLocal', $idEquipo)
                ->orWhere('idVisitante', $idEquipo);
        })
            ->where('finalizado', true)
            ->orderBy('fecha', 'desc')
            ->first();

        $siguientePartido = Partido::where(function ($query) use ($idEquipo) {
            $query->where('idLocal', $idEquipo)
                ->orWhere('idVisitante', $idEquipo);
        })
            ->where('finalizado', false)
            ->orderBy('fecha', 'asc')
            ->first();

        $aciertosTL = $jugadores->sum('aciertosTL');
        $intentosTL = $jugadores->sum('intentosTL');
        $aciertos2P = $jugadores->sum('aciertos2P');
        $intentos2P = $jugadores->sum('intentos2P');
        $aciertos3P = $jugadores->sum('aciertos3P');
        $intentos3P = $jugadores->sum('intentos3P');

        $equiposLiga = Equipo::where('idLiga', $equipo->idLiga)
            ->orderBy('pts', 'desc')
            ->get();

        return view('equipos.profile', compact(
            'equipo',
            'jugadores',
            'ultimoPartido',
            'siguientePartido',
            'equiposLiga',
            'aciertosTL',
            'intentosTL',
            'aciertos2P',
            'intentos2P',
            'aciertos3P',
            'intentos3P'
        ));
    }


    public function show($id)
    {
        $equipo = Equipo::with('jugadores')->findOrFail($id);
        return view('equipos.show', compact('equipo'));
    }
    public function create()
    {
        return view('equipos.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'entrenador' => 'nullable|string|max:255',
            'pabellon' => 'nullable|string|max:255',
            'ciudad' => 'nullable|string|max:255',
            'escudo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('escudo')) {
            $data['escudo'] = $request->file('escudo')->store('escudos', 'public');
        }

        $equipo = Equipo::create($data);

        $user = Auth::user();
        $user->idEquipo = $equipo->id;
        $user->save();

        return redirect()->route('equipos.index')->with('success', 'Equipo creado correctamente.');
    }

    public function edit($id)
    {
        $equipo = Equipo::findOrFail($id);
        return view('equipos.edit', compact('equipo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'entrenador' => 'nullable|string|max:255',
            'pabellon' => 'nullable|string|max:255',
            'ciudad' => 'nullable|string|max:255',
            'escudo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $equipo = Equipo::findOrFail($id);

        $data = $request->only(['nombre', 'entrenador', 'pabellon', 'ciudad']);

        if ($request->hasFile('escudo')) {
            if ($equipo->escudo) {
                \Storage::disk('public')->delete($equipo->escudo);
            }

            $data['escudo'] = $request->file('escudo')->store('escudos', 'public');
        }

        $equipo->update($data);

        return redirect()->route('equipos.index')->with('success', 'Equipo actualizado correctamente.');
    }

    public function destroy($id)
    {
        $equipo = Equipo::findOrFail($id);
        $equipo->delete();

        return redirect()->route('equipos.index')->with('success', 'Equipo eliminado correctamente.');
    }
}