<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use App\Models\Provincias;
use App\Models\User;
use Illuminate\Http\Request;

class RecepcionistaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recepcionistas = User::recepcionistas()->get();
        // dd($recepcionistas);
        return view('recepcionistas.index', compact('recepcionistas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paises = Pais::all();
        return view('recepcionistas.create', compact('paises'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            // 'password' => 'required|string|min:8',
            'cedula' => 'required|string|max:10',
            'phone' => 'required|string|max:25',
            'role' => 'required|string|in:recepcionista',
            'provincia_id' => 'required',
        ]);

        User::create($request->all());

        return redirect()->route('recepcionistas.index')->with('success', 'Usuario creado exitosamente');
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
        $user= User::findOrFail($id);
        $ciudadesProvincias = Provincias::all();
        $paises = Pais::all();
        // dd($ciudadesProvincias,$user->provincia->nombre);
        return view('recepcionistas.edit', compact('user','paises', 'ciudadesProvincias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user= User::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            // 'password' => 'nullable|string|min:8',
            'cedula' => 'required|string|max:10',
            'phone' => 'required|string|max:25',
            'role' => 'required|string|in:recepcionista',
            'provincia_id' => 'required',
        ]);
        // dd($request);
        $user->update($request->all());
        // dd($user);
        return redirect()->route('recepcionistas.index')->with('success', 'Usuario actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user= User::findOrFail($id);

        $user->delete();

        return redirect()->route('recepcionistas.index')->with('success', 'Usuario eliminado exitosamente');
    }

    public function getCiudadesProvincias(Request $request)
    {
        $ciudadesProvincias = Provincias::where('pais_id', $request->pais_id)->get();
        return response()->json($ciudadesProvincias);
    }
}
