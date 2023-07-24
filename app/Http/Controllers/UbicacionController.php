<?php

namespace App\Http\Controllers;

use App\Models\Ubicacion;
use App\Models\User;
use Illuminate\Http\Request;

class UbicacionController extends Controller
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
    public function create(string $user_id)
    {
        $user=User::find($user_id);
        return view('ubicaciones.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules=[
            'latitud'=>'required',
            'longitud'=>'required',
            'url_map'=>'required',
        ];

        $messages=[
            'latitud.required'=>'La latitud de la ubicacion es obligatorio',
            'longitud.required'=>'La logitud de la ubicacion es obligatorio',
            'url_map.required'=>'El campo Url de la ubicacion es obligatorio',
        ];

        $this->validate($request,$rules,$messages);
        $producto= new Ubicacion();
        $producto->latitud= $request->input('latitud');
        $producto->longitud= $request->input('longitud');
        $producto->url_map= $request->input('url_map');
        $producto->estado= "Activo";
        $producto->user_id= $request->input('user_id');
        // dd($producto);
        // dd($producto,$request);
        $producto->save();
        $notification='La ubicacion ha sido creada correctamente';

        return redirect('/clientes')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Ubicacion $ubicacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $user_id)
    {
        $user=User::find($user_id)->ubicacion()->first();
        return view('ubicaciones.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ubicacion $ubicacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ubicacion $ubicacion)
    {
        //
    }

}
