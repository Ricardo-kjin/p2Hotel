<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    use HasFactory;


    public function ubicacions(){
        return $this->belongsToMany(Ubicacion::class, 'ruta_ubicacion')->withPivot('id', 'fecha_ini', 'fecha_fin', 'estado_visita');;
    }

    public function user(){
        $this->belongsTo(User::class);
    }
}
