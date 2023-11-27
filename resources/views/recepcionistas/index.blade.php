@extends('layouts.panel')

@section('content')


    <div class="row">
      <div class="col-12">
          <div class="card my-1">
              <div class="card-header p-0 position-relative mt-n4 mx-2 z-index-2">
                  <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                      <h6 class="text-white text-capitalize ps-3">RECEPCIONISTAS</h6>
                  </div>
              </div>
              <div class="card-body px-0 pb-2">
                  <div class="card-body">
                    @if (session('success'))
                      <div class="alert alert-success alert-dismissible text-white fade show" role="alert">
                          <span class="alert-icon align-middle">
                            <span class="material-icons text-md">
                            thumb_up_off_alt
                            </span>
                          </span>
                          <span class="alert-text">¡ {{session('success')}} !</span>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                    @endif
                  </div>
                  <div class="card-body d-flex justify-content-end pt-0 bt-0 mt-0">
                    <a href="{{ url('/recepcionistas/create') }}" class="btn btn-icon btn-3 btn-success" role="button" aria-pressed="true">
                        <span class="btn-inner--icon"><i class="material-icons">person_add</i></span>
                        <span class="btn-inner--text">Agregar Nuevo</span>
                    </a>
                  </div>
                  <div class="table-responsive p-0">
                      <table class="table align-items-center mb-0">
                          <thead>
                              <tr>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NOMBRE
                                  </th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                      CORREO</th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                      CEDULA</th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                      TELEFONO</th>
                                  <th class="text-uppercase  text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                      ROL</th>
                                  <th class="text-uppercase  text-secondary text-xxs font-weight-bolder opacity-7 ps-2" >
                                      CIUDAD</th>
                                  <th class="text-secondary opacity-7">OPCIONES</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($recepcionistas as $recepcionista)
                                  <tr>
                                      <td>
                                          <div class="d-flex px-2 py-1">
                                              {{-- <div>
                          <img src="{{asset('img/team-2.jpg')}}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                      </div> --}}
                                              <div class="d-flex flex-column justify-content-center">
                                                  <h6 class="mb-0 text-sm">{{ $recepcionista->name }}</h6>
                                                  {{-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> --}}
                                              </div>
                                          </div>
                                      </td>
                                      <td class="align-middle text-sm">
                                          <p class="text-xs font-weight-bold mb-0 ">{{ $recepcionista->email }}</p>
                                          {{-- <p class="text-xs text-secondary mb-0">Organization</p> --}}
                                      </td>
                                      <td class="align-middle text-sm">
                                          <span
                                              class="text-xs font-weight-bold mb-0 ">{{ $recepcionista->cedula }}</span>
                                      </td>
                                      <td class="align-middle text-sm">
                                          <span
                                              class="text-xs font-weight-bold mb-0 ">{{ $recepcionista->phone }}</span>
                                      </td>
                                      <td class="align-middle text-sm">
                                          <span
                                              class="text-xs font-weight-bold mb-0 ">{{ $recepcionista->role }}</span>
                                      </td>
                                      <td class="align-middle text-sm">
                                          <span
                                              class="text-xs font-weight-bold mb-0 ">{{ $recepcionista->provincia->nombre }}</span>
                                      </td>
                                      {{-- <td class="align-middle text-sm">
                                          <span class="text-xs font-weight-bold mb-0 ">
                                            @if ($recepcionista->ubicacion)
                                              Ubicacion Registrada <br>
                                              <a href="{{ url('/ubicaciones/vendedores/' . $vendedor->id . '/edit') }}">Editar Ubicacions</a>
                                            @else
                                              <a title="Añadir una Ubicación" href="{{ url('/ubicaciones/vendedores/' . $vendedor->id) }}">Registrar Ubicacion</a>
                                            @endif
                                          </span>
                                      </td> --}}

                                      <td class="align-middle">
                                        <a href="{{url('/recepcionistas/'.$recepcionista->id.'/edit')}}" class="text-warning font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                          <span class="alert-icon align-middle">
                                            <span class="material-icons text-md">
                                              edit
                                            </span>
                                          </span>
                                          Editar
                                        </a>
                                        {{-- <form action="{{URL('/vendedors/'.$vendedor->id)}}" method="POST">
                                          @csrf
                                          @method('DELETE')

                                        </form> --}}
                                        <a href="#" class="text-danger font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user" onclick="event.preventDefault(); document.getElementById('{{$recepcionista->id}}').submit();">
                                          <span class="alert-icon align-middle">
                                            <span class="material-icons text-md">
                                              delete
                                            </span>
                                          </span>
                                          Eliminar
                                        </a>
                                          <!-- Formulario oculto para enviar la solicitud DELETE -->
                                        <form action="{{ URL('/recepcionistas/'.$recepcionista->id) }}" method="POST" id="{{$recepcionista->id}}" style="display: none;">
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
@endsection
