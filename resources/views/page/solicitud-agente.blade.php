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
        <option value="" disabled >¿Tiene licencia?</option>
        <option value="si" {{ old('licencia') == 'si' ? 'selected' : '' }}>Sí</option>
        <option value="no" {{ old('licencia') == 'no' ? 'selected' : '' }}>No</option>
    </select>
    @error('licencia')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror

    {{-- Zona --}}
    <input type="text" name="zona" placeholder="Zona de trabajo" value="{{ old('zona') }}" class="w-full mb-2 p-2 border rounded">
    @error('zona')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror

    {{-- Mensaje --}}
    <textarea name="mensaje" placeholder="Mensaje" class="w-full mb-2 p-2 border rounded">{{ old('mensaje') }}</textarea>
    @error('mensaje')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror

    {{-- Foto --}}
    <input type="file" name="photo" class="w-full mb-4">
    @error('photo')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror

    <button type="submit"
            class="w-full bg-[#BA9D79] text-white font-semibold py-3 rounded-md hover:bg-[#a3835c] transition-colors duration-300">
      Enviar Solicitud
    </button>
  </form>
</div>

@endsection