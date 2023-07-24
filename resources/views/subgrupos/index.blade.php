@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">subgrupos</h3>
                </div>
                @if (auth()->user()->role=='admin')

                <div class="col text-right">
                    <a href="{{url('/subgrupos/create')}}" class="btn btn-sm btn-primary"> Nueva subgrupo</a>
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
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Nombre Grupo</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subgrupos as $subgrupo)

                    <tr>
                        <th scope="row">
                            {{$subgrupo->id}}
                        </th>
                        <th scope="row">
                            {{$subgrupo->nombre}}
                        </th>
                        <th scope="row">
                            {{$subgrupo->descripcion}}
                        </th>
                        <th scope="row">
                            {{$subgrupo->grupo->nombre}}
                        </th>
                        <td>
                            <form action="{{url('/subgrupos/'.$subgrupo->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                @if (auth()->user()->role=='admin')
                                    <a href="{{url('/subgrupos/'.$subgrupo->id.'/edit')}}" class="btn btn-sm btn-primary">Editar</a>
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>

                                @endif
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
