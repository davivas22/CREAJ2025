@extends('layout.sidebaragent')

@section('contenido')
<div class="max-w-6xl mx-auto mt-10 bg-white rounded-2xl shadow-xl border border-gray-200 overflow-hidden">
  <!-- Formulario profesional arriba -->
  <div class="p-8 bg-white">
 <!-- Título centrado y botón "Eliminar" a la derecha -->
<div class="flex justify-between items-center mb-4">
  <h2 class="text-3xl font-bold text-gray-800 text-center w-full">Editar Propiedad</h2>
  <form action="{{ route('agente.editar.propiedad.destroy', $propiedad->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta propiedad?');" class="relative text-center">
    @csrf
    @method('DELETE')
    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 shadow relative">
       Eliminar
    </button>
  </form>
</div>

    @if(session('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
        {{ session('success') }}
      </div>
    @endif

    <form action="{{route('agente.editar.propiedad.store',$propiedad->id)}}" method="POST" enctype="multipart/form-data" class="space-y-6">
      @csrf
      @method('PUT')

      <div>
        <label class="block text-gray-700 font-semibold mb-1">Título</label>
        <input type="text" name="titulo" value="{{ old('titulo', $propiedad->titulo) }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-dorado/50">
        @error('titulo')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
      </div>

      <div>
        <label class="block text-gray-700 font-semibold mb-1">Descripción</label>
        <textarea name="descripcion" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-dorado/50">{{ old('descripcion', $propiedad->descripcion) }}</textarea>
        @error('descripcion')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-gray-700 font-semibold mb-1">Precio</label>
          <input type="number" step="0.01" name="precio" value="{{ old('precio', $propiedad->precio) }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-dorado/50">
          @error('precio')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
          <label class="block text-gray-700 font-semibold mb-1">Tipo</label>
          <select name="tipo" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-dorado/50">
            <option value="casa" {{ $propiedad->tipo == 'casa' ? 'selected' : '' }}>Casa</option>
            <option value="apartamento" {{ $propiedad->tipo == 'apartamento' ? 'selected' : '' }}>Apartamento</option>
            <option value="terreno" {{ $propiedad->tipo == 'terreno' ? 'selected' : '' }}>Terreno</option>
          </select>
          @error('tipo')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
      </div>

      <!-- Parámetros adicionales -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
          <label for="habitaciones" class="block text-sm font-medium text-gray-700">Habitaciones</label>
          <input type="number" id="habitaciones" name="habitaciones" min="0" value="{{ old('habitaciones', $propiedad->habitaciones) }}" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-dorado focus:border-dorado">
          @error('habitaciones')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
          <label for="banos" class="block text-sm font-medium text-gray-700">Baños</label>
          <input type="number" id="banos" name="banos" min="0" value="{{ old('banos', $propiedad->banos) }}" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-dorado focus:border-dorado">
          @error('banos')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
          <label for="parqueos" class="block text-sm font-medium text-gray-700">Parqueos</label>
          <input type="number" id="parqueos" name="parqueos" min="0" value="{{ old('parqueos', $propiedad->parqueos) }}" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-dorado focus:border-dorado">
          @error('parqueos')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label for="terreno" class="block text-sm font-medium text-gray-700">Área del terreno (m²)</label>
          <input type="number" id="terreno" name="area_terreno" min="0" value="{{ old('area_terreno', $propiedad->area_terreno) }}" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-dorado focus:border-dorado">
          @error('terreno')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
          <label for="construccion" class="block text-sm font-medium text-gray-700">Área construida (m²)</label>
          <input type="number" id="construccion" name="area_construccion" min="0" value="{{ old('area_construccion', $propiedad->area_construccion) }}" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-dorado focus:border-dorado">
          @error('construccion')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>
      </div>

      <!-- Ubicación -->
      <div class="space-y-6">
        <h3 class="text-lg font-semibold text-gray-700 border-b border-gray-200 pb-2">Ubicación</h3>
        <div>
          <label for="ubicacion" class="block text-sm font-medium text-gray-700">Dirección / Colonia / Zona</label>
          <input type="text" id="ubicacion" name="ubicacion" value="{{ old('ubicacion', $propiedad->ubicacion) }}" required class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-dorado focus:border-dorado">
          @error('ubicacion')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>
      </div>

      <div>
        <label class="block text-gray-700 font-semibold mb-1">Subir nuevas imágenes</label>
        <input type="file" name="imagenes[]" multiple class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-dorado/50">
        @error('imagenes')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
      </div>

      <div class="flex justify-end gap-4">
        <a href="{{route('agente.propiedades')}}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Cancelar</a>
        <button type="submit" class="px-6 py-2 bg-dorado text-white rounded hover:bg-dorado/80">Guardar Cambios</button>
      </div>
    </form>
  </div>

  <!-- Slider al final -->
  <div class="w-full relative overflow-hidden rounded-b-2xl mt-6">
    <div id="slider" class="flex transition-transform duration-700 ease-in-out">
      @foreach($propiedad->imagenes as $imagen)
        <img src="/{{ $imagen->ruta }}" alt="Imagen propiedad" class="w-full max-h-[300px] object-contain flex-shrink-0">
      @endforeach
    </div>
    <button type="button" onclick="moveSlide(-1)" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-black px-3 py-2 rounded-full shadow-md transition">←</button>
    <button type="button" onclick="moveSlide(1)" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-black px-3 py-2 rounded-full shadow-md transition">→</button>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const slider = document.getElementById('slider');
    const slides = slider.children;
    let index = 0;

    function moveSlide(direction) {
      index += direction;
      if (index < 0) index = slides.length - 1;
      if (index >= slides.length) index = 0;
      slider.style.transform = `translateX(-${index * 100}%)`;
    }

    window.moveSlide = moveSlide;
    setInterval(() => moveSlide(1), 6000);
  });
</script>
@endsection