@extends('layout.app')

@section('content')


  <!-- Hero con Título y Precio -->
  <section class="mx-auto max-w-7xl px-4 sm:px-6 py-6">
    <div class="flex flex-wrap items-end justify-between gap-4">
      <div>
        <h1 class="text-2xl sm:text-3xl font-semibold tracking-tight">{{$propiedad->titulo}}</h1>
        <p class="mt-1 text-neutral-600">{{$propiedad->ubicacion}}</p>
      </div>
      <div class="text-right">
        <div class="text-2xl sm:text-3xl font-bold">${{$propiedad->precio}}</div>
        <div class="text-sm text-neutral-500">Financiamiento disponible</div>
      </div>
    </div>
  </section>

  <!-- Contenido principal -->
  <main class="mx-auto max-w-7xl px-4 sm:px-6 grid grid-cols-1 lg:grid-cols-12 gap-6 pb-16">
    <!-- Columna Izquierda: Slider + Info de propiedad -->
    <div class="lg:col-span-8 flex flex-col gap-6">
      <!-- Media Slider -->
      <section class="relative bg-white rounded-2xl shadow-soft overflow-hidden">
        <div class="relative">
          <div id="slider" class="relative aspect-[16/9] bg-neutral-200">
            <!-- Slides (imágenes demo) -->

            @foreach($propiedad->imagenes as $imagen)
    
                    <img src="/{{ $imagen->ruta }}" class="slide absolute inset-0 h-full w-full object-cover opacity-0 transition-opacity duration-500" src="https://images.unsplash.com/photo-1554995207-c18c203602cb?q=80&w=2069&auto=format&fit=crop" alt="Imagen">
                
                @endforeach
          </div>

          <!-- Controles -->
          <button id="prevBtn" class="group absolute left-3 top-1/2 -translate-y-1/2 rounded-full bg-white/90 hover:bg-white p-2 shadow ring-1 ring-neutral-200">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5 text-neutral-700 group-hover:text-neutral-900"><path fill-rule="evenodd" d="M15.78 3.72a.75.75 0 0 1 0 1.06L9.56 11l6.22 6.22a.75.75 0 1 1-1.06 1.06l-6.75-6.75a.75.75 0 0 1 0-1.06l6.75-6.75a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd"/></svg>
          </button>
          <button id="nextBtn" class="group absolute right-3 top-1/2 -translate-y-1/2 rounded-full bg-white/90 hover:bg-white p-2 shadow ring-1 ring-neutral-200">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5 text-neutral-700 group-hover:text-neutral-900"><path fill-rule="evenodd" d="M8.22 20.28a.75.75 0 0 1 0-1.06L14.44 13 8.22 6.78a.75.75 0 0 1 1.06-1.06l6.75 6.75a.75.75 0 0 1 0 1.06l-6.75 6.75a.75.75 0 0 1-1.06 0Z" clip-rule="evenodd"/></svg>
          </button>

          <!-- Badges sobre la imagen -->
          <div class="absolute left-4 top-4 flex flex-wrap gap-2">
            <span class="rounded-full bg-white/90 px-3 py-1 text-xs font-medium shadow ring-1 ring-neutral-200">{{$propiedad->area_terreno}}m² terreno</span>
            <span class="rounded-full bg-white/90 px-3 py-1 text-xs font-medium shadow ring-1 ring-neutral-200">{{$propiedad->area_construccion}}m² construccion</span>
          </div>
        </div>

        <!-- Thumbnails -->
        <div id="thumbs" class="flex gap-2 overflow-x-auto no-scrollbar p-3 bg-white border-t border-neutral-200">
          <!-- Los thumbs se generan por JS -->
        </div>
      </section>

      <!-- Resumen rápido -->
      <section class="grid grid-cols-2 sm:grid-cols-4 gap-3">
        <div class="flex items-center gap-3 rounded-xl bg-white p-4 shadow-soft ring-1 ring-neutral-200/70">
          <div class="shrink-0 inline-flex h-10 w-10 items-center justify-center rounded-full bg-accent/10">
            <svg class="h-5 w-5 text-accent" viewBox="0 0 24 24" fill="currentColor"><path d="M3 12l9-9 9 9-1.5 1.5L12 5.25 4.5 13.5 3 12z"/><path d="M4.5 13.5L12 6l7.5 7.5V21H4.5v-7.5z"/></svg>
          </div>
          <div>
            <div class="text-xs text-neutral-500">Habitaciones</div>
            <div class="font-semibold">{{$propiedad->habitaciones}}</div>
          </div>
        </div>
        <div class="flex items-center gap-3 rounded-xl bg-white p-4 shadow-soft ring-1 ring-neutral-200/70">
          <div class="shrink-0 inline-flex h-10 w-10 items-center justify-center rounded-full bg-accent/10">
            <svg class="h-5 w-5 text-accent" viewBox="0 0 24 24" fill="currentColor"><path d="M3 7h18v10H3z"/><path d="M7 7v10M17 7v10"/></svg>
          </div>
          <div>
            <div class="text-xs text-neutral-500">Baños</div>
            <div class="font-semibold">{{$propiedad->banos}}</div>
          </div>
        </div>
        <div class="flex items-center gap-3 rounded-xl bg-white p-4 shadow-soft ring-1 ring-neutral-200/70">
          <div class="shrink-0 inline-flex h-10 w-10 items-center justify-center rounded-full bg-accent/10">
            <svg class="h-5 w-5 text-accent" viewBox="0 0 24 24" fill="currentColor"><path d="M3 18h18v2H3z"/><path d="M5 18V8h14v10M7 8V5h10v3"/></svg>
          </div>
          <div>
            <div class="text-xs text-neutral-500">Parqueos</div>
            <div class="font-semibold">{{$propiedad->parqueos}}</div>
          </div>
        </div>
        <div class="flex items-center gap-3 rounded-xl bg-white p-4 shadow-soft ring-1 ring-neutral-200/70">
          <div class="shrink-0 inline-flex h-10 w-10 items-center justify-center rounded-full bg-accent/10">
            <svg class="h-5 w-5 text-accent" viewBox="0 0 24 24" fill="currentColor"><path d="M12 7a5 5 0 100 10 5 5 0 000-10z"/></svg>
          </div>
          <div>
            <div class="text-xs text-neutral-500">Año</div>
            <div class="font-semibold">{{ $propiedad->created_at->format('d/m/Y') }} </div>
          </div>
        </div>
      </section>

      <!-- Descripción -->
      <section class="bg-white rounded-2xl shadow-soft ring-1 ring-neutral-200/70 p-6">
        <h2 class="text-lg font-semibold">Descripción</h2>
        <p class="mt-2 text-neutral-700 leading-relaxed">
         {{$propiedad->descripcion}}
        </p>
        
      </section>

     

        <section class="bg-white rounded-2xl shadow-soft ring-1 ring-neutral-200/70 p-6">
          <div class="flex items-center justify-between">
            <h2 class="text-lg font-semibold">Ubicación</h2>
            <span class="text-sm text-neutral-500">{{$propiedad->ubicacion}}</span>
          </div>

          <!-- Contenedor del mapa -->
          <div id="map" class="mt-4 aspect-[16/9] w-full overflow-hidden rounded-xl ring-1 ring-neutral-200"></div>
          
          <p class="text-xs text-neutral-500 mt-2">*Mapa referencial.</p>
        </section>
    </div>

    <!-- Columna Derecha: Agente -->
    <aside class="lg:col-span-4 space-y-6">
      <section class="bg-white rounded-2xl shadow-soft ring-1 ring-neutral-200/70 p-6">
        <div class="flex items-start gap-4">
<img
  src="{{ asset(ltrim($propiedad->user->foto_perfil, '/')) }}"
  alt="Foto de perfil de {{ $propiedad->user->name }}"
  class="h-16 w-16 rounded-full object-cover"
/>



          <div class="flex-1">
            <h3 class="text-base font-semibold">{{$propiedad->user->name}}</h3>
            <p class="text-sm text-neutral-500">Agente inmobiliario</p>
            <div class="mt-2 flex flex-wrap gap-2 text-sm text-neutral-700">
              <span class="inline-flex items-center gap-1"><svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79a15.05 15.05 0 006.59 6.59l2.2-2.2a1 1 0 011.01-.24 11.36 11.36 0 003.56.57 1 1 0 011 1v3.61a1 1 0 01-1 1A17 17 0 013 5a1 1 0 011-1h3.61a1 1 0 011 1 11.36 11.36 0 00.57 3.56 1 1 0 01-.24 1.01l-2.32 2.22z"/></svg> +503 {{$propiedad->user->phone}}</span>
              <span class="inline-flex items-center gap-1"><svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor"><path d="M2 4a2 2 0 012-2h16a2 2 0 012 2v.01L12 13 2 4.01V4zm0 3.236l10 6.25 10-6.25V20a2 2 0 01-2 2H4a2 2 0 01-2-2V7.236z"/></svg> {{$propiedad->user->email}}</span>
            </div>
          </div>
        </div>
        <div class="mt-4 grid grid-cols-3 gap-2">
          <button class="rounded-xl bg-accent text-white py-2.5 font-medium hover:opacity-95 transition" onclick="openContact()">Contactar</button>
          <a  target="_blank" href="https://wa.me/503{{ $propiedad->user->phone }}?text={{ urlencode('Hola, estoy interesado en la propiedad ' . $propiedad->titulo) }}" class="rounded-xl bg-neutral-900 text-white py-2.5 font-medium text-center hover:bg-neutral-800 transition">WhatsApp</a>
          <a href="mailto:jimmy@example.com" class="rounded-xl bg-white text-neutral-900 ring-1 ring-neutral-200 py-2.5 font-medium text-center hover:bg-neutral-50 transition">Email</a>
        </div>
        <div class="mt-4 grid grid-cols-3 gap-3 text-center">
          <div class="rounded-xl ring-1 ring-neutral-200 p-3">
            <div class="text-xl font-semibold">4.9</div>
            <div class="text-xs text-neutral-500">Rating</div>
          </div>
          <div class="rounded-xl ring-1 ring-neutral-200 p-3">
            <div class="text-xl font-semibold">120+</div>
            <div class="text-xs text-neutral-500">Ventas</div>
          </div>
          <div class="rounded-xl ring-1 ring-neutral-200 p-3">
            <div class="text-xl font-semibold">{{ $propiedad->user->agente->experiencia }} años</div>
            <div class="text-xs text-neutral-500">Experiencia</div>
          </div>
        </div>
      </section>

      <!-- CTA Sticky en Desktop -->
      <section class="hidden lg:block bg-white rounded-2xl shadow-soft ring-1 ring-neutral-200/70 p-6">
        <div class="flex items-start justify-between gap-4">
          <div>
            <div class="text-sm text-neutral-500">Precio</div>
            <div class="text-2xl font-bold">$245,000</div>
          </div>
          <button class="rounded-xl bg-accent text-white px-5 py-3 font-medium hover:opacity-95 transition" onclick="openContact()">Agendar visita</button>
        </div>
      </section>
    </aside>
  </main>

  <!-- Barra fija móvil -->
  <div class="lg:hidden fixed bottom-0 inset-x-0 z-40 bg-white/90 backdrop-blur border-t border-neutral-200 p-3">
    <div class="mx-auto max-w-7xl flex items-center gap-3">
      <div class="flex-1">
        <div class="text-xs text-neutral-500">Precio</div>
        <div class="text-lg font-semibold">$245,000</div>
      </div>
      <button class="rounded-xl bg-accent text-white px-4 py-3 font-medium" onclick="openContact()">Contactar</button>
    </div>
  </div>

  <!-- Modal Contactar -->
  <div id="contactModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black/40" onclick="closeContact()"></div>
    <div class="relative mx-auto mt-[10vh] w-[92%] max-w-xl rounded-2xl bg-white p-6 shadow-2xl">
      <div class="flex items-start justify-between">
        <div>
          <h3 class="text-lg font-semibold">Contactar al agente</h3>
          <p class="text-sm text-neutral-500">Déjanos tus datos y nos comunicamos contigo.</p>
        </div>
        <button class="p-2 rounded-lg hover:bg-neutral-100" onclick="closeContact()" aria-label="Cerrar">
          <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z" clip-rule="evenodd"/></svg>
        </button>
      </div>

      <form class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-3">
        <div class="sm:col-span-2">
          <label class="text-sm text-neutral-600">Nombre completo</label>
          <input type="text" class="mt-1 w-full rounded-xl border-neutral-200 focus:border-accent focus:ring-accent" placeholder="Tu nombre" />
        </div>
        <div>
          <label class="text-sm text-neutral-600">Teléfono</label>
          <input type="tel" class="mt-1 w-full rounded-xl border-neutral-200 focus:border-accent focus:ring-accent" placeholder="+503 ..." />
        </div>
        <div>
          <label class="text-sm text-neutral-600">Email</label>
          <input type="email" class="mt-1 w-full rounded-xl border-neutral-200 focus:border-accent focus:ring-accent" placeholder="tucorreo@email.com" />
        </div>
        <div class="sm:col-span-2">
          <label class="text-sm text-neutral-600">Mensaje</label>
          <textarea rows="4" class="mt-1 w-full rounded-xl border-neutral-200 focus:border-accent focus:ring-accent" placeholder="Estoy interesado/a en la propiedad #SS-2048..."></textarea>
        </div>
        <div class="sm:col-span-2 flex items-center justify-between">
          <label class="inline-flex items-center gap-2 text-sm text-neutral-600">
            <input type="checkbox" class="rounded border-neutral-300 text-accent focus:ring-accent" />
            Acepto ser contactado por teléfono o email
          </label>
          <button type="button" class="rounded-xl bg-neutral-900 text-white px-5 py-3 font-medium hover:bg-neutral-800">Enviar</button>
        </div>
      </form>
    </div>
  </div>

   


  <!-- Scripts mínimos del Slider y Modal -->
  <script>

      function initMap() {
    const propiedad = { lat: {{ $propiedad->lat }}, lng: {{ $propiedad->lng }} };

    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 15,
      center: propiedad,
    });

    new google.maps.Marker({
      position: propiedad,
      map: map,
      title: "Ubicación de la propiedad",
    });
  }

  // Ejecutar cuando la página carga
  window.initMap = initMap;

    const slides = Array.from(document.querySelectorAll('#slider .slide'));
    const thumbsContainer = document.getElementById('thumbs');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    let index = 0;

    function renderThumbs(){
      thumbsContainer.innerHTML = '';
      slides.forEach((img, i) => {
        const t = document.createElement('button');
        t.className = 'relative h-16 w-24 overflow-hidden rounded-lg ring-1 ring-neutral-200';
        t.innerHTML = `<img src="${img.src}" alt="thumb ${i+1}" class="h-full w-full object-cover">`;
        t.addEventListener('click', () => goTo(i));
        thumbsContainer.appendChild(t);
      });
      updateActiveThumb();
    }

    function show(i){
      slides.forEach((s, idx)=>{
        s.style.opacity = idx === i ? '1' : '0';
      });
    }

    function goTo(i){
      index = (i + slides.length) % slides.length;
      show(index);
      updateActiveThumb();
    }

    function updateActiveThumb(){
      [...thumbsContainer.children].forEach((btn, i)=>{
        btn.classList.toggle('ring-2', i===index);
        btn.classList.toggle('ring-accent', i===index);
      });
    }

    prevBtn.addEventListener('click', ()=> goTo(index-1));
    nextBtn.addEventListener('click', ()=> goTo(index+1));

    // Navegación por teclado
    document.addEventListener('keydown', (e)=>{
      if(e.key === 'ArrowLeft') goTo(index-1);
      if(e.key === 'ArrowRight') goTo(index+1);
    });

    // Auto-init
    renderThumbs();
    show(0);

    // Modal
    const modal = document.getElementById('contactModal');
    function openContact(){ modal.classList.remove('hidden'); document.body.classList.add('overflow-hidden'); }
    function closeContact(){ modal.classList.add('hidden'); document.body.classList.remove('overflow-hidden'); }
    window.openContact = openContact; window.closeContact = closeContact;
  </script>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6rLn1Fnx9hlBPRk7zVQUssjIvJGqQuYE&callback=initMap" async defer></script>
@endsection