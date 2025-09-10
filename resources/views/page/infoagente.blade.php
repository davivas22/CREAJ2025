@extends('layout.app')

@section('content')


<div class="container mx-auto h-screen py-10 px-8 relative">
  <div class="flex w-full rounded-lg h-full lg:overflow-hidden overflow-auto lg:flex-row flex-col shadow-2xl">

    <!-- Columna Izquierda - Info del Agente -->
    <div class="lg:w-1/3 bg-[#0F172A] text-white flex flex-col">
      <div class="p-8 shadow-md relative">
        <!-- Foto y Nombre -->
        <div class="flex items-center gap-4">
          <img src="{{asset($agente->foto_perfil)}}" class="w-20 h-20 rounded-full object-cover object-top border-4 border-[#BA9D79]" />
          <div>
            <h1 class="font-bold text-2xl">{{$agente->name}}</h1>
            <p class="text-sm text-[#BA9D79]">Agente Inmobiliario</p>
          </div>
        </div>

       <p class="mt-2 text-sm text-gray-600">
    Promedio: {{ $agente->agente->average_rating ?? '0' }} ⭐ 
    {{ $agente->ratings_count }} 
</p>



    

     <form action="{{ route('agente.rate', $agente->agente->id) }}" method="POST" id="rating-form">
    @csrf
    <div class="flex items-center gap-1" id="rating">
       @for ($i = 1; $i <= 5; $i++)
    <svg class="w-7 h-7 cursor-pointer {{ $i <= ($userRating ?? 0) ? 'text-[#BA9D79]' : 'text-gray-400' }}"
         data-value="{{ $i }}"
         fill="currentColor" viewBox="0 0 24 24">
        <path d="M12 .587l3.668 7.57 8.332 1.151-6.064 5.885 1.48 8.312L12 18.897l-7.416 4.608 1.48-8.312L0 9.308l8.332-1.151z"/>
    </svg>
          @endfor

    </div>
    <input type="hidden" name="rating" id="rating-input">
</form>



        <p class="text-sm mt-2 text-gray-300" id="rating-value">Tu Calificación: {{$userRating}}/5</p>

        <!-- Información Detallada -->
        <div class="mt-6 space-y-3 text-sm">
          <p><span class="font-semibold text-[#BA9D79]">Experiencia:</span> {{$agente->agente->experiencia}} años </p>
          <p><span class="font-semibold text-[#BA9D79]">Especialidad:</span> {{$agente->agente->especialidad}}</p>
          <p><span class="font-semibold text-[#BA9D79]">Teléfono:</span> +503 {{$agente->phone}}</p>
          <p><span class="font-semibold text-[#BA9D79]">Teléfono extra:</span> +503 {{ $agente->agente->telefono_adicional ?? 'N/A' }}</p>
          <p><span class="font-semibold text-[#BA9D79]">Email:</span> {{$agente->email}}</p>
          <p><span class="font-semibold text-[#BA9D79]">Descripción:</span>{{$agente->agente->descripcion}}</p>
                    <p><span class="font-semibold text-[#BA9D79]">Zona:</span>{{$agente->agente->zona}}</p>
        </div>
      </div>
    </div>

    <!-- Columna Derecha - Propiedades en tabla -->
    <div class="lg:w-2/3 bg-white text-gray-800 flex flex-col">
      <div class="p-6 flex items-center border-b">
        <h1 class="text-xl font-bold text-[#0F172A]">Propiedades del Agente</h1>
      </div>

      <div class="flex-1 overflow-auto">
        <table class="min-w-full text-left text-sm">
          <thead class=" bg-white  text-black">
            <tr>
              <th class="px-4 py-3 ">Imagen</th>
              <th class="px-4 py-3">Título</th>
              <th class="px-4 py-3">Características</th>
              <th class="px-4 py-3">Precio</th>
              <th class="px-4 py-3 text-right">Acciones</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            @foreach ( $propiedades as $propiedad )
           
                 <tr>
                        <td class="px-4 py-3">
                            <img src="{{asset($propiedad->imagenes->first()->ruta)}}" class="w-20 h-14 object-cover rounded" />
                        </td>
                        <td class="px-4 py-3 font-medium">{{$propiedad->titulo}}</td>
                        <td class="px-4 py-3 text-gray-600">{{$propiedad->habitaciones}} habitaciones · {{$propiedad->banos}}baños</td>
                        <td class="px-4 py-3 font-semibold">${{$propiedad->precio}}</td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{route('page.mas', $propiedad->id)}}">
                                 <button class="bg-[#BA9D79] hover:bg-[#a2855f] text-white px-3 py-1 rounded">Ver más</button>
                            </a>
                           
                        </td>
            </tr>
            @endforeach

            

           
            
          </tbody>
        </table>
           <!-- 🔽 Links de paginación aquí -->
        <div class="mt-4 px-4">
            {{ $propiedades->links() }}
        </div>

      </div>
    </div>
  </div>
</div>

<script>
    const stars = document.querySelectorAll('#rating svg');
    const ratingInput = document.getElementById('rating-input');
    const form = document.getElementById('rating-form');
  let currentRating = @json($userRating ?? 0);
 

    function highlight(rating) {
        stars.forEach(s => {
            if (s.dataset.value <= rating) {
                s.classList.add('text-[#FFD700]');
                s.classList.remove('text-gray-400');
            } else {
                s.classList.add('text-gray-400');
                s.classList.remove('text-[#BA9D79]');
            }
        });
    }

    stars.forEach(star => {
        star.addEventListener('mouseover', () => highlight(star.dataset.value));
        star.addEventListener('mouseout', () => highlight(currentRating));
        star.addEventListener('click', () => {
            currentRating = star.dataset.value;
            ratingInput.value = currentRating;
            form.submit(); // guarda el nuevo rating
        });
    });

    // Pintar estrellas según lo que el usuario ya votó
    highlight(currentRating);
</script>




@endsection