<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Partido extends Model
{
    use HasFactory;
    protected $table = "partidos";  
    

    public function torneo() {
        return $this->belongsTo('App\Models\Torneo');
    }

    public function local() {
        return $this->belongsTo('App\Models\Equipo','equipo1_id');
    }

    public function visitante() {
        return $this->belongsTo('App\Models\Equipo','equipo2_id');
    }

    public function sede() {
        return $this->belongsTo('App\Models\Sede','sede_id');
    }

    //accessors
    public function getFechaAttribute($value){
        return Carbon::parse($value);//->format('d/m/Y');
    }

    public function getHoraAttribute($value) {
        return Carbon::parse($value)->format('H:i');
    }
     
}
