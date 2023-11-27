<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincias extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'pais_id'];

    // Relación muchos a uno con Pais
    public function pais()
    {
        return $this->belongsTo(Pais::class, 'pais_id', 'id');
    }

    // Relación uno a muchos con User
    public function users()
    {
        return $this->hasMany(User::class, 'ciudad_id', 'id');
    }
}
