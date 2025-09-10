@extends('layout.app')

@section('content')
  <style>
    #map { height: 800px; width: 100%; } 
    
 
    .highlight {
        border: 2px solid #FF0000; 
        box-shadow: 0 0 15px rgba(255, 0, 0, 0.7); 
        background-color: #f9f9f9; 
    }
  </style>

 <div class="max-w-7xl mx-auto px-6 py-10">
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

    {{-- Sidebar de filtros --}}
    <aside class="lg:col-span-3">
      <form action="{{ route('page.propiedades') }}" method="GET" class="bg-white rounded-2xl shadow-lg ring-1 ring-neutral-200/70 p-6 sticky top-20">

        {{-- Título + Reset --}}
        <div class="flex items-center justify-between mb-5">
          <h2 class="text-xl font-bold text-neutral-900">Filtros</h2>
          <a href="{{ route('page.propiedades') }}" class="text-sm text-neutral-500 hover:text-neutral-800">Limpiar</a>
        </div>

        {{-- Tipo de propiedad --}}
        <div class="mb-5">
          <label for="tipo" class="block text-sm font-semibold text-neutral-800">Tipo</label>
          <div class="mt-2 relative">
            <svg class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-neutral-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0h6"/></svg>
            <select id="tipo" name="tipo" class="w-full pl-9 pr-4 py-2.5 rounded-xl border border-neutral-200 focus:ring-2 focus:ring-[#BA9D79] focus:border-[#BA9D79] bg-white">
              <option value="">Cualquiera</option>
              <option value="Casa" @selected(request('tipo')=='Casa')>Casa</option>
              <option value="Apartamento" @selected(request('tipo')=='Apartamento')>Apartamento</option>
            </select>
          </div>
        </div>

        {{-- Rango de precio --}}
        <div class="mb-5">
          <label for="precio" class="block text-sm font-semibold text-neutral-800">Precio</label>
          <div class="mt-2 relative">
            <svg class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-neutral-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" d="M12 8c-2.21 0-4-.895-4-2s1.79-2 4-2 4 .895 4 2-1.79 2-4 2zm0 0v12m0-6c-2.21 0-4-.895-4-2m4 2c2.21 0 4-.895 4-2"/></svg>
            <select id="precio" name="precio" class="w-full pl-9 pr-4 py-2.5 rounded-xl border border-neutral-200 focus:ring-2 focus:ring-[#BA9D79] focus:border-[#BA9D79] bg-white">
              <option value="">Cualquiera</option>
              <option value="$0 - $100k" @selected(request('precio')=='$0 - $100k')>$0 - $100k</option>
              <option value="$100k - $200k" @selected(request('precio')=='$100k - $200k')>$100k - $200k</option>
              <option value="$200k - $500k" @selected(request('precio')=='$200k - $500k')>$200k - $500k</option>
              <option value="$500k+" @selected(request('precio')=='$500k+')>Más de $500k</option>
              <option value="< $50k" @selected(request('precio')=='< $50k')>Menos de $50k</option>
            </select>
          </div>
        </div>

        {{-- Habitaciones --}}
        <div class="mb-6">
          <label for="habitaciones" class="block text-sm font-semibold text-neutral-800">Habitaciones</label>
          <div class="mt-2 relative">
            <svg class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-neutral-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M5 10h14v8H5z"/></svg>
            <select id="habitaciones" name="habitaciones" class="w-full pl-9 pr-4 py-2.5 rounded-xl border border-neutral-200 focus:ring-2 focus:ring-[#BA9D79] focus:border-[#BA9D79] bg-white">
              <option value="">Cualquiera</option>
              <option value="1" @selected(request('habitaciones')=='1')>1 habitación</option>
              <option value="2" @selected(request('habitaciones')=='2')>2 habitaciones</option>
              <option value="3" @selected(request('habitaciones')=='3')>3 habitaciones</option>
            </select>
          </div>
        </div>

     

        {{-- Acciones --}}
        <div class="space-y-3">
          <button type="submit" class="w-full inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-[#BA9D79] text-white font-semibold shadow hover:bg-[#a88569] transition">
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M10 18h4v-2h-4v2zm-7-9v2h18V9H3zm3-4v2h12V5H6zm-3 12v2h18v-2H3z"/></svg>
            Aplicar filtros
          </button>
          <button type="button" id="openMap" class="w-full inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl border border-neutral-300 text-neutral-800 hover:bg-neutral-50 transition">
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M15 19l-6-3-6 3V5l6-3 6 3 6-3v14l-6 3zM9 6.74v8.52l6 3V9.74l-6-3z"/></svg>
            Ver mapa
          </button>
        </div>

      </form>
    </aside>

    {{-- Contenido (listado) --}}
    <section class="lg:col-span-9">
      {{-- Toolbar superior: contador + orden --}}
      <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">
        @php $total = $propiedades->count(); @endphp
        <p class="text-sm text-neutral-600">
          <span class="font-semibold text-neutral-900">{{ $total }}</span> propiedades encontradas
        </p>

      
      </div>

      {{-- Grid de cards --}}
      @if($propiedades->isEmpty())
        <div class="rounded-2xl border border-neutral-200 bg-white p-10 text-center">
          <div class="mx-auto mb-3 w-12 h-12 rounded-full bg-[#09121b]/5 flex items-center justify-center">
            <svg class="w-6 h-6 text-[#09121b]" viewBox="0 0 24 24" fill="currentColor"><path d="M9.5 9a2.5 2.5 0 115 0v1h1a3.5 3.5 0 010 7h-7a3.5 3.5 0 010-7h1V9z"/></svg>
          </div>
          <p class="font-semibold text-neutral-800">Sin resultados</p>
          <p class="text-sm text-neutral-500">Ajusta los filtros para ver más propiedades.</p>
        </div>
      @else
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
     @foreach ($propiedades as $propiedad)
  <article id="card-{{ $propiedad->id }}"
           data-id="{{ $propiedad->id }}"
           class="bg-white rounded-2xl shadow-md ring-1 ring-neutral-200/70 overflow-hidden group hover:shadow-lg hover:ring-[#09121b]/30 transition">

    <!-- Imagen -->
    <div class="relative h-48">
      <img src="{{ asset($propiedad->imagenes->first()->ruta ?? 'images/default.jpg') }}"
           alt="{{ $propiedad->titulo }}"
           class="w-full h-full object-cover group-hover:scale-[1.03] transition-transform duration-500">

      <!-- Gradiente inferior -->
      <div class="absolute inset-x-0 bottom-0 h-20 bg-gradient-to-t from-[#09121b]/70 via-[#09121b]/30 to-transparent"></div>

      <!-- Ubicación -->
      <span class="absolute top-3 left-3 inline-flex items-center gap-1 text-xs font-semibold px-2.5 py-1 rounded-full bg-white/95 text-[#09121b] shadow">
        {{ Str::limit($propiedad->ubicacion, 26) }}
      </span>

      <!-- Botón Favorito -->
      <form action="{{ route('favoritos.toggle', $propiedad->id) }}" method="POST" class="absolute top-3 right-3">
        @csrf
        <button type="submit">
          @if(auth()->check() && auth()->user()->favoritos->contains($propiedad->id))
              <!-- Corazón lleno -->
              <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" 
                   class="w-7 h-7 text-red-500 drop-shadow" viewBox="0 0 24 24">
                  <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 
                           5.42 4.42 3 7.5 3c1.74 0 3.41 0.81 
                           4.5 2.09C13.09 3.81 14.76 3 16.5 
                           3 19.58 3 22 5.42 22 8.5c0 
                           3.78-3.4 6.86-8.55 11.54L12 
                           21.35z"/>
              </svg>
          @else
              <!-- Corazón vacío -->
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" 
                   stroke-width="2" class="w-7 h-7 text-white hover:text-red-500 transition drop-shadow" 
                   viewBox="0 0 24 24">
                  <path d="M12.1 8.64l-.1.1-.11-.1C10.14 6.73 7.5 6.9 
                           6.1 8.28c-1.4 1.39-1.47 3.63-.06 
                           5.04L12 19l5.96-5.68c1.41-1.41 
                           1.34-3.65-.06-5.04-1.4-1.39-4.04-1.55-5.8 
                           0z"/>
              </svg>
          @endif
        </button>
      </form>
    </div>

    <!-- Contenido -->
    <div class="p-5">
      <h3 class="text-lg font-bold text-neutral-900 group-hover:text-[#09121b] transition">
        {{ $propiedad->titulo }}
      </h3>

      <!-- Iconos / detalles -->
      <div class="mt-3 grid grid-cols-2 gap-3 text-sm text-neutral-600">
        <div class="flex items-center gap-2">
          <svg class="w-4 h-4 text-[#5f6b7a]" viewBox="0 0 24 24" fill="currentColor"><path d="M7 10h10v8H7z"/><path d="M4 10h16l-2-5H6z"/></svg>
          {{ $propiedad->habitaciones }} hab.
        </div>
        <div class="flex items-center gap-2">
          <svg class="w-4 h-4 text-[#5f6b7a]" viewBox="0 0 24 24" fill="currentColor"><path d="M5 3h14v6H5z"/><path d="M7 9h10v12H7z"/></svg>
          {{ $propiedad->banos }} baños
        </div>
        <div class="flex items-center gap-2">
          <svg class="w-4 h-4 text-[#5f6b7a]" viewBox="0 0 24 24" fill="currentColor"><path d="M3 13h18v6H3z"/><path d="M7 7h10v6H7z"/></svg>
          {{ $propiedad->parqueos }} parqueo
        </div>
        <div class="flex items-center gap-2">
          <svg class="w-4 h-4 text-[#5f6b7a]" viewBox="0 0 24 24" fill="currentColor"><path d="M4 4h16v16H4z"/></svg>
          {{ $propiedad->area_terreno }} m²
        </div>
      </div>

      <!-- Footer: precio + botón -->
      <div class="mt-5 flex items-center justify-between">
        <span class="text-xl font-extrabold text-[#09121b]">
          ${{ number_format($propiedad->precio, 2) }}
        </span>
        <a href="{{ route('page.mas', $propiedad->id) }}"
           class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-gradient-to-r from-[#071c34] to-[#1b2a3a] text-white text-sm font-semibold hover:from-[#BA9D79] hover:to-[#c9a98a] transition">
          Ver más
          <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M13 5l7 7-7 7M5 12h14"/></svg>
        </a>
      </div>
    </div>
  </article>
@endforeach



        </div>

       
        @if(method_exists($propiedades, 'links'))
          <div class="mt-6">{{ $propiedades->withQueryString()->links() }}</div>
        @endif
      @endif
    </section>
  </div>
</div>

{{-- Modal del mapa --}}
<div id="mapModal" class="hidden fixed inset-0 z-50 flex items-center justify-center">
  <!-- Fondo oscuro -->
  <div class="absolute inset-0 bg-black/60" id="mapOverlay"></div>

  <!-- Contenido -->
  <div class="relative w-[92%] max-w-5xl bg-white rounded-2xl shadow-2xl overflow-hidden">
    <!-- Header -->
    <div class="flex items-center justify-between px-5 py-3 border-b">
      <h3 class="text-lg font-semibold text-neutral-900">Mapa de propiedades</h3>
      <button id="closeMap" class="p-2 rounded-md hover:bg-neutral-100" aria-label="Cerrar mapa">
        <i class="fas fa-times text-neutral-700 text-lg"></i>
      </button>
    </div>
    <!-- Cuerpo con el mapa -->
    <div id="map" class="w-full h-[70vh]"></div>
  </div>
</div>


<script>
  const modal = document.getElementById('mapModal');
  const openBtn = document.getElementById('openMap');
  const closeBtn = document.getElementById('closeMap');
  const overlay = document.getElementById('mapOverlay');

  openBtn?.addEventListener('click', () => modal.classList.remove('hidden'));
  closeBtn?.addEventListener('click', () => modal.classList.add('hidden'));
  overlay?.addEventListener('click', () => modal.classList.add('hidden'));
</script>


  <script>
    let lastHighlightedCard = null;  // Variable para almacenar la última tarjeta resaltada

    function initMap() {
        const map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: 13.6929, lng: -89.2182 },
            zoom: 9
        });

        const propiedades = @json($propiedades);

        propiedades.forEach(function(propiedad) {
            // Verifica que las coordenadas no sean nulas ni vacías
            const lat = propiedad.lat ? parseFloat(propiedad.lat) : null;
            const lng = propiedad.lng ? parseFloat(propiedad.lng) : null;

            // Si las coordenadas son nulas o no son números válidos, se omiten
            if (lat === null || lng === null || isNaN(lat) || isNaN(lng)) {
                console.error("Invalid or missing coordinates for property:", propiedad);
                return;  // Ignora esta propiedad si no tiene coordenadas válidas
            }

            // Crear un marcador
            const marker = new google.maps.Marker({
                position: { lat: lat, lng: lng },
                map: map,
                title: propiedad.titulo
            });

            // Asociar el marcador con la tarjeta correspondiente
            marker.addListener('click', function() {
                // Eliminar resaltado de la tarjeta previamente seleccionada
                if (lastHighlightedCard) {
                    lastHighlightedCard.classList.remove('highlight');
                }

                // Resaltar la tarjeta de la propiedad al hacer clic en el marcador
                const card = document.querySelector(`#card-${propiedad.id}`);
                if (card) {
                    // Aplica el estilo de resaltar la tarjeta
                    card.classList.add('highlight'); // Usamos una clase CSS para resaltar
                    card.scrollIntoView({ behavior: 'smooth', block: 'center' });  // Mueve la tarjeta al centro
                }

                // Actualizar la última tarjeta resaltada
                lastHighlightedCard = document.querySelector(`#card-${propiedad.id}`);
            });
        });
    }

    window.onload = function() {
        initMap();
    };
  </script>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6rLn1Fnx9hlBPRk7zVQUssjIvJGqQuYE&callback=initMap" async defer></script>

@endsection
