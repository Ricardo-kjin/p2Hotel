<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HabitacionController extends Controller
{
    public function index()
    {
        try {
            $response = Http::get('https://habitaciones.proyeapp.xyz/api/habitaciones');
            $habitaciones = $response->json();

            return view('habitaciones.index', ['habitaciones' => $habitaciones]);
        } catch (\Exception $e) {
            // Manejar errores
            return view('habitacion.error', ['error' => $e->getMessage()]);
        }
    }

    public function create()
    {
        // Puedes cargar los tipos de habitaciones desde la API si es necesario
        $response = Http::get('https://habitaciones.proyeapp.xyz/api/tipo_habitaciones');
        $tiposHabitacion = $response->json();

        return view('habitaciones.create', ['tiposHabitacion' => $tiposHabitacion]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nro_habitacion' => 'required|string|max:50',
            'tipo_habitacion' => 'required|numeric',
            'precio' => 'required|numeric',
            'codigo_cerradura' => 'nullable|string|max:50',
            'estado_cerradura' => 'nullable|string|max:50',
            'estado_habitacion' => 'nullable|string|max:50',
            'caracteristicas' => 'nullable|string|max:250',
        ]);

        try {
            $response = Http::post('https://habitaciones.proyeapp.xyz/api/habitaciones/', [
                'nro_habitacion' => $request->input('nro_habitacion'),
                'tipo_habitacion' => $request->input('tipo_habitacion'),
                'precio' => $request->input('precio'),
                'codigo_cerradura' => $request->input('codigo_cerradura'),
                'estado_cerradura' => $request->input('estado_cerradura'),
                'estado_habitacion' => $request->input('estado_habitacion'),
                'caracteristicas' => $request->input('caracteristicas'),
            ]);

            // Puedes manejar la respuesta según tus necesidades

            return redirect('/habitaciones')->with('success', 'Habitación creada correctamente');
        } catch (\Exception $e) {
            // Manejar errores
            return view('habitacion.error', ['error' => $e->getMessage()]);
        }
    }


    public function edit($id)
    {
        try {
            // Obtén la información de la habitación para editar
            $responseHabitacion = Http::get("https://habitaciones.proyeapp.xyz/api/habitaciones/{$id}/");
            $habitacion = $responseHabitacion->json();

            // Puedes cargar los tipos de habitaciones desde la API si es necesario
            $responseTiposHabitacion = Http::get('https://habitaciones.proyeapp.xyz/api/tipo_habitaciones');
            $tiposHabitacion = $responseTiposHabitacion->json();

            return view('habitaciones.edit', ['habitacion' => $habitacion, 'tiposHabitacion' => $tiposHabitacion]);
        } catch (\Exception $e) {
            // Manejar errores
            return view('habitaciones.error', ['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nro_habitacion' => 'required|string|max:50',
            'tipo_habitacion' => 'required|numeric',
            'precio' => 'required|numeric',
            'codigo_cerradura' => 'nullable|string|max:50',
            'estado_cerradura' => 'nullable|string|max:50',
            'estado_habitacion' => 'nullable|string|max:50',
            'caracteristicas' => 'nullable|string|max:250',
        ]);

        try {
            $response = Http::put("https://habitaciones.proyeapp.xyz/api/habitaciones/{$id}/", [
                'nro_habitacion' => $request->input('nro_habitacion'),
                'tipo_habitacion' => $request->input('tipo_habitacion'),
                'precio' => $request->input('precio'),
                'codigo_cerradura' => $request->input('codigo_cerradura'),
                'estado_cerradura' => $request->input('estado_cerradura'),
                'estado_habitacion' => $request->input('estado_habitacion'),
                'caracteristicas' => $request->input('caracteristicas'),
            ]);

            // Puedes manejar la respuesta según tus necesidades

            return redirect('/habitaciones')->with('success', 'Habitación actualizada correctamente');
        } catch (\Exception $e) {
            // Manejar errores
            return view('habitacion.error', ['error' => $e->getMessage()]);
        }
    }
    public function destroy($id)
    {
        try {
            $response = Http::delete("https://habitaciones.proyeapp.xyz/api/habitaciones/{$id}/");

            // Puedes manejar la respuesta según tus necesidades

            return redirect('/habitaciones')->with('success', 'Habitación eliminada correctamente');
        } catch (\Exception $e) {
            // Manejar errores
            return view('habitacion.error', ['error' => $e->getMessage()]);
        }
    }

}
