<!-- resources/views/reservas/create.blade.php -->

@extends('layouts.panel')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">NUEVA RESERVA ----- PROMO: {{$descuento['nombre_promocion']}}, DESCUENTO DE: {{$descuento['descuento']}} %</h6>
                </div>
            </div>
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
                <form method="POST" action="{{ url('/reservas/store') }}">
                    @csrf
                    <div class="form-control">
                        <div class="input-group input-group-dynamic mb-4">
                            <label for="name" class="form-label">NOMBRE </label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                id="name" required>
                        </div>
                    </div>
                    <div class="form-control">
                        <div class="input-group input-group-dynamic mb-4">
                            <label for="email" class="form-label">CORREO ELECTRONICO </label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                id="email" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group input-group-dynamic mb-4">
                                <label for="cedula" class="form-label">CEDULA </label>
                                <input type="text" name="cedula" class="form-control" value="{{ old('cedula') }}"
                                    id="cedula" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-dynamic mb-4">
                                <label for="phone" class="form-label">TELEFONO </label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}"
                                    id="phone" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-control">
                        <div class="input-group input-group-static mb-4">
                            <label for="provincia_id" class="ms-0">CIUDAD</label>
                            <select class="form-control" id="provincia_id" name="provincia_id">
                              <!-- Opciones de ciudades cargadas dinámicamente -->
                                @foreach($paises as $pais)
                                    <optgroup label="{{ $pais->nombre }}">
                                        @foreach($pais->ciudadesProvincias as $ciudad)
                                            <option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                          </div>
                    </div>

                    <!-- Sección de Habitaciones -->
                    <div>
                        <h3>Habitaciones</h3>

                        <label for="habitacion">Habitación:</label>
                        <select name="habitacion" id="habitacion" required>
                            @foreach($habitaciones as $habitacion)
                                <option value="{{ $habitacion['id'] }}" data-name="{{$habitacion['nro_habitacion']}}" data-precio="{{ $habitacion['precio'] }}">{{ $habitacion['nro_habitacion'] }}</option>
                            @endforeach
                        </select>

                        <label for="fecha_ini_habitacion">Fecha Inicio:</label>
                        <input type="date" name="fecha_ini_habitacion" id="fecha_ini_habitacion" required>

                        <label for="fecha_fin_habitacion">Fecha Fin:</label>
                        <input type="date" name="fecha_fin_habitacion" id="fecha_fin_habitacion" required>

                        <button type="button" onclick="agregarDetalle('habitacion')">Agregar Habitación</button>
                    </div>

                    <!-- Sección de Servicios -->
                    <div>
                        <h3>Servicios</h3>

                        <label for="servicio">Servicio:</label>
                        <select name="servicio" id="servicio" required>
                            @foreach($servicios['servicios'] as $servicio)
                                <option value="{{ $servicio['_id'] }}" data-name="{{$servicio['nombre']}}" data-precio="{{ $servicio['precio'] }}">{{ $servicio['nombre'] }}</option>
                            @endforeach
                        </select>

                        <label for="fecha_ini_servicio">Fecha Inicio:</label>
                        <input type="date" name="fecha_ini_servicio" id="fecha_ini_servicio" required>

                        <label for="fecha_fin_servicio">Fecha Fin:</label>
                        <input type="date" name="fecha_fin_servicio" id="fecha_fin_servicio" required>

                        <button type="button" onclick="agregarDetalle('servicio')">Agregar Servicio</button>
                    </div>

                    <!-- Tabla de Detalles de Reserva -->
                    <div>
                        <h3>Detalles de Reserva</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group input-group-dynamic mb-4">
                                    <label for="codigo_reserva" class="form-label">CODIGO DE RESERVA </label>
                                    <input type="text" name="codigo_reserva" class="form-control" value="{{ old('codigo_reserva') }}"
                                        id="codigo_reserva" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-dynamic mb-4">
                                    <label for="nro_ocupantes" class="form-label">NUMERO DE OCUPANTES </label>
                                    <input type="text" name="nro_ocupantes" class="form-control" value="{{ old('nro_ocupantes') }}"
                                        id="nro_ocupantes" required>
                                </div>
                            </div>
                        </div>
                        <table id="tablaDetalles">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre de Servicio / Nro. Habitación</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Los detalles se agregarán aquí dinámicamente -->
                            </tbody>
                        </table>
                    </div>

                    <!-- Total de la Reserva -->
                    <div>
                        <label for="total"><strong>TOTAL:</strong></label>
                        <span id="total">0.00</span>
                    </div>


                    <div>
                        <button type="submit" class="btn bg-gradient-primary">Guardar</button>
                        <a href="{{ url('/paises') }}" type="button" class="btn btn-outline-success"
                            title="Regresar"><i class="material-icons">arrow_back</i> Regresar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>






    <script>
        // Variables para almacenar detalles y total
        let detallesReserva = [];
        let totalReserva = 0;

            // JavaScript para agregar detalles a la tabla y calcular el total
        function agregarDetalle(tipo) {
            const id = obtenerId(tipo);
            let nombre = '';

            if (tipo === 'habitacion') {
                // Si es habitación, obtener el número de habitación (nro_habitacion)
                nombre = document.getElementById(`${tipo}`).options[document.getElementById(`${tipo}`).selectedIndex].getAttribute('data-name');
            } else if (tipo === 'servicio') {
                // Si es servicio, obtener el nombre del servicio
                nombre = document.getElementById(`${tipo}`).options[document.getElementById(`${tipo}`).selectedIndex].getAttribute('data-name');
            }
            const precio = parseFloat(document.getElementById(`${tipo}`).options[document.getElementById(`${tipo}`).selectedIndex].getAttribute('data-precio'));
            const cantidad = calcularCantidad(tipo);
            const subtotal = precio * cantidad;

            if (nombre && precio && cantidad) {
                // Agregar detalle a la tabla
                const tablaDetalles = document.getElementById('tablaDetalles').getElementsByTagName('tbody')[0];
                const newRow = tablaDetalles.insertRow(tablaDetalles.rows.length);
                const cell1 = newRow.insertCell(0);
                const cell2 = newRow.insertCell(1);
                const cell3 = newRow.insertCell(2);
                const cell4 = newRow.insertCell(3);
                const cell5 = newRow.insertCell(4);

                cell1.innerHTML = id;  // Muestra el ID
                cell2.innerHTML = nombre;
                cell3.innerHTML = precio.toFixed(2);
                cell4.innerHTML = cantidad;
                cell5.innerHTML = subtotal.toFixed(2);

                // Actualizar detalles y total
                detallesReserva.push({ id, nombre, precio, cantidad, subtotal });  // Actualiza el arreglo de detalles
                totalReserva += subtotal;

                // Actualizar el total en la vista
                document.getElementById('total').innerHTML = totalReserva.toFixed(2);
            } else {
                alert('Completa todos los campos antes de agregar.');
            }
        }

        function obtenerId(tipo) {
            const elementoSeleccionado = document.getElementById(`${tipo}`);
            const id = elementoSeleccionado.options[elementoSeleccionado.selectedIndex].getAttribute('data-id');

            return id ? id : 0; // Devuelve 0 si no se encuentra el ID (ajusta según tus necesidades)
        }

        // Función para calcular la cantidad según la diferencia de fechas
        function calcularCantidad(tipo) {
            const fechaIni = new Date(document.getElementById(`fecha_ini_${tipo}`).value);
            const fechaFin = new Date(document.getElementById(`fecha_fin_${tipo}`).value);

            // Verificar que las fechas sean válidas
            if (isNaN(fechaIni) || isNaN(fechaFin)) {
                alert('Ingresa fechas válidas.');
                return 0;
            }

            // Calcular la diferencia en días
            const diferenciaEnMilisegundos = fechaFin - fechaIni;
            const diferenciaEnDias = Math.ceil(diferenciaEnMilisegundos / (1000 * 60 * 60 * 24));

            // Ajustar la lógica según tus necesidades específicas
            return diferenciaEnDias;
        }

            // Puedes implementar más funciones según tus necesidades
    </script>
@endsection
