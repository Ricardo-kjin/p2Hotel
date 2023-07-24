@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Nueva grupo</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ url('/grupos') }}" class="btn btn-sm btn-success">
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
                        <strong>Por favor!</strong> {{ $error }}
                    </div>
                @endforeach
            @endif
            <form action="{{ url('/grupos') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre de la grupo</label>
                    <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" id="nombre"
                        required>
                </div>

                <button type="submit" class="btn btn-primary"> Crear grupo</button>
            </form>
        </div>
    </div>
@endsection

