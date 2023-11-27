<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use App\Models\Provincias;
use Illuminate\Http\Request;

class ProvinciasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ciudades = Provincias::orderBy('id')->get();
        return view('ciudades.index', compact('ciudades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paises = Pais::all();
        return view('ciudades.create', compact('paises'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'nombre' => 'required|max:255',
            'pais_id' => 'required',
        ]);

        Provincias::create($request->all());

        return redirect()->route('provincias.index')->with('success', 'Ciudad/Provincia creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Provincias $provincias)
    {
        return view('ciudades.show', compact('ciudadProvincia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $provincia=Provincias::findOrFail($id);
        $paises = Pais::all();
        return view('ciudades.edit', compact('provincia', 'paises'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {

        $request->validate([
            'nombre' => 'required|max:255',
            'pais_id' => 'required',
        ]);

        $provincias= Provincias::findOrFail($id);
        $provincias->update($request->all());

        return redirect()->route('provincias.index')->with('success', 'Ciudad/Provincia actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $provincia= Provincias::findOrFail($id);
        // dd($provincia);
        $provincia->delete();
        return redirect()->route('provincias.index')->with('success', 'Ciudad/Provincia eliminada correctamente.');
    }
}
