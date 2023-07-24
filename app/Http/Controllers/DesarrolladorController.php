<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DesarrolladorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desarrolladors=User::desarrolladoresXAdmin(auth()->user()->id)->paginate(10);
        return view('desarrolladors.index',compact('desarrolladors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('desarrolladors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules=[
            'name'=>'required|min:3',
            'email'=>'required|email',
            'cedula'=>'required|digits:10',
            'address'=>'nullable|min:6',
            'phone'=>'required',
        ];
        $messages=[
            'name.required'=>'El Nombre del Desarrollador es obligatorio.',
            'name.min'=>'El Nombre del Desarrollador debe tener mas de 3 caracteres.',
            'email.required'=>'El Correo electrónico es obligatorio',
            'email.email'=>'Ingresa un correo electrónico válido.',
            'cedula.required'=>'La Cédula es obligatorio.',
            'cedula.digist'=>'La cédula debe tener 10 dígitos.',
            'address.min'=>'La dirección debe tener al menos 6 caracteres.',
            'phone.required'=>'El número de teléfono es obligatorio.',
        ];

        $this->validate($request,$rules,$messages);

        User::create(
            $request->only('name','email','cedula','address','phone')
            +[
                'role'=>'desarrollador',
                'admin_id'=>auth()->user()->id,
                'password'=> bcrypt($request->input('password'))
            ]
        );
        $notification='El desarrollador se ha registrado correctamente.';
        return redirect('/desarrolladores')->with(compact('notification'));

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
        $desarrollador=User::desarrolladoresXAdmin(auth()->user()->id)->findOrFail($id);
        return view('desarrolladors.edit',compact('desarrollador'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules=[
            'name'=>'required|min:3',
            'email'=>'required|email',
            'cedula'=>'required|digits:10',
            'address'=>'nullable|min:6',
            'phone'=>'required',
        ];
        $messages=[
            'name.required'=>'El Nombre del Desarrollador es obligatorio.',
            'name.min'=>'El Nombre del Desarrollador debe tener mas de 3 caracteres.',
            'email.required'=>'El Correo electrónico es obligatorio',
            'email.email'=>'Ingresa un correo electrónico válido.',
            'cedula.required'=>'La Cédula es obligatorio.',
            'cedula.digist'=>'La cédula debe tener 10 dígitos.',
            'address.min'=>'La dirección debe tener al menos 6 caracteres.',
            'phone.required'=>'El número de teléfono es obligatorio.',
        ];

        $this->validate($request,$rules,$messages);

        $user=User::desarrolladoresXAdmin(auth()->user()->id)->findOrFail($id);
        $data=$request->only('name','email','cedula','address','phone');
        $password=$request->input('password');

        if ($password) {
            $data['password']=bcrypt($password);
        }
        $user->fill($data);
        $user->save();
        $notification='El desarrollador se ha actualizado correctamente.';
        return redirect('/desarrolladores')->with(compact('notification'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user=User::desarrolladoresXAdmin(auth()->user()->id)->findOrFail($id);
        $desarrolladorName=$user->name;
        $user->delete();
        $notification="El desarrollador $desarrolladorName se eliminó correctamente";
        return redirect('/desarrolladores')->with(compact('notification'));
    }
}
