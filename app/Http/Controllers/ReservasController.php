<?php

namespace App\Http\Controllers;

use App\Models\DetalleHabitacion;
use App\Models\DetalleServicios;
use App\Models\Pais;
use App\Models\Reservas;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $habitaciones = Http::get('https://habitaciones.proyeapp.xyz/api/habitaciones')->json();
        $servicios = Http::get('https://hotel-servicios.onrender.com/api/servicios')->json();



        $paises = Pais::all();// obtenerPaises(); // Función para obtener la lista de países
        //$habitaciones = obtenerHabitaciones(); // Función para obtener datos de habitaciones (API)
        //$servicios = obtenerServicios(); // Función para obtener datos de servicios (API)

        return view('reservas.create', compact('paises', 'habitaciones', 'servicios'));
        // return view('reservas.create', compact('paises'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // Validación de datos del cliente
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:50',
            'cedula' => 'required|string|max:10',
            'phone' => 'required|string|max:25',
            'provincia_id' => 'required',
            // 'habitacion_id' => 'required|exists:habitaciones,id',
            // 'servicio_id' => 'required|exists:servicios,id',
            'codigo_reserva' => 'required|string',
            'nro_ocupantes' => 'required',
            // ... otros campos de la reserva ...
        ]);

        // Crear el cliente en la base de datos
        $cliente = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'cedula' => $request->input('cedula'),
            'phone' => $request->input('phone'),
            'role' => 'cliente',
            'provincia_id' => $request->input('provincia_id'),
            'password' => $request->input('cedula'),
            'user_id' => auth()->user()->id,
        ]);

        // Crear la reserva en la base de datos
        $reserva = Reservas::create([
            // 'user_id' => auth()->user()->id,
            'codigo_reserva' => $request->input('codigo_reserva'),
            'descuento' => 10,
            'Total' => 0,
            'nro_ocupantes' => $request->input('nro_ocupantes'),
            'user_id' => $cliente->id,

            // ... otros campos de la reserva ...
        ]);

        $fechaInicio = Carbon::createFromFormat('Y-m-d', $request->input('fecha_ini_habitacion'));
        $fechaFin = Carbon::createFromFormat('Y-m-d', $request->input('fecha_fin_habitacion'));

        // Verificar que las fechas sean válidas
        if (!$fechaInicio || !$fechaFin) {
            return redirect()->back()->with('error', 'Fechas inválidas');
        }

        // Calcular la diferencia en días
        $diferenciaEnDias = $fechaInicio->diffInDays($fechaFin);

        //precio habitacion
        $precioHabitacion= Http::get("https://habitaciones.proyeapp.xyz/api/habitaciones/{$request->input('habitacion')}/")->json();

        // Crear el detalle de habitación y servicio
        $detalleHabitacion= DetalleHabitacion::create([
            'reserva_id' => $reserva->id,
            'fecha_ini'=> $request->input('fecha_ini_habitacion'),
            'fecha_fin'=> $request->input('fecha_fin_habitacion'),
            'precio'=> $precioHabitacion['precio'],
            'cantidad'=>$diferenciaEnDias,
            'subtotal'=>$precioHabitacion['precio']*$diferenciaEnDias,
            'producto_id' => $request->input('habitacion'),
            // 'precio' => obtenerPrecioHabitacion($request->input('habitacion_id')), // Función para obtener el precio de la habitación (API)
            // ... otros campos del detalle de habitación ...
        ]);

        $fechaInicioServ = Carbon::createFromFormat('Y-m-d', $request->input('fecha_ini_servicio'));
        $fechaFinServ = Carbon::createFromFormat('Y-m-d', $request->input('fecha_fin_servicio'));

        // Verificar que las fechas sean válidas
        if (!$fechaInicioServ || !$fechaFinServ) {
            return redirect()->back()->with('error', 'Fechas inválidas');
        }

        // Calcular la diferencia en días
        $diferenciaEnDiasServ = $fechaInicioServ->diffInDays($fechaFinServ);

        //precio habitacion
        $precioServicio= Http::get("https://hotel-servicios.onrender.com/api/servicios/{$request->input('servicio')}")->json();
        // dd($precioServicio);
        // SE AÑADE UN FOR

        $detalleServicio=DetalleServicios::create([
            'reserva_id' => $reserva->id,
            'fecha_ini'=>$request->input('fecha_ini_servicio'),
            'fecha_fin'=>$request->input('fecha_fin_servicio'),
            'precio'=>$precioServicio['servicio']['precio'],
            'cantidad'=>$diferenciaEnDiasServ,
            'subtotal'=>$precioServicio['servicio']['precio']*$diferenciaEnDiasServ,

            'servicio_id' => $request->input('servicio'),
            // 'precio' => obtenerPrecioServicio($request->input('servicio_id')), // Función para obtener el precio del servicio (API)
            // ... otros campos del detalle de servicio ...
        ]);

        // Calcular descuento y actualizar el total de la reserva
        // $descuento = calcularDescuento($reserva); // Función para calcular el descuento
        $descuento = 10; // Función para calcular el descuento
        $reserva->descuento = $descuento;

        $reserva->Total = ($detalleHabitacion->subtotal+$detalleServicio->subtotal)*$descuento/100; // Función para calcular el total de la reserva
        $reserva->save();

        return redirect('/reservas/create')
            ->with('success', 'Reserva creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservas $reservas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservas $reservas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservas $reservas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservas $reservas)
    {
        //
    }
}
