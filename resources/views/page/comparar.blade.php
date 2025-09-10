@extends('layout.app')

@section('content')
<div class="max-w-6xl mx-auto p-8">
    <!-- Botón volver -->
    <div class="mb-6 left-2">
        <a href="{{ route('favoritos.index') }}" 
           class="inline-flex items-center gap-2 text-[#09121b] hover:text-[#BA9D79] font-medium transition">
            <svg xmlns="http://www.w3.org/2000/svg" 
                 class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M15 19l-7-7 7-7" />
            </svg>
            Volver a Favoritos
        </a>
    </div>

    <!-- Título -->
    <h1 class="text-3xl font-bold text-center mb-10 text-[#09121b]">
        Comparar Propiedades 
    </h1>

    <!-- Contenedor comparativo -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @foreach($propiedades as $propiedad)
            <div class="bg-[#09121b] text-white rounded-2xl shadow-lg p-6 flex flex-col items-center border border-[#BA9D79]/30">
                <!-- Imagen -->
                <div class="w-full relative">
                    <img src="{{ asset($propiedad->imagenes->first()->ruta ?? 'images/default.jpg') }}"
                         alt="Imagen {{ $propiedad->titulo }}"
                         class="w-full h-48 object-cover rounded-lg mb-4 shadow-md">
                    <span class="absolute top-3 left-3 bg-[#44359c] text-white text-xs font-semibold px-3 py-1 rounded">
                        {{ $propiedad->tipo }}
                    </span>
                </div>

                <!-- Título y ubicación -->
                <h2 class="text-xl font-bold text-white mb-1 text-center">
                    {{ $propiedad->titulo }}
                </h2>
                <p class="text-sm text-gray-300 mb-6 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#BA9D79]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M12 11c1.657 0 3-1.343 3-3S13.657 5 12 5s-3 1.343-3 3 1.343 3 3 3z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M12 22s8-4.5 8-11.5S16.418 2 12 2 4 6.5 4 10.5 12 22 12 22z" />
                    </svg>
                    {{ $propiedad->ubicacion }}
                </p>

                <!-- Características -->
                <ul class="w-full space-y-3 text-sm">
                    <li class="flex justify-between px-4 py-2 bg-white/10 rounded-lg">
                        <span class="flex items-center gap-2 font-semibold">💲 Precio</span>
                        <span class="text-[#79ba82] font-bold">${{ number_format($propiedad->precio, 2) }}</span>
                    </li>
                    <li class="flex justify-between px-4 py-2 bg-white/10 rounded-lg">
                        <span class="flex items-center gap-2 font-semibold">🛏 Habitaciones</span>
                        <span>{{ $propiedad->habitaciones }}</span>
                    </li>
                    <li class="flex justify-between px-4 py-2 bg-white/10 rounded-lg">
                        <span class="flex items-center gap-2 font-semibold">🛁 Baños</span>
                        <span>{{ $propiedad->banos }}</span>
                    </li>
                    <li class="flex justify-between px-4 py-2 bg-white/10 rounded-lg">
                        <span class="flex items-center gap-2 font-semibold">🚗 Parqueos</span>
                        <span>{{ $propiedad->parqueos }}</span>
                    </li>
                    <li class="flex justify-between px-4 py-2 bg-white/10 rounded-lg">
                        <span class="flex items-center gap-2 font-semibold">📐 Área terreno</span>
                        <span>{{ $propiedad->area_terreno }} m²</span>
                    </li>
                </ul>
            </div>
        @endforeach
    </div>

    <!-- Mapa -->
    <div class="mt-10">
        <h2 class="text-2xl font-bold text-center text-[#09121b] mb-6">
            Ubicaciones en el mapa
        </h2>
        <div id="map" class="w-full h-96 rounded-lg shadow-md"></div>
    </div>

    <!-- Botón y resultado -->
    <div class="mt-12 text-center">
        <button onclick="compararIA()" 
                class="px-6 py-3 bg-[#09121b] hover:bg-[#BA9D79] text-white font-bold rounded-lg shadow-md transition">
            ⚖️ Comparar con IA
        </button>
    </div>

    <div id="resultadoBox" class="mt-8 hidden">
        <div class="bg-white border border-[#BA9D79]/50 rounded-2xl shadow-lg p-6">
            <h3 class="text-xl font-bold text-[#09121b] mb-4">🧠 Conclusión de la IA</h3>
            <div id="resultadoComparacion" class="text-gray-700 leading-relaxed"></div>
        </div>
    </div>
</div>



<script>
const propiedades = @json($propiedades);
let propiedadesEnriquecidas = [];

async function initMap() {
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 12,
        center: { lat: 13.6929, lng: -89.2182 }
    });

    const bounds = new google.maps.LatLngBounds();
    const serviceDistance = new google.maps.DistanceMatrixService();
    const geocoder = new google.maps.Geocoder();

    for (const prop of propiedades) {
        if (prop.lat && prop.lng) {
            const position = { lat: parseFloat(prop.lat), lng: parseFloat(prop.lng) };

            // ✅ Marcador de la propiedad
            const marker = new google.maps.Marker({
                position,
                map,
                title: prop.titulo
            });

            const info = new google.maps.InfoWindow({
                content: `
                    <div style="font-size:14px; color:#09121b;">
                        <strong>${prop.titulo}</strong><br>
                        📍 ${prop.ubicacion}<br>
                        💲 $${prop.precio}
                    </div>
                `
            });

            marker.addListener("click", () => info.open(map, marker));
            bounds.extend(position);

            // 👉 Buscar centro comercial cercano
            let centroComercial = "Ninguno cercano";
            let centroCoords = null;
            try {
                const { places: malls } = await google.maps.places.Place.searchNearby({
                    locationRestriction: {
                        center: position,
                        radius: 5000
                    },
                    includedTypes: ["shopping_mall"],
                    fields: ["displayName", "location"]
                });
                if (malls && malls.length > 0) {
                    centroComercial = malls[0].displayName?.text || malls[0].name;
                    centroCoords = {
                        lat: parseFloat(malls[0].location.latitude), // 👈 conversión correcta
                        lng: parseFloat(malls[0].location.longitude)
                    };
                }
            } catch (err) {
                console.error("Error buscando centro comercial:", err);
            }

            // 👉 Buscar hospital cercano
            let hospital = "Ninguno cercano";
            try {
                const { places: hospitals } = await google.maps.places.Place.searchNearby({
                    locationRestriction: {
                        center: position,
                        radius: 5000
                    },
                    includedTypes: ["hospital"],
                    fields: ["displayName", "location"]
                });
                if (hospitals && hospitals.length > 0) {
                    hospital = hospitals[0].displayName?.text || hospitals[0].name;
                }
            } catch (err) {
                console.error("Error buscando hospital:", err);
            }

            // 👉 Calle/carretera cercana con Geocoding
            let calle = "No disponible";
            try {
                const geoResults = await new Promise((resolve, reject) => {
                    geocoder.geocode({ location: position }, (results, status) => {
                        if (status === "OK" && results[0]) {
                            resolve(results);
                        } else {
                            reject(status);
                        }
                    });
                });
                calle = geoResults[0].formatted_address;
            } catch (err) {
                console.warn("No se pudo obtener calle:", err);
            }

            // 👉 Distancia conduciendo al centro comercial
            let distancia = "No calculada";
            let tiempo = "No calculado";
            if (centroCoords) {
                await new Promise((resolve) => {
                    serviceDistance.getDistanceMatrix({
                        origins: [position],
                        destinations: [centroCoords], // ✅ ahora LatLngLiteral válido
                        travelMode: "DRIVING",
                        drivingOptions: {
                            departureTime: new Date(),
                            trafficModel: "bestguess"
                        }
                    }, (response, status3) => {
                        if (status3 === "OK") {
                            distancia = response.rows[0].elements[0].distance.text;
                            tiempo = response.rows[0].elements[0].duration_in_traffic.text;
                        }
                        resolve();
                    });
                });
            }

            // 👉 Guardamos la propiedad enriquecida
            propiedadesEnriquecidas.push({
                id: prop.id,
                titulo: prop.titulo,
                ubicacion: prop.ubicacion,
                precio: prop.precio,
                habitaciones: prop.habitaciones,
                area_terreno: prop.area_terreno,
                estado: prop.estado,
                centro_comercial: centroComercial,
                hospital: hospital,
                calle: calle,
                distancia_centrocomercial: distancia,
                tiempo_centrocomercial: tiempo
            });

            console.log("✔ Procesada:", prop.titulo, propiedadesEnriquecidas);
        }
    }

    if (!bounds.isEmpty()) {
        map.fitBounds(bounds);
    }
}

// 👉 Función para enviar al backend
function compararIA() {
    console.log("Propiedades enriquecidas:", propiedadesEnriquecidas);

    if (propiedadesEnriquecidas.length === 0) {
        alert("⏳ Espera unos segundos, aún se están cargando los datos.");
        return;
    }

    document.getElementById("resultadoBox").classList.remove("hidden");
    document.getElementById("resultadoComparacion").innerText = "Generando conclusión...";

    fetch("{{ route('comparar.ia') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            propiedades: propiedadesEnriquecidas
        })
    })
    .then(res => res.json())
    .then(data => {
        document.getElementById("resultadoComparacion").innerText = data.comparacion;
    })
    .catch(err => {
        document.getElementById("resultadoComparacion").innerText = "⚠️ Error al generar la conclusión.";
        console.error(err);
    });
}

window.onload = function() {
    initMap();
};
</script>




<!-- OJO: usa la nueva versión de Places API -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBClZqEH1UjCXzitW8-3Yuz5Kz7CgjmPO4&libraries=places&v=weekly&callback=initMap" async defer></script>





@endsection
