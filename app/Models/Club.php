<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    protected $table = 'clubes';

    protected $fillable = ['nombre', 'direccion', 'telefono', 'escudo'];

    public function equipos()
    {
        return $this->hasMany(Equipo::class, 'idClub');
    }
}