<?php
use Illuminate\Support\Str;
?>

@extends('layouts.panel')

@section('content')

<div class="row">
  <div class="col-12">
    <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
          <h6 class="text-white text-capitalize ps-3">Nuevo Recepcionista</h6>
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
                  <span class="alert-text"><strong>Por favor!!</strong> {{$error}}</span>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              @endforeach
          @else

          @endif
          <form method="POST" action="{{ url('/recepcionistas/'.$user->id) }}">
              @csrf
              @method('PUT')
              <div class="form-control">
                  <div class="input-group input-group-static mb-4">
                      <label for="name" >NOMBRE RECEPCIONISTA</label>
                      <input type="text" name="name" class="form-control" value="{{ old('name',$user->name) }}" id="name" required>
                  </div>
              </div>
              <div class="form-control">
                  <div class="input-group input-group-static mb-4">
                      <label for="email" >CORREO ELECTRONICO</label>
                      <input type="text" name="email" class="form-control" id="email" value="{{ old('email',$user->email) }}" required>
                    </div>
              </div>
              <div class="form-control">
                  <div class="input-group input-group-static mb-4">
                      <label for="cedula" >CEDULA</label>
                      <input type="text" name="cedula" class="form-control" id="cedula" value="{{ old('cedula',$user->cedula) }}" >
                  </div>
              </div>

              <input type="hidden" name="role" value="recepcionista">

                <div class="form-control">
                    <div class="input-group input-group-static mb-4">
                        <label for="pais_id" class="ms-0">PAIS </label>
                        <select class="form-control" id="pais_id" name="pais_id" required>
                            @foreach($paises as $pais)
                                <option value="{{ $pais->id }}" {{ $user->provincia->pais_id == $pais->id ? 'selected' : '' }}>
                                    {{ $pais->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-control">
                    <div class="input-group input-group-static mb-4">
                        <label for="provincia_id" class="ms-0">CIUDAD </label>
                        <select class="form-control" id="provincia_id" name="provincia_id" required>
                            @foreach($ciudadesProvincias as $ciudadProvincia)
                                <option value="{{ $ciudadProvincia->id }}" {{ $user->provincia->provincia_id == $ciudadProvincia->id ? 'selected' : '' }}>
                                    {{ $ciudadProvincia->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
              <div class="form-control">
                  <div class="input-group input-group-static mb-4">
                      <label for="phone" >TELEFONO</label>
                      <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone',$user->phone) }}" >
                  </div>
              </div>

                  <div class="input-group input-group-static mb-4">
                      <label for="password" >CONTRASEÑA</label>
                      <input type="text" name="password" class="form-control" id="password">
                      <small class="text-danger">solo edite en caso de querer cambiar la constraseña..</small>
                  </div>
              <div>
                <button type="submit" class="btn bg-gradient-primary">Guardar</button>
                <a href="{{url('/recepcionistas')}}" type="button" class="btn btn-outline-success" title="Regresar"><i class="material-icons">arrow_back</i> Regresar</a>
              </div>
          </form>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#pais_id').on('change', function() {
            var pais_id = $(this).val();
            if (pais_id) {
                $.ajax({
                    url: '{{ route("get-ciudades-provincias") }}',
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'pais_id': pais_id
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#provincia_id').empty();
                        $.each(data, function(key, value) {
                            $('#provincia_id').append('<option value="' + value.id + '">' + value.nombre + '</option>');
                        });
                    }
                });
            } else {
                $('#ciudad_id').empty();
            }
        });
    });
</script>
@endsection
