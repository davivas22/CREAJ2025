@extends('layout.sidebaradmin')

@section('content')
<script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            dorado: '#BA9D79'
          }
        }
      }
    }
  </script>

<div class="max-w-5xl mx-auto mt-10">

 @if(session('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
        {{ session('success') }}
      </div>
    @endif

  <!-- Navegación de tabs mejorada -->
  <div class="flex justify-center gap-6 mb-6">
    <button onclick="showTab('info')" class="tab-btn flex flex-col items-center bg-white shadow-md px-6 py-4 rounded-xl hover:bg-dorado/10 transition border-2 border-transparent">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#BA9D79" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
</svg>

      <span class="font-semibold text-sm text-gray-700">Información</span>
    </button>
    <button onclick="showTab('ubicacion')" class="tab-btn flex flex-col items-center bg-white shadow-md px-6 py-4 rounded-xl hover:bg-dorado/10 transition border-2 border-transparent">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#BA9D79" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
        </svg>

      <span class="font-semibold text-sm text-gray-700">Ubicación</span>
    </button>
    <button onclick="showTab('imagenes')" class="tab-btn flex flex-col items-center bg-white shadow-md px-6 py-4 rounded-xl hover:bg-dorado/10 transition border-2 border-transparent">
     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#BA9D79" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
</svg>

      <span class="font-semibold text-sm text-gray-700">Imágenes</span>
    </button>
  </div>

  <form class="bg-white rounded-xl shadow-xl overflow-hidden" method="POST" action="{{route('agente.editar.propiedad.store', $propiedad->id)}}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div id="tab-info" class="tab-content p-6 space-y-6">
      <h2 class="text-2xl font-bold text-dorado border-b pb-2">Información de la Propiedad</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="text-sm text-gray-600 font-medium mb-1 block">Título</label>
          <input value="{{$propiedad->titulo}}" type="text" name="titulo" placeholder="Título" class="border p-3 rounded-md w-full">
        </div>
        <div>
          <label class="text-sm text-gray-600 font-medium mb-1 block">Precio</label>
          <input  value="{{$propiedad->precio}}" type="number" name="precio" placeholder="Precio" class="border p-3 rounded-md w-full">
        </div>
        <div>
          <label class="text-sm text-gray-600 font-medium mb-1 block">Tipo</label>
          <select name="tipo" class="border p-3 rounded-md w-full">
            <option value="casa">Casa</option>
            <option value="apartamento">Apartamento</option>
          </select>
        </div>

        <div>
            <label class="text-sm text-gray-600 font-medium mb-1 block">Estado</label>
            <select name="estado" class="border p-3 rounded-md w-full">
                <option value="usada" {{ old('estado', $propiedad->estado ?? '') == 'usada' ? 'selected' : '' }}>Usada</option>
                <option value="remodelada" {{ old('estado', $propiedad->estado ?? '') == 'remodelada' ? 'selected' : '' }}>Remodelada</option>
                <option value="nueva" {{ old('estado', $propiedad->estado ?? '') == 'nueva' ? 'selected' : '' }}>Nueva</option>
            </select>
            </div>
        <div class="md:col-span-2">
          <label class="text-sm text-gray-600 font-medium mb-1 block">Descripción</label>
          <textarea name="descripcion" placeholder="Descripción" rows="3" class="border p-3 rounded-md w-full">{{$propiedad->descripcion}}</textarea>
        </div>
      </div>
    </div>

    <div id="tab-ubicacion" class="tab-content p-6 hidden space-y-6">
      <h2 class="text-2xl font-bold text-dorado border-b pb-2">Ubicación</h2>
      <div>
        <label class="text-sm text-gray-600 font-medium mb-1 block">Dirección exacta</label>
        <input value="{{$propiedad->ubicacion}}" type="text" name="ubicacion" placeholder="Dirección exacta" class="border p-3 rounded-md w-full">
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
          <label class="text-sm text-gray-600 font-medium mb-1 block">Área terreno (m²)</label>
          <input value="{{$propiedad->area_terreno}}" type="number" name="area_terreno" placeholder="Área terreno (m²)" class="border p-3 rounded-md w-full">
        </div>
        <div>
          <label class="text-sm text-gray-600 font-medium mb-1 block">Área construida (m²)</label>
          <input  value="{{$propiedad->area_construccion}}" type="number" name="area_construccion" placeholder="Área construida (m²)" class="border p-3 rounded-md w-full">
        </div>
      </div>
    </div>

    <div id="tab-imagenes" class="tab-content p-6 hidden space-y-6">
      <h2 class="text-2xl font-bold text-dorado border-b pb-2">Imágenes</h2>
      <label class="text-sm text-gray-600 font-medium mb-1 block">Subir nuevas imágenes</label>
      <input type="file" name="imagenes[]" multiple class="border p-3 rounded-md w-full">
      <div class="flex flex-wrap gap-4">
        @foreach($propiedad->imagenes as $imagen)
          <div class="w-24 h-24 rounded-md overflow-hidden bg-gray-100 border">
            <img src="/{{ $imagen->ruta }}" class="object-cover w-full h-full" alt="Imagen">
          </div>
        @endforeach
      </div>
    </div>

    <div class="flex justify-between px-6 py-4 border-t mt-4 bg-gray-50 rounded-b-xl">
      <a href="#" class="px-4 py-2 rounded bg-gray-200 hover:bg-gray-300 text-gray-700">Cancelar</a>
      <button type="submit" class="px-6 py-2 rounded bg-dorado text-white hover:bg-[#a3835c]">Guardar Cambios</button>
    </div>
  </form>
</div>

<script>
  function showTab(tab) {
    document.querySelectorAll('.tab-content').forEach(c => c.classList.add('hidden'));
    document.querySelector(`#tab-${tab}`).classList.remove('hidden');

    document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('border-dorado', 'bg-dorado/10'));
    event.currentTarget.classList.add('border-dorado', 'bg-dorado/10');
  }
</script>

@endsection