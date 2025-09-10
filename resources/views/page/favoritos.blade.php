@extends('layout.app')

@section('content')

<div class="flex flex-col h-full w-full bg-white text-gray-800 p-6">
  
  @if($favoritos->isEmpty())
    <div class="flex items-center justify-center h-96">
        <p class="text-lg text-gray-600 mb-300 uppercase font-bold">No hay Favoritos</p>
    </div>
    @else
  <h1 class="text-3xl font-bold mb-8">Tus favoritos</h1>
  <div class="flex items-center gap-2 mb-6">
    <button class="grid active flex items-center px-2 py-1 bg-black text-white text-sm rounded border border-gray-300 hover:bg-gray-800">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <rect x="3" y="3" width="7" height="7"/>
        <rect x="14" y="3" width="7" height="7"/>
        <rect x="14" y="14" width="7" height="7"/>
        <rect x="3" y="14" width="7" height="7"/>
      </svg>
    </button>
    <button class="list flex items-center px-2 py-1 bg-white text-gray-800 text-sm rounded border border-gray-300 hover:bg-gray-100">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <line x1="8" y1="6" x2="21" y2="6"/>
        <line x1="8" y1="12" x2="21" y2="12"/>
        <line x1="8" y1="18" x2="21" y2="18"/>
        <line x1="3" y1="6" x2="3.01" y2="6"/>
        <line x1="3" y1="12" x2="3.01" y2="12"/>
        <line x1="3" y1="18" x2="3.01" y2="18"/>
      </svg>
    </button>
  </div>

    @endif
 
  

 
  <div class="products-area-wrapper gridView grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($favoritos as $favorito)
      <div class="relative group bg-white p-4 rounded shadow hover:shadow-md border border-gray-200 transition">
    

       <div class="relative h-40">
        
  <img src="{{ asset($favorito->imagenes->first()->ruta ?? 'images/default.jpg') }}" 
       alt="Imagen propiedad" 
       class="w-full h-full object-cover rounded mb-4 transform transition-transform duration-500 group-hover:scale-105" />

  <!-- Botón Favorito (relleno) -->
  <form action="{{ route('favoritos.toggle', $favorito->id) }}" method="POST" 
        class="absolute top-2 right-2 z-10"
        onsubmit="return confirm('¿Quieres quitar esta propiedad de favoritos?')">
    @csrf
    <button type="submit">
      <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" 
           class="w-7 h-7 text-red-500 hover:text-red-600 transition" 
           viewBox="0 0 24 24">
        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 
                 2 5.42 4.42 3 7.5 3c1.74 0 3.41 0.81 
                 4.5 2.09C13.09 3.81 14.76 3 16.5 
                 3 19.58 3 22 5.42 22 8.5c0 
                 3.78-3.4 6.86-8.55 11.54L12 
                 21.35z"/>
      </svg>
    </button>

  </form>
<!-- Checkbox para comparar -->
<div class="absolute top-2 left-3">
  <input type="checkbox" 
         name="comparar[]" 
         value="{{ $favorito->id }}" 
         class="comparar-checkbox w-6 h-6 accent-[#BA9D79] border-2 border-white rounded-md shadow-md cursor-pointer">
</div>


</div>

       
        <h3 class="text-lg font-semibold text-gray-800 group-hover:text-dorado transition-all">
          {{ $favorito->titulo }}
        </h3>

      
        <p class="text-sm text-gray-600">Ubicación: {{ $favorito->ubicacion }}</p>
        <p class="text-sm text-gray-600">Tipo: 
          <span class="ml-1 px-2 py-0.5 text-xs rounded bg-blue-400 text-white">{{ $favorito->tipo }}</span>
        </p>
        <p class="text-sm text-gray-600">Estado: 
          <span class="ml-1 px-2 py-0.5 text-xs rounded bg-green-100 text-green-600">{{ $favorito->estado }}</span>
        </p>

      
        <p class="mt-3 text-xl font-bold text-gray-800">${{ $favorito->precio }}</p>

       
        <div class="flex items-center gap-4 mt-2 text-gray-500 text-sm">
          <div class="flex items-center gap-1">🛏️ {{ $favorito->habitaciones }} hab</div>
          <div class="flex items-center gap-1">🛁 {{ $favorito->banos }} baños</div>
          <div class="flex items-center gap-1">🚗 {{ $favorito->parqueos }} est.</div>
        </div>

       
        <div class="mt-4">
          <a href="{{ route('page.mas', $favorito->id) }}" 
             class="block w-full text-center bg-[#071c34] hover:bg-black text-white px-4 py-2 rounded font-medium transition">
            Ver más
          </a>
        </div>
      </div>
    @endforeach
      
  
  </div>
 <form id="formComparar" action="{{ route('page.comparar.propiedades') }}" method="GET" 
      class="hidden opacity-0 translate-y-4 transition duration-500 ease-in-out">
    <input type="hidden" name="ids" id="compararInput">
    <button type="submit" id="btnComparar" 
            class="fixed top-10 right-6 px-5 py-3 rounded-full bg-[#1f66e9] text-white font-bold shadow-lg hover:bg-[#BA9D79] transition">
        Comparar
    </button>
</form>


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
    padding: 0.75rem;
    background-color: #fff;
    margin-bottom: 0.75rem;
    border-radius: 0.5rem;
    border: 1px solid #e5e7eb;
    transition: background 0.3s ease;
  }
  .products-area-wrapper.tableView img {
    width: 4rem;
    height: 3rem;
    object-fit: cover;
    border-radius: 0.25rem;
    margin-right: 1rem;
  }
  .products-area-wrapper.tableView h3 {
    font-size: 0.9rem;
    font-weight: 600;
  }
  .products-area-wrapper.tableView p {
    font-size: 0.8rem;
    color: #4b5563;
  }
</style>
<div id="toast" class="fixed top-20 right-5 bg-[#09121b] text-white px-4 py-2 rounded shadow-lg hidden z-50">
    Propiedad añadida a la comparación ✅
</div>

<script>
  const checkboxes = document.querySelectorAll('.comparar-checkbox');
const toast = document.getElementById('toast');
const formComparar = document.getElementById('formComparar');
const input = document.getElementById('compararInput');

function showToast(msg) {
    toast.textContent = msg;
    toast.classList.remove('hidden');
    setTimeout(() => {
        toast.classList.add('hidden');
    }, 2000);
}

checkboxes.forEach(chk => {
    chk.addEventListener('change', () => {
        let seleccionados = [...checkboxes].filter(c => c.checked).map(c => c.value);

        if (seleccionados.length > 2) {
            chk.checked = false;
            alert("⚠️ Solo puedes comparar 2 propiedades a la vez");
            return;
        }

        if (chk.checked) {
            showToast("Propiedad añadida a la comparación ✅");
        } else {
            showToast("Propiedad quitada de la comparación ❌");
        }

        if (seleccionados.length === 2) {
            formComparar.classList.remove("hidden");
            setTimeout(() => {
                formComparar.classList.remove("opacity-0", "translate-y-4");
                formComparar.classList.add("opacity-100", "translate-y-0");
            }, 10);
            input.value = seleccionados.join(",");
        } else {
            formComparar.classList.add("opacity-0", "translate-y-4");
            setTimeout(() => formComparar.classList.add("hidden"), 300);
            input.value = "";
        }
    });
});

</script>





<script>
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
</script>

@endsection