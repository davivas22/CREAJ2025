@extends('layout.sidebaragent')

@section('contenido')
 <div class="container mx-auto px-4 py-8">
  <h2 class="text-3xl font-bold mb-8 text-gray-900 tracking-tight">Mis Propiedades</h2>


     @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach ($propiedades as $propiedad)
      <a href="{{route('agente.editar.propiedad',$propiedad->id)}}" class="group block bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-300 border border-gray-100">

        <div class="relative group rounded-2xl shadow-lg border border-gray-200 overflow-hidden transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 bg-white">
  <!-- Imagen -->
  <div class="overflow-hidden">
    <img src="{{asset($propiedad->imagenes->first()->ruta)}}"
         alt="Imagen propiedad"
         class="w-full h-48 object-cover transform transition-transform duration-500 group-hover:scale-105">
  </div>

  <!-- Contenido -->
  <div class="p-4 space-y-2">
    <h3 class="text-lg font-semibold text-gray-800 group-hover:text-dorado transition-all">
      {{$propiedad->titulo}}
    </h3>
    <p class="text-gray-500 text-sm leading-snug">
      {{$propiedad->descripcion}}
    </p>

    <!-- Precio y Tipo -->
    <div class="flex items-center justify-between pt-2">
      <span class="text-dorado font-bold text-lg">${{$propiedad->precio}}</span>
      <span class="text-xs bg-dorado/10 text-dorado px-3 py-1 rounded-full uppercase">
        {{$propiedad->tipo}}
      </span>
    </div>
  </div>

  <!-- Acciones flotantes -->
  <div class="absolute top-2 right-2 flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10">
    <!-- Editar -->
    <button onclick="editarPropiedad()" class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-full shadow-md transition">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L7.5 21H3v-4.5L16.732 3.732z" />
      </svg>
    </button>
    <!-- Eliminar -->
 <form action="{{route('agente.editar.propiedad.destroy', $propiedad->id)}}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta propiedad?');" class="inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-full shadow-md transition">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>
</form>

  </div>
</div>
      </a>
    @endforeach
  </div>
</div>

<script>
  function editarPropiedad() {
  }

  function eliminarPropiedad() {
    if (confirm('¿Estás seguro de eliminar esta propiedad?')) {
      alert('Propiedad eliminada');
      // Aquí iría el submit del form o llamada AJAX
    }
  }
</script>


@endsection