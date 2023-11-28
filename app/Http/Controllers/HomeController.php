<?php

namespace App\Http\Controllers;

use App\Models\Cerradura;
use App\Models\Reservas;
use App\Models\Sala;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $reservasPorCiudad = Reservas::join('users', 'reservas.user_id', '=', 'users.id')
        ->join('provincias', 'users.provincia_id', '=', 'provincias.id')
        ->select('provincias.nombre as ciudad', DB::raw('count(*) as total_reservas'))
        ->groupBy('provincias.nombre')
        ->get();
        // dd($reservasPorCiudad);
        $cerradura=Cerradura::orderBy('id','asc')->first();
        // dd($cerradura);
        return view('home',compact('cerradura','reservasPorCiudad'));
    }
}
