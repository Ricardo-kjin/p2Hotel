<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    use HasFactory;


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function rutas(){
        return $this->belongsToMany(Ruta::class, 'ruta_ubicacion')->withPivot('id', 'fecha_ini', 'fecha_fin', 'estado_visita');;
    }
}
