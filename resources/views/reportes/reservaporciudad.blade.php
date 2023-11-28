<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráfico de Barras</title>
    <!-- Incluir la biblioteca Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
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
</body>
</html>
