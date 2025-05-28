<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadisticaPartido extends Model
{
    protected $table = 'estadisticas_partido';
    protected $fillable = [
        'idJugador',
        'idPartido',
        'minutosJugados',
        'puntos',
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

    public function jugador()
    {
        return $this->belongsTo(Jugador::class, 'idJugador');
    }

    public function partido()
    {
        return $this->belongsTo(Partido::class, 'idPartido');
    }
}
