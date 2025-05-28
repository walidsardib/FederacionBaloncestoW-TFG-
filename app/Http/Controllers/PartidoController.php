<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Jornada;
use App\Models\Jugador;
use App\Models\EstadisticaPartido;
use App\Models\AccionPartido;
use App\Models\Partido;
use Illuminate\Http\Request;

class PartidoController extends Controller
{
    public function create(Request $request)
    {
        $jornada = Jornada::findOrFail($request->jornada);
        $equipos = Equipo::where('idLiga', $jornada->idLiga)->get();

        return view('partidos.create', compact('jornada', 'equipos'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'idJornada' => 'required|exists:jornadas,id',
            'idLocal' => 'required|exists:equipos,id|different:idVisitante',
            'idVisitante' => 'required|exists:equipos,id',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
        ]);

        Partido::create([
            'idJornada' => $request->idJornada,
            'idLocal' => $request->idLocal,
            'idVisitante' => $request->idVisitante,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'ptsLocal' => $request->ptsLocal ?? 0,
            'ptsVisitante' => $request->ptsVisitante ?? 0,
            'finalizado' => $request->finalizado ?? false,
        ]);

        return redirect()->route('ligas.index', [
            'liga' => $request->liga,
            'jornada' => $request->idJornada,
        ])->with('success', 'Partido creado correctamente.');
    }
    public function show($id)
    {
        $partido = Partido::with(['equipoLocal', 'equipoVisitante'])->findOrFail($id);

        $jugadoresLocal = Jugador::where('idEquipo', $partido->idLocal)->get();
        $jugadoresVisitante = Jugador::where('idEquipo', $partido->idVisitante)->get();

        return view('partidos.show', compact('partido', 'jugadoresLocal', 'jugadoresVisitante'));
    }
    public function registrarAccion(Request $request)
    {
        $request->validate([
            'idPartido' => 'required|exists:partidos,id',
            'idEquipo' => 'required|exists:equipos,id',
            'idJugador' => 'required|exists:jugadores,id',
            'accion' => 'required|string',
        ]);

        $accion = $request->accion;
        $idPartido = $request->idPartido;
        $idJugador = $request->idJugador;

        $estadistica = EstadisticaPartido::firstOrCreate(
            [
                'idPartido' => $idPartido,
                'idJugador' => $idJugador,
            ],
            [
                'minutosJugados' => 0,
                'puntos' => 0,
                'rebotes' => 0,
                'asistencias' => 0,
                'intentos2P' => 0,
                'aciertos2P' => 0,
                'intentos3P' => 0,
                'aciertos3P' => 0,
                'intentosTL' => 0,
                'aciertosTL' => 0,
                'robos' => 0,
            ]
        );

        switch ($accion) {
            case 'intento2P':
                $estadistica->intentos2P += 1;
                break;
            case 'acierto2P':
                $estadistica->intentos2P += 1;
                $estadistica->aciertos2P += 1;
                $estadistica->puntos += 2;
                break;
            case 'intento3P':
                $estadistica->intentos3P += 1;
                break;
            case 'acierto3P':
                $estadistica->intentos3P += 1;
                $estadistica->aciertos3P += 1;
                $estadistica->puntos += 3;
                break;
            case 'intentoTL':
                $estadistica->intentosTL += 1;
                break;
            case 'aciertoTL':
                $estadistica->intentosTL += 1;
                $estadistica->aciertosTL += 1;
                $estadistica->puntos += 1;
                break;
            case 'rebote':
                $estadistica->rebotes += 1;
                break;
            case 'asistencia':
                $estadistica->asistencias += 1;
                break;
            case 'robo':
                $estadistica->robos += 1;
                break;
            default:
                return response()->json(['message' => 'Acción no válida.'], 400);
        }

        $estadistica->save();
        AccionPartido::create([
            'idPartido' => $idPartido,
            'idEquipo' => $request->idEquipo,
            'idJugador' => $idJugador,
            'accion' => $accion,
            'valor' => match ($accion) {
                'acierto2P' => 2,
                'acierto3P' => 3,
                'aciertoTL' => 1,
                default => null,
            },
        ]);

        return response()->json(['message' => 'Acción registrada correctamente.']);
    }
    public function guardarIniciales(Request $request)
    {
        $request->validate([
            'idPartido' => 'required|exists:partidos,id',
            'inicialesLocal' => 'required|array|size:5',
            'inicialesLocal.*' => 'exists:jugadores,id',
            'inicialesVisitante' => 'required|array|size:5',
            'inicialesVisitante.*' => 'exists:jugadores,id',
        ]);

        $idPartido = $request->idPartido;

        // Guardar los jugadores iniciales en la base de datos
        foreach ($request->inicialesLocal as $idJugador) {
            EstadisticaPartido::updateOrCreate(
                [
                    'idPartido' => $idPartido,
                    'idJugador' => $idJugador,
                ],
                [
                    'minutosJugados' => 0,
                    'puntos' => 0,
                    'rebotes' => 0,
                    'asistencias' => 0,
                    'intentos2P' => 0,
                    'aciertos2P' => 0,
                    'intentos3P' => 0,
                    'aciertos3P' => 0,
                    'intentosTL' => 0,
                    'aciertosTL' => 0,
                    'robos' => 0,
                ]
            );
        }

        foreach ($request->inicialesVisitante as $idJugador) {
            EstadisticaPartido::updateOrCreate(
                [
                    'idPartido' => $idPartido,
                    'idJugador' => $idJugador,
                ],
                [
                    'minutosJugados' => 0,
                    'puntos' => 0,
                    'rebotes' => 0,
                    'asistencias' => 0,
                    'intentos2P' => 0,
                    'aciertos2P' => 0,
                    'intentos3P' => 0,
                    'aciertos3P' => 0,
                    'intentosTL' => 0,
                    'aciertosTL' => 0,
                    'robos' => 0,
                ]
            );
        }

        return response()->json(['message' => 'Jugadores iniciales guardados correctamente.']);
    }

    public function finalizar(Request $request)
    {
        $request->validate([
            'idPartido' => 'required|exists:partidos,id',
            'idLocal' => 'required|exists:equipos,id',
            'idVisitante' => 'required|exists:equipos,id',
            'tiempoJugadoLocal' => 'required|array',
            'tiempoJugadoVisitante' => 'required|array',
        ]);

        $partido = Partido::findOrFail($request->idPartido);

        $this->guardarMinutosJugados($partido->id, $request->tiempoJugadoLocal);
        $this->guardarMinutosJugados($partido->id, $request->tiempoJugadoVisitante);

        $puntosLocal = $this->calcularPuntosEquipo($partido->id, $partido->idLocal);
        $puntosVisitante = $this->calcularPuntosEquipo($partido->id, $partido->idVisitante);

        $partido->update([
            'ptsLocal' => $puntosLocal,
            'ptsVisitante' => $puntosVisitante,
            'finalizado' => true,
        ]);

        Equipo::actualizarEstadisticas($partido->idLocal, $puntosLocal, $puntosVisitante, $puntosLocal > $puntosVisitante);
        Equipo::actualizarEstadisticas($partido->idVisitante, $puntosVisitante, $puntosLocal, $puntosVisitante > $puntosLocal);

        $jugadoresLocal = Jugador::where('idEquipo', $partido->idLocal)->get();
        $jugadoresVisitante = Jugador::where('idEquipo', $partido->idVisitante)->get();

        foreach ($jugadoresLocal as $jugador) {
            $jugador->actualizarEstadisticas();
        }

        foreach ($jugadoresVisitante as $jugador) {
            $jugador->actualizarEstadisticas();
        }

        return response()->json(['message' => 'El partido ha sido finalizado correctamente.']);
    }
    private function guardarMinutosJugados($idPartido, $tiemposJugados)
    {
        foreach ($tiemposJugados as $idJugador => $minutos) {
            EstadisticaPartido::updateOrCreate(
                ['idPartido' => $idPartido, 'idJugador' => $idJugador],
                ['minutosJugados' => $minutos / 60]
            );
        }
    }

    private function calcularPuntosEquipo($idPartido, $idEquipo)
    {
        return EstadisticaPartido::where('idPartido', $idPartido)
            ->whereHas('jugador', function ($query) use ($idEquipo) {
                $query->where('idEquipo', $idEquipo);
            })
            ->sum('puntos');
    }


    public function estadisticas($id)
    {
        $partido = Partido::with(['equipoLocal', 'equipoVisitante'])->findOrFail($id);

        $estadisticasLocal = EstadisticaPartido::where('idPartido', $id)
            ->whereHas('jugador', function ($query) use ($partido) {
                $query->where('idEquipo', $partido->idLocal);
            })->orderBy('puntos', 'desc')
            ->with('jugador')
            ->get();

        $estadisticasVisitante = EstadisticaPartido::where('idPartido', $id)
            ->whereHas('jugador', function ($query) use ($partido) {
                $query->where('idEquipo', $partido->idVisitante);
            })
            ->orderBy('puntos', 'desc')
            ->with('jugador')
            ->get();

        $jugadorDestacadoLocal = $estadisticasLocal->sortByDesc('puntos')->first();
        $jugadorLoc = $jugadorDestacadoLocal ? Jugador::find($jugadorDestacadoLocal->idJugador) : null;

        $jugadorDestacadoVisitante = $estadisticasVisitante->sortByDesc('puntos')->first();
        $jugadorVis = $jugadorDestacadoVisitante ? Jugador::find($jugadorDestacadoVisitante->idJugador) : null;

        return view('partidos.estadisticas', compact(
            'partido',
            'estadisticasLocal',
            'estadisticasVisitante',
            'jugadorDestacadoLocal',
            'jugadorDestacadoVisitante',
            'jugadorLoc',
            'jugadorVis'
        ));
    }
    public function destroy($id)
    {
        $partido = Partido::findOrFail($id);
        $partido->delete();

        return redirect()->route('ligas.index', [
            'liga' => request('liga'),
            'jornada' => request('jornada'),
        ])->with('success', 'El partido ha sido eliminado correctamente.');
    }

    public function actualizarEstadisticas(Request $request)
    {
        try {
            $validated = $request->validate([
                'idPartido' => 'required|exists:partidos,id',
                'idJugador' => 'required|exists:jugadores,id',
                'equipo' => 'required|in:local,visitante',
                'puntos' => 'required|integer',
                'rebotes' => 'required|integer',
                'asistencias' => 'required|integer',
            ]);

            $estadistica = EstadisticaPartido::updateOrCreate(
                [
                    'idPartido' => $validated['idPartido'],
                    'idJugador' => $validated['idJugador'],
                ],
                [
                    'puntos' => $validated['puntos'],
                    'rebotes' => $validated['rebotes'],
                    'asistencias' => $validated['asistencias'],
                ]
            );

            return response()->json(['message' => 'Estadísticas actualizadas correctamente.']);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['message' => 'Ocurrió un error al actualizar las estadísticas.'], 500);
        }
    }
    public function directo()
    {
        $today = now()->toDateString();

        $partidos = Partido::whereDate('fecha', $today)
            ->where('finalizado', false)
            ->with(['equipoLocal', 'equipoVisitante'])
            ->get();

        foreach ($partidos as $partido) {
            $partido->ptsLocal = $this->calcularPuntosEquipo($partido->id, $partido->idLocal);
            $partido->ptsVisitante = $this->calcularPuntosEquipo($partido->id, $partido->idVisitante);
        }
        return view('partidos.directo', compact('partidos'));
    }

    public function verDirecto($id)
    {
        $partido = Partido::with(['equipoLocal', 'equipoVisitante'])->findOrFail($id);

        return view('partidos.verDirecto', compact('partido'));
    }
    public function actualizar($id)
    {
        try {
            $partido = Partido::with(['equipoLocal', 'equipoVisitante'])->findOrFail($id);

            $acciones = AccionPartido::where('idPartido', $id)
                ->with('jugador')
                ->orderBy('created_at', 'desc')
                ->get()
                ->map(function ($accion) {
                    return [
                        'jugadorNombre' => $accion->jugador ? $accion->jugador->nombre : 'Sin nombre',
                        'jugadorFoto' => $accion->jugador && $accion->jugador->foto ? asset('storage/' . $accion->jugador->foto) : asset('images/default-user.png'),
                        'accion' => $accion->accion,
                        'valor' => $accion->valor,
                        'equipo' => $accion->idEquipo,
                        'created_at' => $accion->created_at->format('H:i:s'),
                    ];
                });

            $ptsLocal = $this->calcularPuntosEquipo($id, $partido->idLocal);
            $ptsVisitante = $this->calcularPuntosEquipo($id, $partido->idVisitante);

            return response()->json([
                'ptsLocal' => $ptsLocal,
                'ptsVisitante' => $ptsVisitante,
                'acciones' => $acciones,
                'idLocal' => $partido->idLocal,
                'idVisitante' => $partido->idVisitante,
            ]);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['message' => 'Error al actualizar el marcador.'], 500);
        }
    }
}