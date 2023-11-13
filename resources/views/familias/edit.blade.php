@extends('layouts.panel')

@section('content')
<div class="row">
  <div class="col-12">
      <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                  <h6 class="text-white text-capitalize ps-3">Acutalizar Familia: {{ $familia->nombre }}</h6>
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
              <form method="POST" action="{{ url('/familias/' . $familia->id) }}">
                  @method('PUT')
                  @csrf
                  <div class="form-control">
                      <div class="input-group input-group-static mb-4">
                          <label for="nombre">NOMBRE DEL familia</label>
                          <input type="text" name="nombre" class="form-control"
                              value="{{ old('nombre', $familia->nombre) }}" id="nombre" required>
                      </div>
                  </div>
                  <div>
                      <button type="submit" class="btn bg-gradient-primary">Actualizar</button>
                      <a href="{{ url('/familias') }}" type="button" class="btn btn-outline-success"
                          title="Regresar"><i class="material-icons">arrow_back</i> Regresar</a>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>
    <div class="card shadow" hidden>
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Editar Familia {{$familia->nombre}}</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ url('/familias') }}" class="btn btn-sm btn-success">
                        <i class="fas fa-chevron-left"></i>
                        Regresar
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        <i class="fas fa-exclamation-triangle"></i>
                        <strong>Por favor!</strong> {{$error}}
                    </div>
                @endforeach
            @endif
            <form action="{{ url('/familias/'.$familia->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre de la familia</label>
                    <input type="text" name="nombre" class="form-control" value="{{old('nombre',$familia->nombre)}}" id="nombre" required>
                </div>
                <button type="submit" class="btn btn-primary"> Actualizar familia</button>
            </form>
        </div>
    </div>
@endsection
