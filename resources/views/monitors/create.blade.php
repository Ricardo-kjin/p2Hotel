<?php
use Illuminate\Support\Str;
?>

@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Nuevo monitor</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ url('/monitores') }}" class="btn btn-sm btn-success">
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
            <form action="{{ url('/monitores') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre del monitor</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" id="name"
                        required>
                </div>
                <div class="form-group">
                    <label for="email">Correo Electronico</label>
                    <input type="text" name="email" class="form-control" id="email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="cedula">Cedula</label>
                    <input type="text" name="cedula" class="form-control" id="cedula" value="{{ old('cedula') }}">
                </div>
                <div class="form-group">
                    <label for="address">Direccion</label>
                    <input type="text" name="address" class="form-control" id="address" value="{{ old('address') }}">
                </div>
                <div class="form-group">
                    <label for="phone">Telefono</label>
                    <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone') }}">
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="text" name="password" class="form-control" id="password" value="{{ old('password', Str::random(8)) }}" readonly>
                </div>
                <div class="form-group" hidden>
                    <label for="role">Rol</label>
                    <input type="text" name="role" class="form-control" id="role" value="monitor">
                </div>
                <button type="submit" class="btn btn-primary"> Crear monitor</button>
            </form>
        </div>
    </div>
@endsection
