@extends('layout.app')

@section('content')
<div class="max-w-7xl mx-auto p-8 grid grid-cols-1 lg:grid-cols-3 gap-8">

  <!-- 📌 Columna izquierda (Propiedades + mapa) -->
  <div class="lg:col-span-2 space-y-10">
    <!-- Título -->
    <h1 class="text-3xl font-bold text-center text-[#09121b]">
      Comparar Propiedades 
    </h1>

    <!-- Cards de propiedades -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      @foreach($propiedades as $propiedad)
        <div class="bg-[#09121b] text-white rounded-2xl shadow-lg p-6 border border-[#BA9D79]/30">
          <img src="{{ asset($propiedad->imagenes->first()->ruta ?? 'images/default.jpg') }}"
               alt="Imagen {{ $propiedad->titulo }}"
               class="w-full h-48 object-cover rounded-lg mb-4 shadow-md">

          <h2 class="text-lg font-bold mb-1">{{ $propiedad->titulo }}</h2>
          <p class="text-sm text-gray-300 mb-4">{{ $propiedad->ubicacion }}</p>

          <ul class="space-y-2 text-sm">
            <li class="flex justify-between bg-white/10 px-3 py-1 rounded">
              💲 <span class="text-[#79ba82] font-bold">${{ number_format($propiedad->precio, 2) }}</span>
            </li>
            <li class="flex justify-between bg-white/10 px-3 py-1 rounded">
              🛏 {{ $propiedad->habitaciones }}
            </li>
            <li class="flex justify-between bg-white/10 px-3 py-1 rounded">
              🛁 {{ $propiedad->banos }}
            </li>
            <li class="flex justify-between bg-white/10 px-3 py-1 rounded">
              🚗 {{ $propiedad->parqueos }}
            </li>
            <li class="flex justify-between bg-white/10 px-3 py-1 rounded">
              📐 {{ $propiedad->area_terreno }} m²
            </li>
          </ul>
        </div>
      @endforeach
    </div>

    <!-- Mapa -->
    <div>
      <h2 class="text-2xl font-bold text-center text-[#09121b] mb-4">
        Ubicaciones en el mapa
      </h2>
      <div id="map" class="w-full h-80 rounded-lg shadow-md"></div>
    </div>
  </div>

 
<div class="bg-white border border-[#BA9D79] rounded-2xl shadow-lg flex flex-col h-[80vh]">
  <div class="p-6 border-b border-[#BA9D79]/30">
    <h3 class="text-xl font-bold text-[#09121b]"> Necesitas ayuda?</h3>
  </div>

  <!-- Contenedor estilo chat con scroll -->
  <div id="resultadoBox" class="flex-1 overflow-y-auto p-6 hidden">
    <p id="resultadoComparacion" class="text-gray-700 leading-relaxed">
      Generando conclusión...
    </p>
  </div>

  <!-- Botón fijo abajo -->
  <div class="p-4 border-t border-[#BA9D79]/30">
    <button onclick="compararIA()" 
            class="w-full px-4 py-2 bg-[#09121b] hover:bg-[#BA9D79] text-white font-semibold rounded-lg shadow-md transition">
       Empezar comparación
    </button>
  </div>
</div>


<script>
const propiedades = @json($propiedades);
let propiedadesEnriquecidas = [];

// 🚀 Inicializa el mapa y muestra marcadores
async function initMap() {
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 12,
        center: { lat: 13.6929, lng: -89.2182 }
    });

    const bounds = new google.maps.LatLngBounds();

    for (const prop of propiedades) {
        if (prop.lat && prop.lng) {
            const position = { lat: parseFloat(prop.lat), lng: parseFloat(prop.lng) };

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
        }
    }

    if (!bounds.isEmpty()) {
        map.fitBounds(bounds);
    }

    await enriquecerPropiedades();
}

// 🔥 Pide al backend las propiedades enriquecidas
async function enriquecerPropiedades() {
    try {
        const response = await fetch("{{ route('propiedades.enriquecer') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ propiedades })
        });

        propiedadesEnriquecidas = await response.json();
        console.log("✔ Propiedades enriquecidas:", propiedadesEnriquecidas);
    } catch (err) {
        console.error("⚠️ Error al enriquecer propiedades:", err);
    }
}

// ⚖️ Envía a la IA para la comparación
function compararIA() {
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
        body: JSON.stringify({ propiedades: propiedadesEnriquecidas })
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

window.onload = initMap;
</script>




<!-- ✅ Solo Google Maps básico para mostrar el mapa -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBClZqEH1UjCXzitW8-3Yuz5Kz7CgjmPO4&callback=initMap" async defer></script>






@endsection
