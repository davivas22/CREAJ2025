@extends('layout.sidebaragent')


@section('contenido')

<div class="max-w-5xl mx-auto bg-white shadow-2xl rounded-3xl overflow-hidden ">

  @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

  <form action="{{route('agente.perfil.update')}}" method="POST" enctype="multipart/form-data" class="grid md:grid-cols-2">
    @csrf
    @method('PUT')

    <!-- Lado Izquierdo: Imagen y fondo oscuro -->
    <div class="bg-black p-10 flex flex-col items-center justify-center gap-6 relative">
      <h2 class="text-3xl text-[#BA9D79] font-bold tracking-wide">Tu Perfil</h2>
      <div class="w-40 h-40 rounded-full overflow-hidden border-4 border-[#BA9D79] shadow-lg">
        <img src="{{ asset($user->foto_perfil) }}" alt="Foto de perfil" class="w-full h-full object-cover">
      </div>
      <label for="foto_perfil" class="text-white text-sm text-center">Cambiar foto</label>
      <input type="file" name="foto_perfil" id="foto_perfil" class="block w-full text-sm text-white file:mr-4 file:py-2 file:px-4
        file:rounded-full file:border-0 file:text-sm file:font-semibold
        file:bg-[#BA9D79] file:text-white hover:file:bg-[#a3835c]">

          @error('foto_perfil')
                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
            @enderror
    </div>

    <!-- Lado Derecho: Formulario -->
    <div class="p-10 space-y-6">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
         <!-- Nombre -->
    <div>
      <label class="block text-gray-700 font-semibold mb-1">Nombre</label>
      <input type="text" name="name" value="{{ old('name', $user->name) }}"
        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#BA9D79]
        {{ $errors->has('name') ? 'border-red-500' : 'border-gray-300' }}">
      @error('name')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <!-- Correo -->
    <div>
      <label class="block text-gray-700 font-semibold mb-1">Correo</label>
      <input type="email" name="email" value="{{ old('email', $user->email) }}"
        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#BA9D79]
        {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }}">
      @error('email')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <!-- Teléfono -->
    <div>
      <label class="block text-gray-700 font-semibold mb-1">Teléfono</label>
      <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#BA9D79]
        {{ $errors->has('phone') ? 'border-red-500' : 'border-gray-300' }}">
      @error('phone')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <!-- Zona -->
    <div>
      <label class="block text-gray-700 font-semibold mb-1">Zona de trabajo</label>
      <input type="text" name="zona" value="{{ old('zona', $user->agente->zona ?? 'No especificado') }}"
        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#BA9D79]
        {{ $errors->has('zona') ? 'border-red-500' : 'border-gray-300' }}">
      @error('zona')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>
  </div>

  <!-- Descripción -->
  <div class="mb-6">
    <label for="descripcion" class="block text-gray-800 text-sm font-semibold mb-2">Descripción</label>
    <textarea name="descripcion" id="descripcion" rows="6"
      class="w-full px-5 py-4 border rounded-xl bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-[#BA9D79]
      shadow-sm resize-none transition duration-300 ease-in-out
      {{ $errors->has('descripcion') ? 'border-red-500' : 'border-gray-300' }}"
      placeholder="Escribe una descripción breve sobre ti...">{{ old('descripcion', $user->agente->descripcion ?? ' ') }}</textarea>
    @error('descripcion')
      <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

    <!-- Experiencia -->
    <div>
      <label for="experiencia" class="block text-gray-800 text-sm font-semibold mb-2">Experiencia (en años)</label>
      <input type="number" name="experiencia" id="experiencia" min="0" max="100"
        value="{{ old('experiencia', $user->agente->experiencia ?? 'No especificada') }}"
        class="w-full px-5 py-3 border rounded-xl bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-[#BA9D79]
        shadow-sm transition duration-300 {{ $errors->has('experiencia') ? 'border-red-500' : 'border-gray-300' }}"
        placeholder="Ej. 3">
      @error('experiencia')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <!-- Red Social -->
    <div>
      <label for="red_social" class="block text-gray-800 text-sm font-semibold mb-2">Usuario de redes sociales</label>
      <input type="text" name="red_social" id="red_social"
        value="{{ old('red_social', $user->agente->red_social ?? '') }}"
        class="w-full px-5 py-3 border rounded-xl bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-[#BA9D79]
        shadow-sm transition duration-300 {{ $errors->has('red_social') ? 'border-red-500' : 'border-gray-300' }}"
        placeholder="Ej. @miusuario">
      @error('red_social')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <!-- Especialidad -->
    <div>
      <label for="especialidad" class="block text-gray-800 text-sm font-semibold mb-2">Especialidad</label>
      <input type="text" name="especialidad" id="especialidad"
        value="{{ old('especialidad', $user->agente->especialidad ?? 'No especificada') }}"
        class="w-full px-5 py-3 border rounded-xl bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-[#BA9D79]
        shadow-sm transition duration-300 {{ $errors->has('especialidad') ? 'border-red-500' : 'border-gray-300' }}"
        placeholder="Ej. Venta de propiedades residenciales">
      @error('especialidad')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <!-- Teléfono adicional -->
    <div>
      <label for="telefono_adicional" class="block text-gray-800 text-sm font-semibold mb-2">Teléfono adicional</label>
      <input type="text" name="telefono_adicional" id="telefono_adicional"
        value="{{ old('telefono_adicional', $user->agente->telefono_adicional ?? ' ') }}"
        class="w-full px-5 py-3 border rounded-xl bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-[#BA9D79]
        shadow-sm transition duration-300 {{ $errors->has('telefono_adicional') ? 'border-red-500' : 'border-gray-300' }}"
        placeholder="Ej. +503 7123-4567">
      @error('telefono_adicional')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

      </div>

      <div class="text-right">
        <button type="submit"
                class="px-8 py-3 bg-[#BA9D79] text-white text-lg font-semibold rounded-md hover:bg-[#a2825c] transition">
          Guardar Cambios
        </button>
      </div>
    </div>
  </form>
</div>
@endsection