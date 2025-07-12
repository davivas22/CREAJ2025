@extends('layout.sidebaradmin')

@section('content')
<!-- Encabezado -->
<div class="container mx-auto px-4 py-8">
  <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
    <div>
      <h1 class="text-3xl font-extrabold text-black flex items-center gap-2">
        Gestión de Agentes
      </h1>
      <p class="text-sm text-gray-500 mt-1">Administra solicitudes y controla perfiles de agentes registrados.</p>
    </div>

    <div class="flex gap-3 w-full md:w-auto">
      <input
        type="text"
        id="buscador"
        onkeyup="filtrarSolicitudes()"
        placeholder="Buscar por nombre..."
        class="w-full md:w-64 px-4 py-2 border border-black rounded-xl shadow-sm focus:ring focus:ring-[#BA9D79] text-sm"
      >
      <a
        href="{{ route('admin.solicitud.agente')}}"
        class="bg-[#BA9D79] text-white px-4 py-2 rounded-xl hover:bg-[#a88c6c] transition text-sm shadow-md"
      >
        Ver Solicitudes
      </a>
    </div>
  </div>

      @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

 <!-- Cards -->
  <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
    @foreach ($agentes as $agente)
    <div class="bg-white rounded-3xl shadow-lg transition-transform duration-300 transform hover:scale-[1.02] hover:shadow-2xl overflow-hidden relative p-6 text-black">
      <div class="flex items-center gap-4 mb-5">
        <img src="{{ $agente->foto_perfil ?? 'https://randomuser.me/api/portraits/lego/1.jpg' }}" alt="Foto de {{ $agente->name }}" class="w-16 h-16 rounded-full object-cover ring-4 ring-black shadow-md">
        <div class="flex-1">
          <h2 class="text-xl font-bold">{{ $agente->name }}</h2>
          <p class="text-sm text-gray-600">{{ $agente->email }}</p>
          <p class="text-sm text-gray-600">{{ $agente->phone ?? 'Teléfono no disponible' }}</p>
        </div>
        <span class="text-xs font-semibold px-3 py-1 rounded-full shadow-sm {{ $agente->estado === 'Activo' ? 'bg-green-100 text-green-700' : 'bg-white text-green-600' }}">
          {{ $agente->estado ?? 'Activo' }}
        </span>
      </div>

      <div class="flex justify-between items-center text-sm">
              <button onclick="mostrarModal({{ $agente->id }})" class="flex items-center gap-2 text-white bg-[#BA9D79] hover:bg-black transition px-4 py-2 rounded-full font-semibold">
          Ver más
        </button>
        <div class="flex gap-3">
          <a href="" title="Editar agente" class="text-black hover:text-black transition">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
          </svg>

          </a>
          <form action="{{route('admin.agentes.destroy', $agente->id)}}" method="POST" onsubmit="return confirm('¿Eliminar agente?')">
            @csrf
            @method('DELETE')
            <button class="text-red-500 hover:text-red-700 transition" title="Eliminar agente" type="submit">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
              </svg>

            </button>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div id="modal-{{ $agente->id }}" onclick="cerrarModalClickFuera(event, {{ $agente->id }})" class="hidden fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 p-4">
      <div class="bg-white border-2 border-black rounded-xl shadow-xl max-w-lg w-full p-6 relative" onclick="event.stopPropagation()">
        <button onclick="cerrarModal({{ $agente->id }})" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>

        <div class="text-center">
          <img src="{{ $agente->foto_perfil ?? 'https://randomuser.me/api/portraits/lego/1.jpg' }}" class="w-24 h-24 mx-auto rounded-full border-4 border-[#BA9D79] object-cover">
          <h3 class="text-2xl font-bold mt-4 text-black">{{ $agente->name }}</h3>
          <p class="text-sm text-gray-600">{{ $agente->email }}</p>
          <p class="text-sm text-gray-600">{{ $agente->telefono }}</p>
        </div>

        <div class="mt-6 text-sm text-gray-700 space-y-2">
          <p><strong>Experiencia:</strong> {{ $agente->agente->experiencia ?? 'No especificada' }} años</p>
          <p><strong>Zona:</strong> {{ $agente->agente->zona ?? 'No definida' }}</p>
          <p><strong>Licencia:</strong> {{ $agente->agente->licencia ?? 'No' }}</p>
          <p><strong>Propiedades:</strong> {{ $agente->agente->propiedades ?? 0 }}</p>
          <p><strong>Contactos:</strong> {{ $agente->agente->usuarios_contacto ?? 0 }}</p>
          <p><strong>Descripción:</strong> <br><span class="italic text-gray-600">{{ $agente->agente->descripcion ?? 'Sin descripción' }}</span></p>
        </div>

        <div class="mt-6 text-right">
          <button onclick="cerrarModal({{ $agente->id }})" class="px-4 py-2 bg-[#BA9D79] text-white rounded hover:bg-[#a88c6c]">
            Cerrar
          </button>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

<script>
  function mostrarModal(id) {
    document.getElementById('modal-' + id).classList.remove('hidden');
  }

  function cerrarModal(id) {
    document.getElementById('modal-' + id).classList.add('hidden');
  }

  function cerrarModalClickFuera(event, id) {
    if (event.target.id === 'modal-' + id) {
      cerrarModal(id);
    }
  }
</script>



@endsection