<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    protected $table = 'jugadores';

    protected $fillable = [
        'nombre',
        'foto',
        'dorsal',
        'idEquipo',
        'pJugados',
        'mins',
        'minsPP',
        'pts',
        'ptsPP',
        'rebotes',
        'asistencias',
        'intentos2P',
        'aciertos2P',
        'intentos3P',
        'aciertos3P',
        'intentosTL',
        'aciertosTL',
        'robos',
    ];

    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'idEquipo');
    }

    public function estadisticas()
    {
        return $this->hasMany(EstadisticaPartido::class, 'idJugador');
    }
    public function actualizarEstadisticas()
    {
        $estadisticas = EstadisticaPartido::where('idJugador', $this->id)->get();

        $this->pJugados += 1;
        $this->mins = $estadisticas->sum('minutosJugados');
        $this->pts = $estadisticas->sum('puntos');
        $this->rebotes = $estadisticas->sum('rebotes');
        $this->asistencias = $estadisticas->sum('asistencias');
        $this->intentos2P = $estadisticas->sum('intentos2P');
        $this->aciertos2P = $estadisticas->sum('aciertos2P');
        $this->intentos3P = $estadisticas->sum('intentos3P');
        $this->aciertos3P = $estadisticas->sum('aciertos3P');
        $this->intentosTL = $estadisticas->sum('intentosTL');
        $this->aciertosTL = $estadisticas->sum('aciertosTL');
        $this->robos = $estadisticas->sum('robos');

        $this->minsPP = $this->pJugados > 0 ? $this->mins / $this->pJugados : 0;
        $this->ptsPP = $this->pJugados > 0 ? $this->pts / $this->pJugados : 0;

        $this->save();
    }
}

