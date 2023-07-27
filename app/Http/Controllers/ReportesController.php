<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function reportesprom()
    {
        $vendedores = User::where('role', 'vendedor')->get();

        // Calcular el promedio de días de visita para cada vendedor
        foreach ($vendedores as $vendedor) {
            $promedioDias = $vendedor->rutas->avg(function ($ruta) {
                return $ruta->ubicacions->avg(function ($ubicacion) {
                    $fechaInicio = Carbon::createFromFormat('Y-m-d', $ubicacion->pivot->fecha_ini);
                    $fechaFin = Carbon::createFromFormat('Y-m-d', $ubicacion->pivot->fecha_fin);

                // Calcular la diferencia de días
                return $fechaFin->diffInDays($fechaInicio);
                });
            });

            $vendedor->promedio_dias_visita = $promedioDias;
            // dd($vendedor->promedio_dias_visita);
        }
        // dd($vendedores);
        // Pasar los datos a la vista
        return view('reportes.reporteprom', compact('vendedores'));
    }
}
