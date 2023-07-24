<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use App\Models\User;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class SalasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=User::findOrfail(auth()->user()->id);
        if (auth()->user()->role=='admin') {
            $salas=$user->userSalas()->get();
        } else {
            $salas=$user->salas()->get();
        }
        // dd($user->userSalas()->get());
        return view('salas.index',compact('salas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users=User::desarrolladoresXAdmin(auth()->user()->id)->get();
        return view('salas.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->users);
        $rules=[
            'nombre'=>'required|min:3',
        ];

        $messages=[
            'nombre.required'=>'El nombre de la sala es obligatorio',
            'nombre.min'=>'El nombre de la sala debe tener más de 3 carácteres',
        ];

        $this->validate($request,$rules,$messages);
        $sala= new Sala();
        $sala->nombre= $request->input('nombre');
        $sala->description= $request->input('description');
        $sala->url='http://localhost:8080/diagramador?username='.str_replace(" ","_",trim(auth()->user()->name)).'&room='.str_replace(" ","_",trim($request->input('nombre')));
        $sala->content="";
        $sala->user_id=auth()->user()->id;
        // dd($sala);
        $sala->save();
        $sala->users()->attach($request->input('users'));
        $notification='La Sala ha sido creada correctamente';

        return redirect('/salas')->with(compact('notification'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Sala $sala)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sala $sala)
    {
        // dd($sala);
        $users=User::desarrolladoresXAdmin(auth()->user()->id)->get();
        $users_ids=$sala->users()->pluck('users.id');
        // dd($users_ids);
        return view('salas.edit',compact('sala','users','users_ids'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sala $sala)
    {
        $rules=[
            'nombre'=>'required|min:3',
        ];

        $messages=[
            'nombre.required'=>'El nombre de la sala es obligatorio',
            'nombre.min'=>'El nombre de la sala debe tener más de 3 carácteres',
        ];

        $this->validate($request,$rules,$messages);

        $sala->nombre= $request->input('nombre');
        $sala->description= $request->input('description');
        $sala->save();
        $sala->users()->sync($request->input('users'));
        $notification='La Sala se ha actualizado correctamente';

        return redirect('/salas')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sala $sala)
    {
        $users_ids=$sala->users()->pluck('users.id');
        // dd(json_encode($users_ids));
        $sala->users()->detach($users_ids);

        $sala->delete();
        $notification='La Sala se ha eliminado correctamente';

        return redirect('/salas')->with(compact('notification'));
    }
}
