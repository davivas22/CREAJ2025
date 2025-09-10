@extends('layout.sidebaradmin')

@section('content')


<div class="max-w-3xl mx-auto mt-10 px-4">

    {{-- Mensaje de éxito --}}
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.perfil.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- 📸 Foto de perfil -->
        <div class="bg-white rounded-xl shadow p-6 text-center space-y-4">
            <h2 class="text-2xl font-bold text-gray-800">Foto de perfil</h2>
            <div class="relative group w-36 h-36 mx-auto rounded-full overflow-hidden border-4 border-[#BA9D79] shadow-md">
                <img id="preview" src="{{ asset($user->foto_perfil) }}" alt="Foto de perfil" class="w-full h-full object-cover">
                <label for="foto_perfil" class="absolute inset-0 bg-black/60 text-white text-sm flex items-center justify-center opacity-0 group-hover:opacity-100 cursor-pointer transition">
                    Cambiar foto
                </label>
                <input type="file" name="foto_perfil" id="foto_perfil" class="hidden" onchange="previewImage(event)">
            </div>
            @error('foto_perfil')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <!-- 📋 Información personal -->
        <div class="bg-white rounded-xl shadow p-6 space-y-6">
            <h2 class="text-xl font-bold text-gray-800 flex items-center gap-2">📋 Información personal</h2>

            <div class="grid md:grid-cols-2 gap-6">
                <!-- Nombre -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Nombre</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#BA9D79] {{ $errors->has('name') ? 'border-red-500' : 'border-gray-300' }}">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-1">Correo</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-[#BA9D79] {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }}">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        

        <!-- BOTÓN -->
        <div class="text-right">
            <button type="submit"
                class="px-8 py-3 bg-[#BA9D79] text-white text-lg font-semibold rounded-md hover:bg-[#a2825c] transition">
                Guardar Cambios
            </button>
        </div>
    </form>
</div>

<!-- JS PREVIEW DE IMAGEN -->
<script>
    function previewImage(event) {
        const input = event.target;
        const reader = new FileReader();
        reader.onload = function () {
            document.getElementById('preview').src = reader.result;
        }
        if (input.files[0]) {
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection