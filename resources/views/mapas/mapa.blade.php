@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <h1>Ubicación en tiempo real</h1>
    <div id="map" style="width: 100%; height: 400px;"></div>

    <script>
        function initMap() {
            const map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: 0,
                    lng: 0
                },
                zoom: 15,
            });

            // Función para obtener y actualizar la ubicación en tiempo real
            function actualizarUbicacion(position) {
                const latitud = position.coords.latitude;
                const longitud = position.coords.longitude;

                const pos = {
                    lat: latitud,
                    lng: longitud
                };
                map.setCenter(pos);

                // Agregar un marcador para mostrar la ubicación en tiempo real
                new google.maps.Marker({
                    position: pos,
                    map: map,
                    title: "Tu ubicación",
                });
            }

            // Obtener ubicación del navegador
            if (navigator.geolocation) {
                navigator.geolocation.watchPosition(actualizarUbicacion);
            } else {
                console.error("Geolocation is not supported by this browser.");
            }
        }
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7D9rw7JZCb9Xz8McyTe0LI4pvMY0sB_I&callback=initMap&libraries=&v=weekly"
        async></script>
    </body>
</div>
@endsection
