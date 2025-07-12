@extends('layout.app')

@section('content')
<div class="max-w-xl mx-auto bg-white shadow-md rounded-md p-6 my-10">
  <h2 class="text-2xl font-semibold text-[#BA9D79] mb-6 text-center">Solicitud para Convertirse en Agente</h2>
@if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

  <form action="{{route('solicitud.store')}}" method="POST" class="space-y-5" enctype="multipart/form-data">
    @csrf

    {{-- Nombre --}}
    <input type="text" name="name" placeholder="Nombre completo" value="{{ old('name') }}" class="w-full mb-2 p-2 border rounded">
    @error('name')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror

    {{-- Correo --}}
    <input type="email" name="email" placeholder="Correo electrónico" value="{{ old('email') }}" class="w-full mb-2 p-2 border rounded">
    @error('email')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror

    {{-- Teléfono --}}
    <input type="text" name="phone" placeholder="Teléfono" value="{{ old('phone') }}" class="w-full mb-2 p-2 border rounded">
    @error('phone')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror

    {{-- Años de experiencia --}}
    <input type="number" name="experiencia" placeholder="Años de experiencia" value="{{ old('experiencia') }}" class="w-full mb-2 p-2 border rounded">
    @error('experiencia')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror

    {{-- Licencia --}}
    <select name="licencia" class="w-full mb-2 p-2 border rounded">
        <option value="" disabled selected>¿Tiene licencia?</option>
        <option value="si" {{ old('licencia') == 'si' ? 'selected' : '' }}>Sí</option>
        <option value="no" {{ old('licencia') == 'no' ? 'selected' : '' }}>No</option>
    </select>
    @error('licencia')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror

    {{-- Zona --}}
    <input type="text" name="zona" placeholder="Zona de trabajo o cobertura" value="{{ old('zona') }}" class="w-full mb-2 p-2 border rounded">
    @error('zona')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror

    {{-- Especialidad --}}
    <input type="text" name="especialidad" placeholder="Especialidad (Residencial, Comercial, etc.)" value="{{ old('especialidad') }}" class="w-full mb-2 p-2 border rounded">
    @error('especialidad')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror

    

    {{-- Red social --}}
    <input type="text" name="red_social" placeholder="Usario (Instagram, Facebook...)" value="{{ old('red_social') }}" class="w-full mb-2 p-2 border rounded">
    @error('red_social')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror



    {{-- Razón de la solicitud --}}
    <textarea name="razon" placeholder="¿Por qué deseas convertirte en agente?" class="w-full mb-2 p-2 border rounded">{{ old('razon') }}</textarea>
    @error('razon')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror

    {{-- Descripción personal del agente --}}
    <textarea name="descripcion" placeholder="Descripción personal o biografía profesional" class="w-full mb-2 p-2 border rounded">{{ old('descripcion') }}</textarea>
    @error('descripcion')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror

    {{-- Foto de perfil (obligatoria si aún no tiene una) --}}
    @if (!auth()->user()->foto_perfil)
        <label class="block text-sm font-medium text-gray-700">Foto de perfil (obligatoria)</label>
        <input type="file" name="photo" class="w-full mb-4 border p-2 rounded" required accept="image/*">
        @error('photo')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
    @endif

    <button type="submit"
        class="w-full bg-[#BA9D79] text-white font-semibold py-3 rounded-md hover:bg-[#a3835c] transition-colors duration-300">
        Enviar Solicitud
    </button>
</form>

</div>

@endsection