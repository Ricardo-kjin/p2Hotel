<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RutaUbicacion extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha_ini',
        'fecha_fin',
        'estado_visita',
    ];
}
