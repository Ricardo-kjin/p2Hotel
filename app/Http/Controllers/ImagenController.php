<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use Illuminate\Http\Request;

class ImagenController extends Controller
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
        $imagen = Imagen::where('user_id',auth()->user()->id)->first();
        // dd($imagen);
        // dd($imagen);
        return view('imagenes.create', compact('imagen'));
        // return view('imagenes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // Lógica para validar y guardar la imagen en la base de datos
        // Aquí deberías verificar que el usuario tiene el rol correcto antes de permitir la acción.

        $user = auth()->user();

        // Verificar el rol del usuario
        if ($user->role == 'cliente') {
            // Validar y guardar la imagen
            $request->validate([
                'url_imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $path=$request->file('url_imagen')->storeAs('public/imagenes',request('url_imagen')->getClientOriginalName());
            $imagen = new Imagen();
            $imagen->url_imagen = request('url_imagen')->getClientOriginalName(); // Almacenar la imagen en la carpeta 'public/imagenes'
            $imagen->user_id = $user->id;
            $imagen->save();

            return redirect()->back()->with('success', 'Imagen subida correctamente.');
        } else {
            return redirect()->back()->with('error', 'No tienes permisos para subir imágenes.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Imagen $imagen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Imagen $imagen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Imagen $imagen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Imagen $imagen)
    {
        //
    }
}
