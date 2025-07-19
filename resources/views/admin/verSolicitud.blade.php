@extends('layout.sidebaradmin')


@section('content')

<div class="max-w-4xl mx-auto mt-10 bg-white border border-gray-200 rounded-2xl shadow-lg overflow-hidden">

  <!-- Encabezado -->
  <div class="flex items-center gap-6 bg-[#f9f9f9] px-8 py-6 border-b">
    <img src="{{ asset($solicitud->user->foto_perfil) }}" alt="Foto de perfil"
         class="w-20 h-20 object-cover rounded-full border-4 border-white shadow-md">
    <div>
      <h2 class="text-2xl font-bold text-gray-800">{{ $solicitud->name }}</h2>
      <p class="text-sm text-gray-500">{{ $solicitud->email }} • {{ $solicitud->phone }}</p>
      <p class="text-xs text-gray-400">Solicitud enviada {{ $solicitud->created_at->diffForHumans() }}</p>
    </div>
  </div>

  <!-- Información general -->
  <div class="px-8 py-6 space-y-6 text-gray-700 text-sm">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div>
        <p class="font-semibold text-gray-500 mb-1">Zona de trabajo</p>
        <div class="bg-gray-50 px-4 py-2 rounded-xl shadow-inner">{{ $solicitud->zona }}</div>
      </div>
      <div>
        <p class="font-semibold text-gray-500 mb-1">Licencia</p>
        <div class="bg-gray-50 px-4 py-2 rounded-xl shadow-inner">{{ $solicitud->licencia }}</div>
      </div>
      <div>
        <p class="font-semibold text-gray-500 mb-1">Años de experiencia</p>
        <div class="bg-gray-50 px-4 py-2 rounded-xl shadow-inner">{{ $solicitud->experiencia }} años</div>
      </div>
      <div>
        <p class="font-semibold text-gray-500 mb-1">Especialidad</p>
        <div class="bg-gray-50 px-4 py-2 rounded-xl shadow-inner">{{ $solicitud->especialidad ?? 'No especificado' }}</div>
      </div>
      <div>
        <p class="font-semibold text-gray-500 mb-1">Red social (opcional)</p>
        <div class="bg-gray-50 px-4 py-2 rounded-xl shadow-inner">{{ $solicitud->red_social ?? 'No proporcionada' }}</div>
      </div>
      <div>
        <p class="font-semibold text-gray-500 mb-1">Teléfono adicional</p>
        <div class="bg-gray-50 px-4 py-2 rounded-xl shadow-inner">{{ $solicitud->telefono_adicional ?? 'No proporcionado' }}</div>
      </div>
    </div>

    <!-- Mensaje del solicitante -->
    <div>
      <p class="text-gray-500 font-semibold mb-2">📝 Descripción personal</p>
      <div class="bg-gray-50 p-4 rounded-xl text-sm text-gray-700 leading-relaxed shadow-inner">
        "{{ $solicitud->mensaje }}"
      </div>
    </div>

    <!-- Razón y descripción -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div>
        <p class="font-semibold text-gray-500 mb-1">Razón de postulación</p>
        <div class="bg-gray-50 px-4 py-2 rounded-xl shadow-inner">
          {{ $solicitud->razon ?? 'No especificada' }}
        </div>
      </div>
    
      </div>
    </div>
  </div>

  <!-- Botones -->
  <div class="px-8 py-5 border-t bg-white flex justify-end gap-3">
    <form action="{{ route('admin.solicitudes.aceptar', $solicitud->id) }}" method="POST">
      @csrf
      <button class="bg-green-600 hover:bg-green-700 text-white text-sm px-6 py-2 rounded-full font-semibold shadow">
        ✅ Aceptar
      </button>
    </form>
    <form action="{{ route('admin.solicitudes.rechazar', $solicitud->id) }}" method="POST">
      @csrf
      <button class="bg-red-600 hover:bg-red-700 text-white text-sm px-6 py-2 rounded-full font-semibold shadow">
        ❌ Rechazar
      </button>
    </form>
  </div>
</div>

@endsection