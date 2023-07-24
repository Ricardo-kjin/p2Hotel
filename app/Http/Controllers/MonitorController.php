<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MonitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $monitors=User::monitorsXAdmin(auth()->user()->id)->paginate(10);
        return view('monitors.index',compact('monitors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('monitors.create');
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
            'name.required'=>'El Nombre del monitor es obligatorio.',
            'name.min'=>'El Nombre del monitor debe tener mas de 3 caracteres.',
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
                'role'=>'monitor',
                'admin_id'=>auth()->user()->id,
                'password'=> bcrypt($request->input('password'))
            ]
        );
        $notification='El monitor se ha registrado correctamente.';
        return redirect('/monitores')->with(compact('notification'));
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
        $monitor=User::monitorsXAdmin(auth()->user()->id)->findOrFail($id);
        // dd($monitor);
        return view('monitors.edit',compact('monitor'));
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
            'name.required'=>'El Nombre del monitor es obligatorio.',
            'name.min'=>'El Nombre del monitor debe tener mas de 3 caracteres.',
            'email.required'=>'El Correo electrónico es obligatorio',
            'email.email'=>'Ingresa un correo electrónico válido.',
            'cedula.required'=>'La Cédula es obligatorio.',
            'cedula.digist'=>'La cédula debe tener 10 dígitos.',
            'address.min'=>'La dirección debe tener al menos 6 caracteres.',
            'phone.required'=>'El número de teléfono es obligatorio.',
        ];

        $this->validate($request,$rules,$messages);

        $user=User::monitorsXAdmin(auth()->user()->id)->findOrFail($id);
        $data=$request->only('name','email','cedula','address','phone');
        $password=$request->input('password');
        if ($password) {
            $data['password']=bcrypt($password);
        }
        $user->fill($data);
        $user->save();
        $notification='El monitor se ha actualizado correctamente.';
        return redirect('/monitores')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user=User::monitorsXAdmin(auth()->user()->id)->findOrFail($id);
        $monitorName=$user->name;
        $user->delete();
        $notification="El monitor $monitorName se eliminó correctamente";
        return redirect('/monitores')->with(compact('notification'));
    }
}
