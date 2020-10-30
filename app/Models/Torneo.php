<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    const TEMPORADAS = ["Verano","Apertura","Clausura"];
    const GENEROS = ["Hombres","Ladies"];
    const MODOS = ["F5","F8","F11"];
    use HasFactory;
    protected $table = "torneos";

    /**
     * obtener la lista de equipos que compiten en un torneo
     */
    public function equipos() {
        return $this->hasMany('App\Models\Equipo')->orderBy('nombre');
    }

    /**
     * obtener la lista de partidos que pertenecen a un torneo
     */
    public function partidos() {
        return $this->hasMany('App\Models\Partido')->orderByDesc('fecha');
    }

}
