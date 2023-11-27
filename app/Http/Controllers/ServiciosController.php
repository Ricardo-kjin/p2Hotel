<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Hacer una solicitud a la API
        $response = Http::get('https://hotel-servicios.onrender.com/api/servicios');

        // Decodificar la respuesta JSON
        $servicios = $response->json();
        // dd($servicios);
        // dd(count($servicios['servicios']));

        // Pasar los datos a la vista
        return view('servicios.index', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('servicios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Lógica para validar y guardar el nuevo servicio en la API
        $response = Http::post('https://hotel-servicios.onrender.com/api/servicios', [
            'nombre' => $request->input('nombre'),
            'precio' => $request->input('precio'),
            // Otros campos necesarios
        ]);

        // Verifica la respuesta y maneja errores según sea necesario

        // Redirecciona a la lista de servicios después de crear uno nuevo
        return redirect('/servicios')->with('success', 'Servicio creado exitosamente');
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
        // dd($id);
        $response = Http::get("https://hotel-servicios.onrender.com/api/servicios/{$id}");
        $servicio = $response->json();
        // dd($servicio);
        return view('servicios.edit', compact('servicio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->input('nombre'));
        // Lógica para validar y actualizar el servicio en la API
        $response = Http::patch("https://hotel-servicios.onrender.com/api/servicios/{$id}", [
            'nombre' => $request->input('nombre'),
            'precio' => $request->input('precio'),
            // Otros campos necesarios
        ]);
        // dd($response->successful());
        // Verifica la respuesta y maneja errores según sea necesario

        // Redirecciona a la lista de servicios después de actualizar uno existente
        return redirect('/servicios')->with('success', 'Servicio actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
            // Lógica para eliminar el servicio en la API
    $response = Http::delete("https://hotel-servicios.onrender.com/api/servicios/{$id}");

    // Verifica la respuesta y maneja errores según sea necesario

    // Redirecciona a la lista de servicios después de eliminar uno existente
    return redirect('/servicios')->with('success', 'Servicio eliminado exitosamente');
    }
}
