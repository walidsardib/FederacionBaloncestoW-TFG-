<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $fillable = [
        'nombre',
        'pJugados',
        'pGanados',
        'pPerdidos',
        'puntosFinalizados',
        'puntosContra',
        'pts',
        'entrenador',
        'pabellon',
        'ciudad',
        'escudo',
        'idLiga',
        'idClub'
    ];
    public function club()
    {
        return $this->belongsTo(Club::class, 'idClub');
    }

    public static function listarPorLiga($idLiga)
    {
        return self::where('idLiga', $idLiga)->orderBy('pts', 'DESC')->get();
    }

    public static function listarSinLiga()
    {
        return self::whereNull('idLiga')->orderBy('nombre', 'ASC')->get();
    }
    public function liga()
    {
        return $this->belongsTo(Liga::class, 'idLiga');
    }

    public static function actualizarEstadisticas($idEquipo, $puntosAFavor, $puntosEnContra, $haGanado)
    {
        $equipo = self::find($idEquipo);
        $equipo->pJugados += 1;
        $equipo->pGanados += $haGanado ? 1 : 0;
        $equipo->pPerdidos += $haGanado ? 0 : 1;
        $equipo->puntosFinalizados += $puntosAFavor;
        $equipo->puntosContra += $puntosEnContra;
        $equipo->pts += $haGanado ? 2 : 1;
        $equipo->save();
    }
    public function jugadores()
    {
        return $this->hasMany(Jugador::class, "idEquipo");
    }

}
