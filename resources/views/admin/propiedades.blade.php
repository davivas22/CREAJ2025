@extends('layout.sidebaradmin')

@section('content')

 <section class="max-w-7xl mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold mb-8 text-black">Administración de Propiedades</h1>

    <!-- Filtros -->
    <div class="bg-white shadow-md rounded-xl p-6 mb-8 grid grid-cols-1 md:grid-cols-5 gap-4">
        <input type="text" placeholder="Buscar por título o ubicación" class="col-span-2 px-4 py-2 border border-gray-300 rounded-md focus:outline-none">
        <select class="px-4 py-2 border border-gray-300 rounded-md">
            <option>Tipo</option>
            <option>Casa</option>
            <option>Apartamento</option>
        </select>
        <select class="px-4 py-2 border border-gray-300 rounded-md">
            <option>Estado</option>
            <option>Publicado</option>
            <option>Borrador</option>
        </select>
        <button class="bg-[#BA9D79] text-white rounded-md px-6 py-2 hover:bg-[#a88a67] transition">Buscar</button>
    </div>

    <!-- Tabla -->
    <div class="overflow-x-auto rounded-xl shadow-lg bg-white">
        <table class="min-w-full text-sm text-gray-700">
            <thead class="bg-[#F7F5F2] text-xs uppercase text-black">
                <tr>
                    
                    <th class="px-6 py-4 text-left">Imagen</th>
                    <th class="px-6 py-4 text-left">Título</th>
                    <th class="px-6 py-4 text-left">Ubicación</th>
                    <th class="px-6 py-4 text-left">Dueño / Agente</th>
                    <th class="px-6 py-4 text-left">Precio</th>
                    <th class="px-6 py-4 text-left">Estado</th>
                    <th class="px-6 py-4 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
               @foreach ($propiedades as $propiedad )
                  <tr class="border-b hover:bg-gray-50 transition">
                   <td class="px-6 py-4">
                    <img 
                        src="{{ asset($propiedad->imagenes->first()->ruta) }}" 
                        alt="propiedad" 
                        class="w-28 h-20 object-cover rounded-md border border-gray-300 shadow-sm"
                    >
                    </td>

                    <td class="px-6 py-4 font-medium text-black">{{ $propiedad->titulo }}</td>
                    <td class="px-6 py-4">{{ $propiedad->ubicacion }}</td>
                    <td class="px-3 py-4">
                       <div class="flex items-center gap-2">
                        <div class="h-8 w-8 bg-gray-200 rounded-full overflow-hidden">
                            <img src="{{ asset($propiedad->user->foto_perfil) }}" alt="" class="h-full w-full object-cover">
                        </div>
                        <span class="text-sm font-semibold"> {{ $propiedad->user->name }}</span>
                        </div>

                    </td>
                    <td class="px-6 py-4 text-black font-bold"><span class=" text-black">$</span>{{ $propiedad->precio }}</td>
                    <td class="px-6 py-4">
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">Publicado</span>
                    </td>
                  <td class="px-6 py-4">
                    <div class="flex flex-wrap gap-2">
                        <a href="{{route('admin.editar.propiedades', $propiedad->id)}}" class="px-3 py-1.5 rounded bg-blue-600 text-white text-xs font-medium hover:bg-[#a3835c] transition">
                        Editar
                        </a>
                        <form action="{{route('agente.editar.propiedad.destroy' , $propiedad->id)}}" method="POST" onsubmit="return confirm('¿Eliminar esta propiedad?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-3 py-1.5 rounded bg-red-600 text-white text-xs font-medium hover:bg-red-700 transition">
                            Eliminar
                        </button>
                        </form>
                    </div>
                    </td>
                </tr>
               @endforeach
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
  <div class=" mt-6">
    {{$propiedades->links()}}
  </div>
</section>

@endsection