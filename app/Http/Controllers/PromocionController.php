<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PromocionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Hacer una solicitud HTTP a la API para obtener las promociones
        $response = Http::get('https://mspromociones-production.up.railway.app/api/promociones');

        // Verificar si la solicitud fue exitosa (código de respuesta 200)
        if ($response->successful()) {
            // Decodificar el JSON de la respuesta
            $promociones = $response->json();

            // Pasar las promociones a la vista
            return view('promociones.index', ['promociones' => $promociones]);
        } else {
            // Manejar el caso en que la solicitud no sea exitosa
            return view('promociones.index', ['promociones' => []]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('promociones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos recibidos del formulario
        $request->validate([
            'nombre_promocion' => 'required|string',
            'fecha_ini' => 'required|date',
            'fecha_fin' => 'required|date',
            'descuento' => 'required|numeric',
            'descripcion' => 'required|string',
        ]);

        // Hacer una solicitud HTTP para insertar la nueva promoción
        $response = Http::post('https://mspromociones-production.up.railway.app/api/promociones', [
            'nombre_promocion' => $request->input('nombre_promocion'),
            'fecha_ini' => $request->input('fecha_ini'),
            'fecha_fin' => $request->input('fecha_fin'),
            'descuento' => $request->input('descuento'),
            'descripcion' => $request->input('descripcion'),
        ]);

        // Verificar si la inserción fue exitosa (código de respuesta 201)
        if ($response->status() == 201) {
            // Redirigir a la página de promociones con un mensaje de éxito
            return redirect('/promociones')->with('success', 'Promoción creada exitosamente');
        } else {
            // Redirigir con un mensaje de error si la inserción falló
            return redirect('/promociones')->with('error', 'Error al crear la promoción');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Hacer una solicitud HTTP para obtener los detalles de la promoción a editar
        $response = Http::get("https://mspromociones-production.up.railway.app/api/promociones/{$id}");

        // Verificar si la solicitud fue exitosa (código de respuesta 200)
        if ($response->successful()) {
            // Decodificar el JSON de la respuesta
            $promocion = $response->json();

            // Pasar la promoción a la vista de edición
            return view('promociones.edit', ['promocion' => $promocion]);
        } else {
            // Manejar el caso en que la solicitud no sea exitosa
            return redirect('/promociones')->with('error', 'Error al obtener los detalles de la promoción');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request,$id);
        // Validar los datos recibidos del formulario
        $request->validate([
            'nombre_promocion' => 'required|string',
            'fecha_ini' => 'required|date',
            'fecha_fin' => 'required|date',
            'descuento' => 'required|numeric',
            'descripcion' => 'required|string',
        ]);

        // Hacer una solicitud HTTP para actualizar la promoción
        $response = Http::put("https://mspromociones-production.up.railway.app/api/promociones/{$id}", [
            'nombre_promocion' => $request->input('nombre_promocion'),
            'fecha_ini' => $request->input('fecha_ini'),
            'fecha_fin' => $request->input('fecha_fin'),
            'descuento' => $request->input('descuento'),
            'descripcion' => $request->input('descripcion'),
        ]);

        // Verificar si la actualización fue exitosa (código de respuesta 200)
        if ($response->successful()) {
            // Redirigir a la página de promociones con un mensaje de éxito
            return redirect('/promociones')->with('success', 'Promoción actualizada exitosamente');
        } else {
            // Redirigir con un mensaje de error si la actualización falló
            return redirect('/promociones')->with('error', 'Error al actualizar la promoción');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         // Hacer una solicitud HTTP para eliminar la promoción
         $response = Http::delete("https://mspromociones-production.up.railway.app/api/promociones/{$id}");

         // Verificar si la eliminación fue exitosa (código de respuesta 204)
         if ($response->successful()) {
             // Redirigir a la página de promociones con un mensaje de éxito
             return redirect('/promociones')->with('success', 'Promoción eliminada exitosamente');
         } else {
             // Redirigir con un mensaje de error si la eliminación falló
             return redirect('/promociones')->with('error', 'Error al eliminar la promoción');
         }
    }
}
