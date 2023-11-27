@extends('layouts.panel')

@section('content')
<div class="row">
  <div class="col-12">
      <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                  <h6 class="text-white text-capitalize ps-3">NUEVA habitacion</h6>
              </div>
          </div>
          <div class="card-body">
              @if ($errors->any())
                  @foreach ($errors->all() as $error)
                      <div class="alert alert-danger alert-dismissible text-white fade show" role="alert">
                          <span class="alert-icon align-middle">
                              <span class="material-icons text-md">
                                  warning
                              </span>
                          </span>
                          <span class="alert-text"><strong>Por favor!!</strong> {{ $error }}</span>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                  @endforeach
              @else
              @endif
              <form method="POST" action="{{ url('/habitaciones') }}">
                  @csrf
                  <div class="form-control">
                      <div class="input-group input-group-dynamic mb-4">
                          <label for="nro_habitacion" class="form-label">nro_habitacion </label>
                          <input type="text" name="nro_habitacion" class="form-control" value="{{ old('nro_habitacion') }}"
                              id="nro_habitacion" required>
                      </div>
                  </div>
                  <div class="form-control">
                        <div class="input-group input-group-static mb-4">
                            <label for="tipo_habitacion" class="ms-0">tipo_habitacion </label>
                            <select type="text" name="tipo_habitacion" class="form-control"
                                id="tipo_habitacion" required>
                                @foreach ($tiposHabitacion as $tipo)
                                    <option value="{{ $tipo['id'] }}">{{ $tipo['nombre'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                  <div class="form-control">
                      <div class="input-group input-group-dynamic mb-4">
                          <label for="caracteristicas" class="form-label">caracteristicas </label>
                          <input type="text" name="caracteristicas" class="form-control" value="{{ old('caracteristicas') }}"
                              id="caracteristicas" required>
                      </div>
                  </div>
                  <div class="form-control">
                      <div class="input-group input-group-dynamic mb-4">
                          <label for="precio" class="form-label">precio </label>
                          <input type="text" name="precio" class="form-control" value="{{ old('precio') }}"
                              id="precio" required>
                      </div>
                  </div>
                  <div class="form-control">
                      <div class="input-group input-group-dynamic mb-4">
                          <label for="codigo_cerradura" class="form-label">codigo_cerradura </label>
                          <input type="text" name="codigo_cerradura" class="form-control" value="{{ old('codigo_cerradura') }}"
                              id="codigo_cerradura" required>
                      </div>
                  </div>
                  <div class="form-control">
                      <div class="input-group input-group-dynamic mb-4">
                          <label for="estado_cerradura" class="form-label">estado_cerradura </label>
                          <input type="text" name="estado_cerradura" class="form-control" value="{{ old('estado_cerradura') }}"
                              id="estado_cerradura" required>
                      </div>
                  </div>
                  <div class="form-control">
                      <div class="input-group input-group-dynamic mb-4">
                          <label for="estado_habitacion" class="form-label">estado_habitacion </label>
                          <input type="text" name="estado_habitacion" class="form-control" value="{{ old('estado_habitacion') }}"
                              id="estado_habitacion" required>
                      </div>
                  </div>
                  <div>
                      <button type="submit" class="btn bg-gradient-primary">Guardar</button>
                      <a href="{{ url('/habitaciones') }}" type="button" class="btn btn-outline-success"
                          title="Regresar"><i class="material-icons">arrow_back</i> Regresar</a>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>
@endsection

