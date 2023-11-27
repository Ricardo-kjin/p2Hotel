<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use Illuminate\Http\Request;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paises = Pais::orderBy('id')->get();
        return view('paises.index', compact('paises'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paises.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
        ]);

        Pais::create($request->all());

        return redirect()->route('paises.index')->with('success', 'País creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pais $pais)
    {
        return view('paises.show', compact('pais'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $pais= Pais::find($id);
        // dd($pais);
        return view('paises.edit', compact('pais'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'nombre' => 'required|max:255',
        ]);
        $pais=Pais::findOrFail($id);
        $pais->update($request->all());
        // dd($pais);
        return redirect()->route('paises.index')->with('success', 'País actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $pais=Pais::findOrFail($id);
        // dd($pais);
        $pais->delete();
        return redirect()->route('paises.index')->with('success', 'País eliminado correctamente.');
    }
}
