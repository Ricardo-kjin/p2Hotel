@extends('layouts.panel')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">lock_open</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Se abrió desde la pagina</p>
              <h4 class="mb-0">{{$cerradura->cantidad_veces_abierto}} <strong>veces</strong></h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Informe de las veces </span>que un cliente abrio la cerradura</p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">lock</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Se cerró desde la pagina</p>
              <h4 class="mb-0">{{$cerradura->cantidad_veces_cerrado}}<strong>veces</strong></h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Informe de las veces </span>que un usuario cerró su habitacion</p>
          </div>
        </div>
      </div>

    </div>
    <div class="row mt-4">

            <div style="width: 80%; margin: auto;">
                <!-- Canvas para el gráfico -->
                <canvas id="reservasPorCiudadChart"></canvas>
            </div>

            <script>
                // Datos de la consulta enviados desde el controlador
                var reservasPorCiudad = @json($reservasPorCiudad);

                // Preparar datos para el gráfico
                var labels = reservasPorCiudad.map(item => item.ciudad);
                var data = reservasPorCiudad.map(item => item.total_reservas);

                // Configuración del gráfico
                var ctx = document.getElementById('reservasPorCiudadChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Cantidad de Reservas por Ciudad',
                            data: data,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)', // Color de las barras
                            borderColor: 'rgba(75, 192, 192, 1)', // Color del borde de las barras
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>

    </div>

  </div>

@endsection
