<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    // Relación uno a muchos con Ciudad_provincia
    public function ciudadesProvincias()
    {
        return $this->hasMany(Provincias::class, 'pais_id', 'id');
    }
}
