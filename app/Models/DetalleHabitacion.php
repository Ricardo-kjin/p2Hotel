<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleHabitacion extends Model
{
    use HasFactory;

    protected $fillable = ['fecha_ini', 'fecha_fin', 'precio', 'cantidad', 'subtotal'];

    public function reserva()
    {
        return $this->belongsTo(Reservas::class, 'reserva_id', 'id');
    }
}
