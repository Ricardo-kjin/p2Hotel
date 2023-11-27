@extends('layouts.panel')

@section('content')
<div class="row">
  <div class="col-12">
      <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                  <h6 class="text-white text-capitalize ps-3">NUEVA PROMOCION</h6>
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
              <form method="POST" action="{{ url('/promociones') }}">
                  @csrf
                  <div class="form-control">
                      <div class="input-group input-group-dynamic mb-4">
                          <label for="nombre_promocion" class="form-label">nombre_promocion </label>
                          <input type="text" name="nombre_promocion" class="form-control" value="{{ old('nombre_promocion') }}"
                              id="nombre_promocion" required>
                      </div>
                  </div>
                  <div class="form-control">
                      <div class="input-group input-group-dynamic mb-4">
                          <label for="fecha_ini" class="form-label">fecha_ini </label>
                          <input type="text" name="fecha_ini" class="form-control" value="{{ old('fecha_ini') }}"
                              id="fecha_ini" required>
                      </div>
                  </div>
                  <div class="form-control">
                      <div class="input-group input-group-dynamic mb-4">
                          <label for="fecha_fin" class="form-label">fecha_fin </label>
                          <input type="text" name="fecha_fin" class="form-control" value="{{ old('fecha_fin') }}"
                              id="fecha_fin" required>
                      </div>
                  </div>
                  <div class="form-control">
                      <div class="input-group input-group-dynamic mb-4">
                          <label for="descuento" class="form-label">descuento </label>
                          <input type="text" name="descuento" class="form-control" value="{{ old('descuento') }}"
                              id="descuento" required>
                      </div>
                  </div>
                  <div class="form-control">
                      <div class="input-group input-group-dynamic mb-4">
                          <label for="descripcion" class="form-label">descripcion </label>
                          <input type="text" name="descripcion" class="form-control" value="{{ old('descripcion') }}"
                              id="descripcion" required>
                      </div>
                  </div>
                  <div>
                      <button type="submit" class="btn bg-gradient-primary">Guardar</button>
                      <a href="{{ url('/promociones') }}" type="button" class="btn btn-outline-success"
                          title="Regresar"><i class="material-icons">arrow_back</i> Regresar</a>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>
@endsection

