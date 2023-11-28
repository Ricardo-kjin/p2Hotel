<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleHabitacion extends Model
{
    use HasFactory;
    protected $table = 'detalle_habitacions';
    protected $fillable = ['fecha_ini', 'fecha_fin', 'precio', 'cantidad', 'subtotal', 'reserva_id','producto_id'];


    public function reserva()
    {
        return $this->belongsTo(Reservas::class, 'reservas_id', 'id');
    }
}
