@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Salas</h3>
                </div>
                @if (auth()->user()->role=='admin')

                <div class="col text-right">
                    <a href="{{url('/salas/create')}}" class="btn btn-sm btn-primary"> Nueva Sala</a>
                </div>
                @endif
            </div>
        </div>
        <div class="card-body">
            @if (session('notification'))
            <div class="alert alert-success" role="alert">
                 {{session('notification')}}
            </div>
            @endif
        </div>
        <div class="table-responsive">
            <!-- Projects table -->
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Description</th>
                        <th scope="col">Creador del Proyecto</th>
                        <th scope="col">Numero de integrantes</th>
                        <th scope="col">Opciones</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($salas as $sala)

                    <tr>
                        <th scope="row">
                            {{$sala->nombre}}
                        </th>
                        <td>
                            {{$sala->description}}
                        </td>
                        <td>
                            {{$sala->user->name}}
                        </td>
                        <td>
                            {{$sala->users()->count()}}
                        </td>
                        <td>
                            <form action="{{url('/salas/'.$sala->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                @if (auth()->user()->role=='admin')
                                    <a href="{{url('/salas/'.$sala->id.'/edit')}}" class="btn btn-sm btn-primary">Editar</a>
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>

                                @endif
                                    <a href="http://localhost:8080/diagramador?username={{str_replace(" ","_",trim(auth()->user()->name))}}&room=Sala1" class="btn btn-sm btn-primary" target="_blank">Entrar sala</a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
