<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    use HasFactory;

    protected $fillable = ['codigo_reserva','descuento', 'Total','nro_ocupantes', 'user_id'];

    public function recepcionista()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function cliente()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function detalleHabitacions()
    {
        return $this->hasMany(DetalleHabitacion::class,'reserva_id','id');
    }

    public function detalleServicios()
    {
        return $this->hasMany(DetalleServicios::class, 'reserva_id', 'id');
    }

    public function calcularTotal()
    {
        $subtotalHabitaciones = $this->detalleHabitacion->sum('subtotal');
        $subtotalServicios = $this->detalleServicios->sum('subtotal');

        $totalSinDescuento = $subtotalHabitaciones + $subtotalServicios;
        $descuento = $totalSinDescuento * ($this->descuento / 100);
        $totalConDescuento = $totalSinDescuento - $descuento;

        return $totalConDescuento;
    }
}
