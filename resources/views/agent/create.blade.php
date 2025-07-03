@extends('layout.sidebaragent')

@section('contenido')
  
 <div class="min-h-screen flex items-center justify-center p-6">
    <div class="w-full max-w-4xl bg-white shadow-lg rounded-2xl p-10 border-t-4 border-dorado">
      <h2 class="text-2xl font-bold text-dorado mb-6 text-center">Crear nueva propiedad</h2>
         @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
      <form action="{{route('agente.crear.store')}}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        <!-- Sección: Datos generales -->
         <!-- Sección: Datos generales -->
  <div class="space-y-6">
    <div>
      <label for="titulo" class="block text-sm font-medium text-gray-700">Título</label>
      <input type="text" id="titulo" name="titulo" value="{{ old('titulo') }}" required class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-dorado focus:border-dorado">
      @error('titulo')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
      <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
      <textarea id="descripcion" name="descripcion" rows="4" required class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-dorado focus:border-dorado">{{ old('descripcion') }}</textarea>
      @error('descripcion')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
      <label for="precio" class="block text-sm font-medium text-gray-700">Precio ($USD)</label>
      <input type="number" id="precio" name="precio" min="0" step="0.01" value="{{ old('precio') }}" required class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-dorado focus:border-dorado">
      @error('precio')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
      <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo de propiedad</label>
      <select id="tipo" name="tipo" required class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-dorado focus:border-dorado">
        <option value="">Selecciona una opción</option>
        <option value="casa" {{ old('tipo') == 'casa' ? 'selected' : '' }}>Casa</option>
        <option value="apartamento" {{ old('tipo') == 'apartamento' ? 'selected' : '' }}>Apartamento</option>
      </select>
      @error('tipo')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
      <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
      <select id="estado" name="estado" required class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-dorado focus:border-dorado">
        <option value="nueva" {{ old('estado') == 'nueva' ? 'selected' : '' }}>Nueva</option>
        <option value="remodelada" {{ old('estado') == 'remodelada' ? 'selected' : '' }}>Remodelada</option>
        <option value="usada" {{ old('estado') == 'usada' ? 'selected' : '' }}>Usada</option>
      </select>
      @error('estado')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
    </div>
  </div>

  <!-- Sección: Detalles técnicos -->
  <div class="space-y-6">
    <h3 class="text-lg font-semibold text-gray-700 border-b border-gray-200 pb-2">Detalles técnicos</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
      <div>
        <label for="habitaciones" class="block text-sm font-medium text-gray-700">Habitaciones</label>
        <input type="number" id="habitaciones" name="habitaciones" min="0" value="{{ old('habitaciones') }}" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-dorado focus:border-dorado">
        @error('habitaciones')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
      </div>

      <div>
        <label for="banos" class="block text-sm font-medium text-gray-700">Baños</label>
        <input type="number" id="banos" name="banos" min="0" value="{{ old('banos') }}" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-dorado focus:border-dorado">
        @error('banos')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
      </div>

      <div>
        <label for="parqueos" class="block text-sm font-medium text-gray-700">Parqueos</label>
        <input type="number" id="parqueos" name="parqueos" min="0" value="{{ old('parqueos') }}" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-dorado focus:border-dorado">
        @error('parqueos')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
      </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <div>
        <label for="terreno" class="block text-sm font-medium text-gray-700">Área del terreno (m²)</label>
        <input type="number" id="terreno" name="area_terreno" min="0" value="{{ old('terreno') }}" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-dorado focus:border-dorado">
        @error('terreno')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
      </div>

      <div>
        <label for="construccion" class="block text-sm font-medium text-gray-700">Área construida (m²)</label>
        <input type="number" id="construccion" name="area_construccion" min="0" value="{{ old('construccion') }}" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-dorado focus:border-dorado">
        @error('construccion')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
      </div>
    </div>
  </div>

  <!-- Sección: Ubicación -->
  <div class="space-y-6">
    <h3 class="text-lg font-semibold text-gray-700 border-b border-gray-200 pb-2">Ubicación</h3>
    <div>
      <label for="ubicacion" class="block text-sm font-medium text-gray-700">Dirección / Colonia / Zona</label>
      <input type="text" id="ubicacion" name="ubicacion" value="{{ old('ubicacion') }}" required class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-dorado focus:border-dorado">
      @error('ubicacion')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
    </div>
  </div>

  <!-- Sección: Imagen principal -->
  <div class="space-y-6">
    <h3 class="text-lg font-semibold text-gray-700 border-b border-gray-200 pb-2">📷 Imagen</h3>
    <div>
      <label for="imagen" class="block text-sm font-medium text-gray-700">Imagen principal</label>
      <input type="file" id="imagen" name="imagenes[]" multiple accept="image/*" class="mt-1 block w-full rounded-md border border-gray-300 text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-dorado file:text-white hover:file:bg-[#a88966]">
      @error('imagenes')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
    </div>
  </div>

        <!-- Botón -->
        <div class="text-center">
          <button type="submit" class="bg-dorado text-white px-6 py-2 rounded-lg font-semibold shadow hover:bg-[#a88966] transition-all">Publicar propiedad</button>
        </div>
      </form>
    </div>
  </div>

@endsection