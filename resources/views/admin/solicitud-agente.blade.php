@extends('layout.sidebaradmin')

@section('content')
 
<div class="container mx-auto px-4 py-6">
    
    @if($solicitud->isEmpty())
    <div class="flex items-center justify-center h-96">
        <p class="text-lg text-gray-600">No hay solicitudes</p>
    </div>
    @else
  <h1 class="text-3xl font-bold mb-8">Solicitudes Recibidas</h1>

    @endif


     @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

@foreach ($solicitud as $solicitudes)
  <div class="bg-white rounded-2xl shadow border border-gray-200 overflow-hidden hover:shadow-lg transition max-w-3xl mx-auto mb-6">

    <!-- Encabezado -->
    <div class="flex items-center gap-4 px-6 py-5 bg-[#f9f9f9] border-b">
      <img src="{{ asset($solicitudes->user->foto_perfil) }}" alt="Foto" class="w-14 h-14 object-cover rounded-full border-2 border-white shadow">
      <div>
        <h3 class="text-lg font-bold text-gray-800">{{ $solicitudes->name }}</h3>
        <p class="text-sm text-gray-500">{{ $solicitudes->email }}</p>
        <p class="text-xs text-gray-400">Hace {{ $solicitudes->created_at->diffForHumans() }}</p>
      </div>
    </div>

    <!-- Información clave -->
    <div class="px-6 py-4 grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm text-gray-700">
      <div>
        <span class="font-semibold text-gray-500">Zona:</span>
        <div class="bg-gray-50 p-2 rounded-xl mt-1 shadow-inner">{{ $solicitudes->zona }}</div>
      </div>
      <div>
        <span class="font-semibold text-gray-500">Licencia:</span>
        <div class="bg-gray-50 p-2 rounded-xl mt-1 shadow-inner">{{ $solicitudes->licencia }}</div>
      </div>
      <div>
        <span class="font-semibold text-gray-500">Experiencia:</span>
        <div class="bg-gray-50 p-2 rounded-xl mt-1 shadow-inner">{{ $solicitudes->experiencia }} años</div>
      </div>
    </div>

    <!-- Footer con botón -->
    <div class="px-6 py-4 border-t flex justify-between items-center bg-white">
      <a href="{{route('Admin.verSolicitud',$solicitudes->id)}}" 
         class="text-sm text-dorado font-semibold hover:underline hover:text-dorado/80 ">
         Ver más
      </a>
      <div class="flex gap-2">
        <form action="{{ route('admin.solicitudes.aceptar', $solicitudes->id) }}" method="POST">
          @csrf
          <button class="bg-green-600 hover:bg-green-700 text-white text-sm px-4 py-1.5 rounded-full shadow font-semibold">
            Aceptar
          </button>
        </form>
        <form action="{{ route('admin.solicitudes.rechazar', $solicitudes->id) }}" method="POST">
          @csrf
          <button class="bg-red-600 hover:bg-red-700 text-white text-sm px-4 py-1.5 rounded-full shadow font-semibold">
            Rechazar
          </button>
        </form>
      </div>
    </div>
  </div>
@endforeach





@endsection