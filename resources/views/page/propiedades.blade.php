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

  <div class="max-w-7xl mx-auto px-6 py-8">
    
    <!-- Filtros -->
  <div class="flex flex-wrap  items-center mb-6 gap-6 justify-center">
    <form action="{{ route('page.propiedades') }}" method="GET" class="w-full md:w-auto bg-white p-6 rounded-lg shadow-lg flex gap-4 flex-wrap">
      <h2 class="text-2xl font-semibold text-gray-800 mb-4 w-full text-center">Filtrar propiedades</h2>

       <!-- Filtro tipo de propiedad -->
  <div class="mb-4 w-full sm:w-auto">
    <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo de propiedad:</label>
    <select name="tipo" id="tipo" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-dorado focus:outline-none">
      <option value="">Cualquiera</option>
      <option value="Casa" @if(request('tipo') == 'Casa') selected @endif>Casa</option>
      <option value="Apartamento" @if(request('tipo') == 'Apartamento') selected @endif>Apartamento</option>
    </select>
  </div>

  <!-- Filtro de precio -->
  <div class="mb-4 w-full sm:w-auto">
    <label for="precio" class="block text-sm font-medium text-gray-700">Rango de precio:</label>
    <select name="precio" id="precio" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-dorado focus:outline-none">
      <option value="">Cualquiera</option>
      <option value="$0 - $100k" @if(request('precio') == '$0 - $100k') selected @endif>$0 - $100k</option>
      <option value="$100k - $200k" @if(request('precio') == '$100k - $200k') selected @endif>$100k - $200k</option>
      <option value="$200k - $500k" @if(request('precio') == '$200k - $500k') selected @endif>$200k - $500k</option>
      <option value="$500k+" @if(request('precio') == '$500k+') selected @endif>Más de $500k</option>
      <option value="< $50k" @if(request('precio') == '< $50k') selected @endif>Menos de $50k</option>
    </select>
  </div>

  <!-- Filtro de habitaciones -->
  <div class="mb-4 w-full sm:w-auto">
    <label for="habitaciones" class="block text-sm font-medium text-gray-700">Número de habitaciones:</label>
    <select name="habitaciones" id="habitaciones" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-dorado focus:outline-none">
      <option value="">Cualquiera</option>
      <option value="1" @if(request('habitaciones') == '1') selected @endif>1 habitación</option>
      <option value="2" @if(request('habitaciones') == '2') selected @endif>2 habitaciones</option>
      <option value="3" @if(request('habitaciones') == '3') selected @endif>3 habitaciones</option>
    </select>
  </div>

      <!-- Botón de envío -->
      <div class="mt-6 flex justify-center w-full sm:w-auto">
        <button type="submit" class="w-full px-6 py-3 bg-[#BA9D79] text-white rounded-lg text-sm font-semibold shadow-md hover:bg-[#9f7e6e] transition duration-300 focus:outline-none">
          Filtrar propiedades
        </button>
      </div>
    </form>
  </div>

    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
      <!-- Columna de tarjetas -->
      <div class="h-[600px] overflow-y-auto space-y-6 pr-2">
         @if($propiedades->isEmpty())
        <p class="text-center text-gray-700 font-bold mt-4 uppercase">No hay resultados que coincidan con los filtros aplicados.</p>
      @else
        @foreach ($propiedades as $propiedad)
          <div 
            id="card-{{ $propiedad->id }}"
            data-id="{{ $propiedad->id }}"
            class="card-propiedad bg-white rounded-2xl shadow-md overflow-hidden flex flex-col md:flex-row transform transition-all duration-300 hover:shadow-xl hover:-translate-y-1 hover:scale-[1.02] group cursor-pointer"
            data-lat="{{ $propiedad->latitud }}"
            data-lng="{{ $propiedad->longitud }}"
            data-titulo="{{ $propiedad->titulo }}"
            data-ubicacion="{{ $propiedad->ubicacion }}"
            data-precio="{{ $propiedad->precio }}"
          >
            
            <div class="relative w-full md:w-1/3 h-48 md:h-auto">
              <img src="{{ asset($propiedad->imagenes->first()->ruta ?? 'images/default.jpg') }}" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
            </div>

            
            <div class="p-5 flex flex-col justify-between flex-grow">
              <div>
                <h3 class="text-lg font-bold text-gray-800 mb-1 group-hover:text-dorado transition-colors duration-300">{{ $propiedad->titulo }}</h3>
                <p class="text-sm text-gray-500 mb-3">{{ $propiedad->ubicacion }}</p>

               
                <div class="grid grid-cols-2 gap-x-4 gap-y-2 text-gray-600 text-sm">
                  <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-dorado" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M4 6h16v10H4z" />
                    </svg>
                    {{ $propiedad->habitaciones }} hab.
                  </div>
                  <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-dorado" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6M7 16h10a2 2 0 002-2V6H5v8a2 2 0 002 2z" />
                    </svg>
                    {{ $propiedad->banos }} baños
                  </div>
                  <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-dorado" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 16V9a1 1 0 011-1h12a1 1 0 011 1v7M5 16h14v2a1 1 0 01-1 1h-1a1 1 0 01-1-1v-1H8v1a1 1 0 01-1 1H6a1 1 0 01-1-1v-2z" />
                    </svg>
                    {{ $propiedad->parqueos }} parqueo
                  </div>
                  <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-dorado" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h16v16H4V4z" />
                    </svg>
                    {{ $propiedad->area_terreno }} m²
                  </div>
                </div>
              </div>

             
              <div class="flex justify-between items-end mt-4">
                <span class="text-xl font-bold text-dorado">${{ number_format($propiedad->precio, 2) }}</span>
                <a href="{{route('page.mas', $propiedad->id)}}"   class=" bg-[#BA9D79] text-white px-4 py-2 rounded-full text-sm hover:bg-yellow-700 transition duration-300">Ver mas</a>
               
              </div>
            </div>
          </div>
        @endforeach
         @endif
      </div>
    

      <!-- Columna del mapa -->
      <div class="rounded-xl shadow-md overflow-hidden h-[600px]">
        <div id="map" class="w-full h-full"></div>
      </div>
    </div>
  </div>
   

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
