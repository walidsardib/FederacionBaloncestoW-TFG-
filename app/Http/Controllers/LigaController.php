<?php

namespace App\Http\Controllers;

use App\Models\Liga;
use App\Models\Equipo;
use Illuminate\Http\Request;
use App\Models\Jornada;
use App\Models\Partido;
use App\Models\Temporada;
use App\Models\EstadisticaPartido;

class LigaController extends Controller
{
    public function index(Request $request)
    {
        $temporadas = Temporada::all();
        $temporadaSeleccionada = $request->input('temporada');

        $ligas = Liga::when($temporadaSeleccionada, function ($query, $temporadaId) {
            return $query->where('idTemporada', $temporadaId);
        })->get();
        $ligaSeleccionada = $request->get('liga');
        $jornadaSeleccionada = $request->get('jornada');

        $jornadas = $ligaSeleccionada ? Jornada::where('idLiga', $ligaSeleccionada)->get() : [];
        $partidos = $jornadaSeleccionada ? Partido::where('idJornada', $jornadaSeleccionada)->get() : [];
        $equipos = $ligaSeleccionada ? Equipo::where('idLiga', $ligaSeleccionada)->orderBy('pts', 'desc')->get() : [];

        return view('liga.index', compact('ligas', 'ligaSeleccionada', 'jornadas', 'jornadaSeleccionada', 'partidos', 'equipos', 'temporadas', 'temporadaSeleccionada'));
    }

    public function create()
    {
        $equipos = Equipo::whereNull('idLiga')->get();
        return view('liga.create', compact('equipos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'temporada' => 'required|string|max:255',
            'equipos' => 'nullable|array',
        ]);

        $temporada = Temporada::firstOrCreate(
            ['nombre' => $request->temporada]
        );

        $liga = Liga::create([
            'nombre' => $request->nombre,
            'idTemporada' => $temporada->id,
        ]);

        if ($request->filled('equipos')) {
            Equipo::whereIn('id', $request->equipos)->update(['idLiga' => $liga->id]);
            $equipos = $request->equipos;
            $numEquipos = count($equipos);
            $numJornadas = ($numEquipos - 1) * 2;
            $jornadas = [];

            for ($i = 0; $i < $numJornadas; $i++) {
                $jornada = $liga->jornadas()->create([
                    'nombre' => 'Jornada ' . ($i + 1),
                    'fecha_inicio' => now()->addDays($i * 7),
                    'fecha_fin' => now()->addDays(($i * 7) + 6),
                ]);
                $jornadas[] = $jornada;
            }

            for ($i = 0; $i < $numEquipos - 1; $i++) {
                for ($j = 0; $j < $numEquipos / 2; $j++) {
                    $local = $equipos[$j];
                    $visitante = $equipos[$numEquipos - 1 - $j];

                    $jornadas[$i]->partidos()->create([
                        'idLocal' => $local,
                        'idVisitante' => $visitante,
                        'fecha' => now()->addDays($i * 7),
                        'hora' => '18:00',
                    ]);

                    $jornadas[$i + $numEquipos - 1]->partidos()->create([
                        'idLocal' => $visitante,
                        'idVisitante' => $local,
                        'fecha' => now()->addDays(($i + $numEquipos - 1) * 7),
                        'hora' => '18:00',
                    ]);
                }
                array_splice($equipos, 1, 0, array_pop($equipos));
            }
        }

        return redirect()->route('ligas.index')->with('success', 'Liga creada correctamente.');
    }

    public function edit($id)
    {
        $liga = Liga::with(['equipos', 'jornadas'])->findOrFail($id);
        $equipos = Equipo::whereNull('idLiga')->orWhere('idLiga', $liga->id)->get();

        return view('liga.edit', compact('liga', 'equipos'));
    }

    public function update(Request $request, $id)
    {
        $liga = Liga::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'temporada' => 'nullable|string|max:255',
            'equipos' => 'nullable|array',
            'equipos_eliminados' => 'nullable|array',
            'jornadas' => 'nullable|array',
        ]);

        if ($request->filled('temporada')) {
            $temporada = Temporada::firstOrCreate(['nombre' => $request->temporada]);
            $liga->idTemporada = $temporada->id;
        }

        $liga->nombre = $request->nombre;
        $liga->save();

        if ($request->filled('equipos_eliminados')) {
            Equipo::whereIn('id', $request->equipos_eliminados)->update(['idLiga' => null]);
        }

        if ($request->filled('equipos')) {
            Equipo::whereIn('id', $request->equipos)->update(['idLiga' => $liga->id]);
        }

        if ($request->filled('jornadas')) {
            Jornada::where('idLiga', $liga->id)->delete();

            foreach ($request->jornadas as $jornadaData) {
                $jornada = json_decode($jornadaData, true);
                Jornada::create([
                    'idLiga' => $liga->id,
                    'nombre' => $jornada['nombre'],
                    'fecha_inicio' => $jornada['inicio'],
                    'fecha_fin' => $jornada['fin'],
                ]);
            }
        }

        return redirect()->route('ligas.index')->with('success', 'Liga actualizada correctamente.');
    }


    public function destroy($id)
    {
        $liga = Liga::findOrFail($id);

        Equipo::where('idLiga', $liga->id)->update(['idLiga' => null]);

        $jornadas = Jornada::where('idLiga', $liga->id)->get();

        foreach ($jornadas as $jornada) {
            $partidos = Partido::where('idJornada', $jornada->id)->get();

            foreach ($partidos as $partido) {
                EstadisticaPartido::where('idPartido', $partido->id)->delete();

                $partido->delete();
            }


            $jornada->delete();
        }

        $liga->delete();

        return redirect()->route('ligas.index')->with('success', 'Liga, jornadas, partidos y estadísticas eliminados correctamente.');
    }
    public function generarJornadas(Request $request)
    {
        $request->validate(['idLiga' => 'required|exists:ligas,id']);
        return redirect()->route('ligas.index')->with('success', 'Jornadas y partidos generados correctamente.');
    }

    public function gestionarEquipos(Request $request)
    {
        $request->validate(['id' => 'required|exists:ligas,id']);
        $liga = Liga::findOrFail($request->id);
        return view('ligas.gestionarEquipos', compact('liga'));
    }
}