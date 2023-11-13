@extends('layouts.panel')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card my-1">
            <div class="card-header p-0 position-relative mt-n4 mx-2 z-index-2">
                <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">SUBGRUPOS</h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="card-body">
                  @if (session('notification'))
                    <div class="alert alert-success alert-dismissible text-white fade show" role="alert">
                        <span class="alert-icon align-middle">
                          <span class="material-icons text-md">
                          thumb_up_off_alt
                          </span>
                        </span>
                        <span class="alert-text">¡ {{session('notification')}} !</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                  @endif
                </div>
                <div class="card-body d-flex justify-content-end pt-0 bt-0 mt-0">
                  <a href="{{ url('/subgrupos/create') }}" class="btn btn-icon btn-3 btn-success" role="button" aria-pressed="true">
                      <span class="btn-inner--icon"><i class="material-icons">queue</i></span>
                      <span class="btn-inner--text">Agregar Nuevo</span>
                  </a>
                </div>
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nº
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    NOMBRE</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    DESCRIPCION</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    GRUPO</th>
                                <th class="text-secondary opacity-7">OPCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subgrupos as $subgrupo)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            {{-- <div>
                                                <img src="{{asset('img/team-2.jpg')}}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                            </div> --}}
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $subgrupo->id }}</h6>
                                                {{-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> --}}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <p class="text-xs font-weight-bold mb-0 ">{{ $subgrupo->nombre }}</p>
                                        {{-- <p class="text-xs text-secondary mb-0">Organization</p> --}}
                                    </td>
                                    <td class="align-middle text-sm">
                                        <p class="text-xs font-weight-bold mb-0 ">{{ $subgrupo->descripcion }}</p>
                                        {{-- <p class="text-xs text-secondary mb-0">Organization</p> --}}
                                    </td>
                                    <td class="align-middle text-sm">
                                        <p class="text-xs font-weight-bold mb-0 ">{{ $subgrupo->grupo->nombre }}</p>
                                        {{-- <p class="text-xs text-secondary mb-0">Organization</p> --}}
                                    </td>
                                    <td class="align-middle">
                                      <a href="{{url('/subgrupos/'.$subgrupo->id.'/edit')}}" class="text-warning font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                        <span class="alert-icon align-middle">
                                          <span class="material-icons text-md">
                                            edit
                                          </span>
                                        </span>
                                        Editar
                                      </a>
                                      {{-- <form action="{{URL('/subgrupos/'.$subgrupo->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                      </form> --}}
                                      <a href="#" class="text-danger font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user" onclick="event.preventDefault(); document.getElementById('eliminarRegistroForm').submit();">
                                        <span class="alert-icon align-middle">
                                          <span class="material-icons text-md">
                                            delete
                                          </span>
                                        </span>
                                        Eliminar
                                      </a>
                                        <!-- Formulario oculto para enviar la solicitud DELETE -->
                                      <form action="{{ URL('/subgrupos/'.$subgrupo->id) }}" method="POST" id="eliminarRegistroForm" style="display: none;">
                                          @csrf
                                          @method('DELETE')
                                      </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


    <div class="card shadow" hidden>
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
