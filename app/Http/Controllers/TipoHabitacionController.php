<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TipoHabitacionController extends Controller
{

    public function index()
    {
        try {
            $response = Http::get('https://habitaciones.proyeapp.xyz/api/tipo_habitaciones');
            $data = $response->json();

            // Aquí puedes devolver la vista con los datos o realizar cualquier otra acción
            return view('tipo_habitacion.index', ['tiposHabitacion' => $data]);
        } catch (\Exception $e) {
            // Manejar errores
            return view('tipo_habitacion.error', ['error' => $e->getMessage()]);
        }
    }

    public function create()
    {
        return view('tipo_habitacion.create');
    }

    public function store(Request $request)
    {
            // Prepara los datos para la solicitud a la API
            $datosParaAPI = [
                'nombre' => $request->input('nombre'),
                'descripcion' => $request->input('descripcion'),
            ];
            $response = Http::post('https://habitaciones.proyeapp.xyz/api/tipo_habitaciones/', $datosParaAPI);
            // Puedes manejar la respuesta según tus necesidades
            if ($response->successful()) {
                return redirect('/tipos-habitacion')->with('success', 'Tipo de habitación creado correctamente');
            } else {
                // Puedes imprimir información sobre el error
                return redirect('/tipos-habitacion')->with('success', 'Error no se pudo registrar el tipo de habitacion');
            }
    }
    public function edit($id)
    {
        try {
            $response = Http::get("https://habitaciones.proyeapp.xyz/api/tipo_habitaciones/{$id}/");
            $tipoHabitacion = $response->json();

            return view('tipo_habitacion.edit', ['tipoHabitacion' => $tipoHabitacion]);
        } catch (\Exception $e) {
            // Manejar errores
            return redirect('/tipos-habitacion')->with('success', 'Error no se pudo obtener el tipo de habitacion');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
            'descripcion' => 'required|string|max:250',
        ]);

        try {
            $response = Http::put("https://habitaciones.proyeapp.xyz/api/tipo_habitaciones/{$id}/", [
                'nombre' => $request->input('nombre'),
                'descripcion' => $request->input('descripcion'),
            ]);

            // Puedes manejar la respuesta según tus necesidades

            return redirect('/tipos-habitacion')->with('success', 'Tipo de habitación actualizado correctamente');
        } catch (\Exception $e) {
            // Manejar errores
            return view('tipo_habitacion.error', ['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        // dd($id);
        try {
            $response = Http::delete("https://habitaciones.proyeapp.xyz/api/tipo_habitaciones/{$id}/");

            // Puedes manejar la respuesta según tus necesidades

            return redirect('/tipos-habitacion')->with('success', 'Tipo de habitación eliminado correctamente');
        } catch (\Exception $e) {
            // Manejar errores
            return view('tipo_habitacion.error', ['error' => $e->getMessage()]);
        }
    }

}
