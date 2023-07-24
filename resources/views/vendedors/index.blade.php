@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">vendedores</h3>
                </div>
                <div class="col text-right">
                    <a href="{{url('/vendedores/create')}}" class="btn btn-sm btn-primary">Nuevo vendedor</a>
                </div>
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
                        <th scope="col">Correo</th>
                        <th scope="col">Cedula</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Admin_id</th>
                        <th scope="col">Opciones</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($vendedors as $vendedor)

                    <tr>
                        <th scope="row">
                            {{$vendedor->name}}
                        </th>
                        <td>
                            {{$vendedor->email}}
                        </td>
                        <td>
                            {{$vendedor->cedula}}
                        </td>
                        <td>
                            {{$vendedor->role}}
                        </td>
                        <td>
                            {{$vendedor->admin_id}}
                        </td>
                        <td>
                            <form action="{{url('/vendedores/'.$vendedor->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{url('/vendedores/'.$vendedor->id.'/edit')}}" class="btn btn-sm btn-primary">Editar</a>
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-body">
            {{$vendedors->links()}}
        </div>
    </div>
@endsection

