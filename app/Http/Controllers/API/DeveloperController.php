<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Sala;
use App\Models\User;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function obtenerUSer(string $user)
    {
        $data=User::where('name','like','%'.str_replace("_"," ",trim($user)).'%')->get()->first();
        $data->name=str_replace(" ","_",$data->name);
        // dd($data);
        if ($data->name) {
            return response()->json([
                'res'=> true,
                'data'=>$data,
                'status'=>200,
            ],200);
        }
        return response()->json([
            'res'=> true,
            'data'=>$data,
            'status'=>200,
        ],200);
    }
    public function cargarProy(string $room)
    {
        // dd($room);
        $data=Sala::where("nombre",$room)->get()->first();
        // dd($data);
        // dd($data->nombre);
        if ($data->nombre) {
            return response()->json([
                'res'=> true,
                'data'=>$data,
                'status'=>200,
            ],200);
        }
        return response()->json([
            'res'=> true,
            'data'=>$data,
            'status'=>200,
        ],200);
    }
    public function guardar(Request $request, string $id) {
        // dd('Hola atodos');
        $sala=Sala::where('nombre','=',$id)->get()->first();
        if ($sala) {
            $sala->update([
                'content'=>$request->content,
            ]);
            return $request;
        }
        return $request;
        // return $request;
    }
}
