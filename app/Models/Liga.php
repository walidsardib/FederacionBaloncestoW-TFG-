<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Liga extends Model
{
    protected $table = 'liga';
    protected $fillable = [
        'nombre',
        'fechaInicio',
        'fechaFin',
        'idTemporada',

    ];

    public function equipos()
    {
        return $this->hasMany(Equipo::class, 'idLiga');
    }

    public function jornadas()
    {
        return $this->hasMany(Jornada::class, 'idLiga');
    }
    public function temporada()
    {
        return $this->belongsTo(Temporada::class, 'idTemporada');
    }
}
