<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    protected $table = 'temporadas';
    protected $fillable = ['nombre'];

    public function ligas()
    {
        return $this->hasMany(Liga::class, 'idTemporada');
    }
}