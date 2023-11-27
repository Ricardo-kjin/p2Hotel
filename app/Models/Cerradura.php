<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cerradura extends Model
{
    use HasFactory;

    protected $fillable = [
        'cantidad_veces_abierto',
        'cantidad_veces_cerrado',
    ];
}
