<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccionPartido extends Model
{
    protected $table = 'acciones_partido';
    protected $fillable = [
        'idPartido',
        'idJugador',
        'idEquipo',
        'accion',
        'valor'
    ];

    public function jugador()
    {
        return $this->belongsTo(Jugador::class, 'idJugador');
    }
    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'idEquipo');
    }
}