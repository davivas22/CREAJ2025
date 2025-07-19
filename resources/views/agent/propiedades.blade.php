@extends('layout.sidebaragent')

@section('contenido')




<!-- Tailwind version del dashboard (estructura completa incluyendo vista GRID tipo cards) -->
<div class="flex flex-col h-full w-full bg-white text-gray-800 p-6">
  <!-- Header -->
  <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold">Mis Propiedades</h1>
    <div class="flex items-center gap-3">
      <a href="{{route('agente.crear')}}">
         <button class=" font-bold bg-dorado text-white text-sm px-4 py-1.5 rounded hover:bg-black transition">Crear Propiedad</button>
      </a>
     
    </div>
  </div>

  <!-- Acciones y filtros -->
  <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
    <input type="text" placeholder="Search..." class="bg-white border border-gray-300 text-gray-800 text-sm px-4 py-1.5 rounded focus:outline-none focus:ring-2 focus:ring-black w-full max-w-xs" />
    <div class="flex items-center gap-2">
      <div class="relative">
        <button class="jsFilter flex items-center bg-white text-gray-800 border border-gray-300 text-sm px-3 py-1.5 rounded hover:bg-gray-100">
          <span class="mr-2">Filter</span>
          <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/>
          </svg>
        </button>
        <!-- Menú desplegable (oculto por defecto, control con JS) -->
        <div class="filter-menu absolute right-0 mt-2 bg-white text-gray-800 p-4 rounded shadow-lg w-56 hidden z-10 border border-gray-200">
          <label class="block text-sm mb-1">Category</label>
          <select class="bg-white text-sm w-full mb-4 p-2 rounded border border-gray-300">
            <option>All Categories</option>
            <option>Furniture</option>
            <option>Decoration</option>
            <option>Kitchen</option>
            <option>Bathroom</option>
          </select>
          <label class="block text-sm mb-1">Status</label>
          <select class="bg-white text-sm w-full mb-4 p-2 rounded border border-gray-300">
            <option>All Status</option>
            <option>Active</option>
            <option>Disabled</option>
          </select>
          <div class="flex justify-between">
            <button class="text-xs px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">Reset</button>
            <button class="text-xs px-3 py-1 bg-black text-white rounded hover:bg-gray-800">Apply</button>
          </div>
        </div>
      </div>
      <!-- Vistas -->
      <button class="grid active flex items-center px-2 py-1.5 bg-black text-white text-sm rounded border border-gray-300 hover:bg-gray-800">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/>
        </svg>
      </button>
      <button class="list flex items-center px-2 py-1.5 bg-white text-gray-800 text-sm rounded border border-gray-300 hover:bg-gray-100">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/>
        </svg>
      </button>
    </div>
  </div>

  <!-- Vista GRID: Cards -->
  <div class="products-area-wrapper gridView grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Card Propiedad -->
   @foreach ($propiedades as $propiedad)
    <div class="relative group bg-white p-4 rounded shadow hover:shadow-md border border-gray-200 transition">
      <!-- Imagen -->
      <img src="{{asset($propiedad->imagenes->first()->ruta)}}" alt="Imagen propiedad" class="w-full h-40 object-cover rounded mb-4 transform transition-transform duration-500 group-hover:scale-105" />

      <!-- Título -->
      <h3 class="text-lg font-semibold text-gray-800 group-hover:text-dorado transition-all">
        {{$propiedad->titulo}}
      </h3>

      <!-- Datos principales -->
      <p class="text-sm text-gray-600">Ubicación: {{$propiedad->ubicacion}}</p>
       <p class="text-sm text-gray-600">
        Tipo:
        <span class="  mb-1 inline-block ml-1 px-2 py-0.5 text-xs rounded {{ $propiedad->estado === 'casa' ? 'bg-blue-300 text-white' : 'bg-blue-400 text-white' }}">
          {{$propiedad->tipo}}
        </span>
      </p>
      <p class="text-sm text-gray-600">
        Estado:
        <span class="inline-block ml-1 px-2 py-0.5 text-xs rounded {{ $propiedad->estado === 'Activo' ? 'bg-green-100 text-green-600' : 'bg-green-200 text-black' }}">
          {{$propiedad->estado}}
        </span>
      </p>
      

      <!-- Precio -->
      <p class="mt-3 text-xl font-bold text-gray-800">${{$propiedad->precio}}</p>

      <!-- Íconos: habitaciones, baños, parqueo -->
      <div class="flex items-center gap-4 mt-2 text-gray-500 text-sm">
        <div class="flex items-center gap-1">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16M4 6h16M4 14h16M4 18h16" /></svg>
          {{$propiedad->habitaciones}} hab
        </div>
        <div class="flex items-center gap-1">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m2 0a2 2 0 11-4 0 2 2 0 114 0zm-4 8a8 8 0 100-16 8 8 0 000 16z" /></svg>
          {{$propiedad->banos}} baños
        </div>
        <div class="flex items-center gap-1">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12h18M9 21v-6h6v6m-6 0H6a2 2 0 01-2-2v-2a2 2 0 012-2h3m6 0h3a2 2 0 012 2v2a2 2 0 01-2 2h-3" /></svg>
          {{$propiedad->parqueos}} est.
        </div>
      </div>

      <!-- Acciones flotantes -->
    <div class="absolute top-3 right-3 opacity-0 group-hover:opacity-100 flex space-x-2 transition-opacity z-10">
  <!-- Editar -->
  <a href="{{ route('agente.editar.propiedad.store', $propiedad->id) }}"
     class="bg-blue-200 text-gray-700 hover:bg-blue-300 p-2 rounded-full shadow-sm transition">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125"/>
    </svg>
  </a>

  <!-- Eliminar -->
  <form method="POST" action="{{ route('agente.editar.propiedad.destroy', $propiedad->id) }}"
        onsubmit="return confirm('¿Estás seguro que deseas eliminar esta propiedad?');">
    @csrf
    @method('DELETE')
    <button type="submit"
            class="bg-red-100 text-red-600 hover:bg-red-200 p-2 rounded-full shadow-sm transition">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
      </svg>
    </button>
  </form>
</div>

    </div>
  @endforeach

    
  </div>
</div>



<style>
  .products-area-wrapper.gridView {
    display: grid;
  }

  .products-area-wrapper.tableView {
    display: block;
  }

  .products-area-wrapper.tableView > div {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1rem;
    background-color: #fff;
    margin-bottom: 1rem;
    border-radius: 0.5rem;
    transition: background 0.3s ease;
  }

  .products-area-wrapper.tableView > div:hover {
    background-color: #fff;
  }

  .products-area-wrapper.tableView img {
    width: 3rem;
    height: 3rem;
    object-fit: cover;
    border-radius: 0.25rem;
  }

  .products-area-wrapper.tableView h3 {
    font-size: 1rem;
    font-weight: 600;
  }

  .products-area-wrapper.tableView p {
    font-size: 0.875rem;
  }
</style>

<script>
    document.querySelector(".jsFilter").addEventListener("click", function () {
  document.querySelector(".filter-menu").classList.toggle("active");
});

document.querySelector(".grid").addEventListener("click", function () {
  document.querySelector(".list").classList.remove("bg-black", "text-white");
  document.querySelector(".list").classList.add("bg-white", "text-gray-800");

  document.querySelector(".grid").classList.add("bg-black", "text-white");
  document.querySelector(".grid").classList.remove("bg-white", "text-gray-800");

  document.querySelector(".products-area-wrapper").classList.add("gridView");
  document.querySelector(".products-area-wrapper").classList.remove("tableView");
});

document.querySelector(".list").addEventListener("click", function () {
  document.querySelector(".grid").classList.remove("bg-black", "text-white");
  document.querySelector(".grid").classList.add("bg-white", "text-gray-800");

  document.querySelector(".list").classList.add("bg-black", "text-white");
  document.querySelector(".list").classList.remove("bg-white", "text-gray-800");

  document.querySelector(".products-area-wrapper").classList.remove("gridView");
  document.querySelector(".products-area-wrapper").classList.add("tableView");
});


var modeSwitch = document.querySelector('.mode-switch');
modeSwitch.addEventListener('click', function () {                      document.documentElement.classList.toggle('light');
 modeSwitch.classList.toggle('active');
});
</script>

@endsection
