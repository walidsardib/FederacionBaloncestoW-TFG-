<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jornada extends Model
{
    protected $fillable = [
        'idLiga',
        'nombre',
        'fechaInicio',
        'fechaFin',
    ];

    public function liga()
    {
        return $this->belongsTo(Liga::class, 'idLiga');
    }

    public function partidos()
    {
        return $this->hasMany(Partido::class, 'idJornada');
    }
}
