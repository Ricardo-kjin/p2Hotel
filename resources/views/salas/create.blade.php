@extends('layouts.panel')

@section('styles')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Nueva Sala</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ url('/salas') }}" class="btn btn-sm btn-success">
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
            <form action="{{ url('/salas') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre de la Sala</label>
                    <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" id="nombre"
                        required>
                </div>
                <div class="form-group">
                    <label for="description">Descripción de la Sala</label>
                    <input type="text" name="description" class="form-control" id="description"
                        value="{{ old('description') }}">
                </div>
                <div class="form-group">
                    <label for="users">Desarrolladores</label>
                    <select name="users[]" id="users" class="form-control selectpicker" data-style="btn-primary"
                        title="Seleccionar Desarrolladores" multiple required>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}"> {{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary"> Crear Sala</button>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
@endsection
