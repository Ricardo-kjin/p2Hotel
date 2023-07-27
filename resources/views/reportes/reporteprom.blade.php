@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <h1>Reporte del Promedio de Días de Visita de Vendedores</h1>
        <table>
            <thead>
                <tr>
                    <th>Vendedor</th>
                    <th>Promedio de Días de Visita</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vendedores as $vendedor)
                    <tr>
                        <td>{{ $vendedor->name }}</td>
                        <td>{{ $vendedor->promedio_dias_visita }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Código para el gráfico utilizando Chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <canvas id="graficoPromedioDias"></canvas>

        <script>
            var ctx = document.getElementById('graficoPromedioDias').getContext('2d');
            var nombresVendedores = @json($vendedores->pluck('name'));
            var promediosDias = @json($vendedores->pluck('promedio_dias_visita'));

            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: nombresVendedores,
                    datasets: [{
                        label: 'Promedio de Días de Visita',
                        data: promediosDias,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
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
@endsection
