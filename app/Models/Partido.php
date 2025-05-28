<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    protected $fillable = [
        'idLocal',
        'idVisitante',
        'ptsLocal',
        'ptsVisitante',
        'fecha',
        'hora',
        'finalizado',
        'idJornada',
    ];

    public function jornada()
    {
        return $this->belongsTo(Jornada::class, 'idJornada');
    }

    public function equipoLocal()
    {
        return $this->belongsTo(Equipo::class, 'idLocal');
    }

    public function equipoVisitante()
    {
        return $this->belongsTo(Equipo::class, 'idVisitante');
    }

    public function estadisticas()
    {
        return $this->hasMany(EstadisticaPartido::class, 'idPartido');
    }
    //BORRARR ESTADISTICAS AL BORRAR UN PARTIDO
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($partido) {
            $partido->estadisticas()->delete();
        });
    }
}
