@extends('layout.sidebaradmin')

@section('content')

<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold mb-8">Solicitudes Recibidas</h1>
     @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

  @foreach ($solicitud as $solicitudes)
    <div class="group relative bg-white rounded-2xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl">
      <!-- Encabezado -->
      <div class="flex items-center p-5">
        <div class="w-14 h-14 bg-blue-50 rounded-full flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18 19a6 6 0 10-12 0M12 11a4 4 0 100-8 4 4 0 000 8z" />
          </svg>
        </div>
        <div class="ml-4">
          <h3 class="text-lg font-bold text-gray-800">{{ $solicitudes->name }}</h3>
          <p class="text-sm text-gray-500">{{ $solicitudes->email }}</p>
          <p class="text-sm text-gray-500">Experiencia: {{ $solicitudes->experiencia }} años</p>
        </div>
      </div>

      <!-- Botón Ver más -->
      <div class="border-t px-5 py-2 text-right">
        <button onclick="toggleDetalles(this)" class="text-sm text-blue-600 hover:underline transition">
          Ver más detalles
        </button>
      </div>

      <!-- Contenido expandible -->
      <div class="hidden px-5 pb-5 space-y-2 text-sm text-gray-700 transition-all duration-300">
        <p><span class="font-semibold">Teléfono:</span> {{ $solicitudes->phone }}</p>
        <p><span class="font-semibold">Licencia:</span> {{ $solicitudes->licencia }}</p>
        <p><span class="font-semibold">Zona de trabajo:</span> {{ $solicitudes->zona }}</p>
        <p><span class="font-semibold">Mensaje:</span> {{ $solicitudes->mensaje }}</p>
        <p class="text-gray-500 text-xs">Enviado: {{ $solicitudes->created_at->diffForHumans() }}</p>

        <!-- Botones de acción -->
        <div class="flex gap-3 pt-2">
          <form action="{{ route('admin.solicitudes.aceptar', $solicitudes->id) }}" method="post">
            @csrf
            <button class="bg-green-600 hover:bg-green-700 text-white text-xs font-medium px-4 py-2 rounded shadow">
              ✅ Aceptar
            </button>
          </form>

          <form action="{{ route('admin.solicitudes.rechazar', $solicitudes->id) }}" method="post">
            @csrf
            <button class="bg-red-600 hover:bg-red-700 text-white text-xs font-medium px-4 py-2 rounded shadow">
              ❌ Rechazar
            </button>
          </form>
        </div>
      </div>
    </div>
  @endforeach

</div>

<!-- Script para mostrar/ocultar detalles -->
<script>
  function toggleDetalles(button) {
    const detalles = button.closest('.group').querySelector('.pb-5');
    detalles.classList.toggle('hidden');
    button.textContent = detalles.classList.contains('hidden') ? 'Ver más detalles' : 'Ocultar detalles';
  }
</script>



@endsection