@extends('layout.sidebaradmin')

@section('content')
 <section class="max-w-7xl mx-auto px-6 py-8">
  <!-- Header -->
  <div class="flex items-center justify-between gap-4">
    <div>
      <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Reseñas</h1>
      <p class="text-sm text-gray-500">Mensajes de contacto, comentarios de propiedades y reseñas de agentes.</p>
    </div>
    <span class="hidden md:inline-flex items-center gap-2 rounded-full bg-[#BA9D79]/10 text-[#BA9D79] px-3 py-1 text-xs font-semibold">
      <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 3l1.9 5.9H20l-4.9 3.6 1.9 5.9L12 14.8 6.9 18.4 8.8 12.5 4 8.9h6.1L12 3z"/></svg>
      Panel Reseñas
    </span>
  </div>
<!-- Tabs -->
<nav class="mt-6 flex flex-wrap items-center gap-3" data-tabs role="tablist" aria-label="Filtros de reseñas">
 
  <button data-tab="contact" role="tab" aria-selected="true"
    class="tab-btn rounded-full px-5 py-2 text-sm font-semibold border border-gray-200 bg-white text-gray-700
           transition-all duration-300 ease-in-out hover:text-[#0B1F3A] hover:border-[#BA9D79] hover:bg-[#BA9D79]/10 hover:shadow-md hover:-translate-y-0.5
           focus:outline-none focus:ring-2 focus:ring-[#BA9D79]">
    Contacto
  </button>



  <button data-tab="agent" role="tab" aria-selected="false"
    class="tab-btn rounded-full px-5 py-2 text-sm font-semibold border border-gray-200 bg-white text-gray-700
           transition-all duration-300 ease-in-out hover:text-[#0B1F3A] hover:border-[#BA9D79] hover:bg-[#BA9D79]/10 hover:shadow-md hover:-translate-y-0.5
           focus:outline-none focus:ring-2 focus:ring-[#BA9D79]">
    Agentes
  </button>
</nav>


  <!-- Panels -->
  <div class="mt-6 space-y-8">
   
    <!-- Panel: Contacto -->
    <div data-panel="contact" class="tab-panel hidden">
      <div class="overflow-hidden rounded-xl border">
        <table class="min-w-full text-sm">
          <thead class="bg-gray-50 text-gray-600">
            <tr>
              <th class="px-4 py-3 text-left font-medium">Nombre</th>
              <th class="px-4 py-3 text-left font-medium">Email</th>
              <th class="px-4 py-3 text-left font-medium">Asunto</th>
              <th class="px-4 py-3 text-left font-medium">Mensaje</th>
              <th class="px-4 py-3 text-left font-medium">Estado</th>
             
            </tr>
          </thead>
          <tbody class="divide-y">
            @foreach ($mensajes_contacto as $mensaje )
                   <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 font-medium text-gray-900">{{$mensaje->name}}</td>
                    <td class="px-4 py-3">{{$mensaje->email}}</td>
                    <td class="px-4 py-3">{{$mensaje->subject}}</td>
                    <td class="px-4 py-3 text-gray-600">{{$mensaje->message}}</td>
                    <td class="px-4 py-3"><span class="inline-flex rounded-full bg-yellow-50 text-yellow-700 border border-yellow-200 px-2 py-0.5 text-xs">Pendiente</span></td>
                    
            @endforeach
         
          </tbody>
        </table>
      </div>
    </div>

    <!-- Panel: Propiedades -->
    <div data-panel="property" class="tab-panel hidden">
      <div class="overflow-hidden rounded-xl border">
        <table class="min-w-full text-sm">
          <thead class="bg-gray-50 text-gray-600">
            <tr>
              <th class="px-4 py-3 text-left font-medium">Propiedad</th>
              <th class="px-4 py-3 text-left font-medium">Título</th>
              <th class="px-4 py-3 text-left font-medium">Rating</th>
              <th class="px-4 py-3 text-left font-medium">Comentario</th>
              <th class="px-4 py-3 text-left font-medium">Estado</th>
              <th class="px-4 py-3 text-right font-medium">Acciones</th>
            </tr>
          </thead>
          <tbody class="divide-y">
            <tr class="hover:bg-gray-50">
              <td class="px-4 py-3 font-medium text-gray-900">Casa #A-120</td>
              <td class="px-4 py-3">Buen vecindario</td>
              <td class="px-4 py-3">4 ⭐</td>
              <td class="px-4 py-3 text-gray-600">Amplia y luminosa, cerca de…</td>
              <td class="px-4 py-3"><span class="inline-flex rounded-full bg-green-50 text-green-700 border border-green-200 px-2 py-0.5 text-xs">Aprobada</span></td>
              <td class="px-4 py-3 text-right"><button class="text-[#BA9D79] hover:underline">Ver</button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Panel: Agentes -->
    <div data-panel="agent" class="tab-panel hidden">
      <div class="overflow-hidden rounded-xl border">
        <table class="min-w-full text-sm">
          <thead class="bg-gray-50 text-gray-600">
            <tr>
              <th class="px-4 py-3 text-left font-medium">Agente</th>
              <th class="px-4 py-3 text-left font-medium">usuario</th>
              <th class="px-4 py-3 text-left font-medium">rating</th>
              <th class="px-4 py-3 text-left font-medium">fecha</th>
              
            </tr>
          </thead>
          <tbody class="divide-y">
            @foreach ( $ratings as $rating )
              <tr class="hover:bg-gray-50">
              <td class="px-4 py-3 font-medium text-gray-900">{{$rating->agente->user->name}}</td>
              <td class="px-4 py-3">{{$rating->user->name}}</td>
              <td class="px-4 py-3 text-gray-600">{{-- Estrellas visuales --}}
                        @for ($i = 1; $i <= 5; $i++)
                            <span class="{{ $i <= $rating->rating ? 'text-yellow-500' : 'text-gray-300' }}">★</span>
                        @endfor</td>
              <td class="px-4 py-2">
                        {{ $rating->created_at->format('d/m/Y') }}
                    </td>
    
            </tr>
            @endforeach
            
          </tbody>
            <div class="mt-4">
                {{ $ratings->links() }}
            </div>
        </table>
      </div>
    </div>
  </div>
</section>





<script>
  // Toggle visual activo/inactivo y paneles
  (function(){
    const nav = document.querySelector('[data-tabs]');
    if(!nav) return;
    const btns = [...nav.querySelectorAll('.tab-btn')];
    const panels = document.querySelectorAll('.tab-panel');

    const active = "bg-[#0B1F3A] text-white border-[#0B1F3A] shadow-lg -translate-y-0.5 scale-105";
    const inactive = "border-gray-200 bg-white text-gray-700";

    function show(tab){
      // botones
      btns.forEach(b => {
        const isActive = b.dataset.tab === tab;
        b.setAttribute('aria-selected', isActive ? 'true' : 'false');
        b.classList.remove(...active.split(" "), ...inactive.split(" "));
        if(isActive){
          b.classList.add(...active.split(" "));
        }else{
          b.classList.add(...inactive.split(" "));
        }
      });
      // paneles
      panels.forEach(p => {
        p.classList.toggle('hidden', p.dataset.panel !== tab);
      });
    }

    btns.forEach(b => b.addEventListener('click', () => show(b.dataset.tab)));
    // inicial
    show('contact');
  })();
</script>



@endsection