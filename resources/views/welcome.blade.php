
    @extends('layout.app')
    @vite(['resources/css/app.css', 'resources/js/page/index.js'])

    @section('content')

    <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: {
            gold: '#BA9D79',
            dark: '#09121b',
            light: '#F5F5F5',
          },
          fontFamily: {
            sans: ['Montserrat','sans-serif']
          }
        }
      }
    }
  </script>

  <!-- AOS CSS -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

  <style>
   
    :root{
      --color-gold:#BA9D79;--color-dark:#121212;--color-light:#F5F5F5;
    }
    .hero-clip{clip-path:polygon(0 0,100% 0,100% 85%,0 100%)}
    .card-hover:hover{transform:translateY(-10px);box-shadow:0 20px 25px -5px rgba(0,0,0,.1),0 10px 10px -5px rgba(0,0,0,.04)}
    .carousel-slide{transition:opacity 1.5s ease-in-out}
    .carousel-control{opacity:.7;transform:scale(.9);transition:all .3s ease}
    .carousel-control:hover{opacity:1;transform:scale(1)}
    .carousel-indicator.active{background-color:var(--color-gold);transform:scale(1.2)}
    .carousel-indicators{transition:all .3s ease;opacity:.7}
    .carousel-container:hover .carousel-indicators{opacity:1}
    .agent-status{position:absolute;top:10px;left:10px;background:var(--color-gold);color:#fff;padding:.25rem .75rem;border-radius:20px;font-size:.75rem;font-weight:600;z-index:10;transform:translateY(-10px);opacity:0;transition:all .3s ease}
    .agent-card{position:relative;overflow:hidden;transition:all .5s ease}
    .agent-card:hover{transform:translateY(-10px);box-shadow:0 20px 25px -5px rgba(0,0,0,.1),0 10px 10px -5px rgba(0,0,0,.04)}
    .agent-card .agent-image{transition:transform .8s ease}
    .agent-card:hover .agent-image{transform:scale(1.1)}
    .agent-card .agent-overlay{background:linear-gradient(to top,rgba(0,0,0,.8) 0%,rgba(0,0,0,.4) 50%,rgba(0,0,0,0) 100%);opacity:0;transition:all .4s ease}
    .agent-card:hover .agent-overlay{opacity:1}
    .agent-card .agent-content{transform:translateY(20px);opacity:0;transition:all .4s ease}
    .agent-card:hover .agent-content{transform:translateY(0);opacity:1}
    .agent-card:hover .agent-status{transform:translateY(0);opacity:1}
    .agent-card::before{content:"";position:absolute;inset:-5px;border:2px solid var(--color-gold);border-radius:1.1rem;opacity:0;transition:opacity .3s ease;z-index:0}
    .agent-card:hover::before{opacity:1}

    @keyframes fadeInUp{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}
    .animate-fadeInUp{animation:fadeInUp .5s ease forwards}

    /* Renombrada para no pisar la de Tailwind */
    @keyframes pulseSoft{0%{transform:scale(1);opacity:.6}50%{transform:scale(1.05);opacity:.9}100%{transform:scale(1);opacity:.6}}
    .animate-pulse-soft{animation:pulseSoft 3s infinite ease-in-out}

    @keyframes shimmer{0%{background-position:-200% 0}100%{background-position:200% 0}}
    .shimmer{background:linear-gradient(90deg,transparent,rgba(255,255,255,.2),transparent);background-size:200% 100%;animation:shimmer 2s infinite}

    @keyframes float{0%{transform:translateY(0) translateX(0);opacity:.6}50%{transform:translateY(-10px) translateX(5px);opacity:.9}100%{transform:translateY(0) translateX(0);opacity:.6}}
    .animate-float{animation:float 6s infinite ease-in-out}

    .particle{position:absolute;width:6px;height:6px;background:var(--color-gold);border-radius:50%;opacity:.4;pointer-events:none;z-index:1}
  </style>

     
  <section class="hero-clip relative h-screen bg-dark overflow-hidden">
    <div class="absolute inset-0 bg-black/50 z-10"></div>

    <div class="carousel-container absolute inset-0 w-full h-full">
      <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=2070&q=80"
           alt="Luxury Home" class="carousel-slide absolute inset-0 w-full h-full object-cover opacity-100">
      <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=2070&q=80"
           alt="Modern House" class="carousel-slide absolute inset-0 w-full h-full object-cover opacity-0">
      <img src="https://images.unsplash.com/photo-1613977257363-707ba9348227?auto=format&fit=crop&w=2070&q=80"
           alt="Luxury Apartment" class="carousel-slide absolute inset-0 w-full h-full object-cover opacity-0">

      <button class="carousel-control prev absolute left-4 top-1/2 -translate-y-1/2 bg-black/30 hover:bg-gold text-white w-10 h-10 rounded-full flex items-center justify-center z-20">
        <i class="fas fa-chevron-left"></i>
      </button>
      <button class="carousel-control next absolute right-4 top-1/2 -translate-y-1/2 bg-black/30 hover:bg-gold text-white w-10 h-10 rounded-full flex items-center justify-center z-20">
        <i class="fas fa-chevron-right"></i>
      </button>

      <div class="carousel-indicators absolute bottom-8 left-1/2 -translate-x-1/2 flex space-x-2 z-20">
        <button class="w-3 h-3 rounded-full bg-white/50 hover:bg-gold transition carousel-indicator active"></button>
        <button class="w-3 h-3 rounded-full bg-white/50 hover:bg-gold transition carousel-indicator"></button>
        <button class="w-3 h-3 rounded-full bg-white/50 hover:bg-gold transition carousel-indicator"></button>
      </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 h-full flex items-center relative z-20">
      <div class="w-full md:w-2/3 lg:w-1/2">
        
        <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-6 text-white leading-tight">
          Encuentra Tu <br><span class="text-gold">Hogar Ideal</span>
        </h1>
        <div class="flex flex-col sm:flex-row gap-4">
          <a href="#properties" class="bg-gold text-white font-medium px-8 py-4 rounded-full hover:bg-white hover:text-gold transition">Ver Propiedades</a>
          <a href="{{route('contacto')}}" class="bg-transparent text-white font-medium px-8 py-4 rounded-full hover:bg-white/10 transition border border-white">Contactar</a>
        </div>

        <div class="mt-16 grid grid-cols-3 gap-4">
          
        </div>
      </div>
    </div>

    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 z-20 animate-bounce">
      <a href="#properties" class="text-white/80 hover:text-gold transition">
        <i class="fas fa-chevron-down text-2xl"></i>
      </a>
    </div>
  </section>

  <!-- PROPERTIES -->
  <section id="properties" class="py-20 bg-light">
    <div class="max-w-7xl mx-auto px-4">
      <div class="text-center mb-16" data-aos="fade-up">
        <span class="inline-block px-4 py-1 bg-gold/10 text-gold text-sm font-medium mb-4 rounded-full">ULTIMAS PROPIEDADES</span>
        <a href="{{route('page.propiedades')}}" class="text-4xl font-bold mb-4">Descubre Nuestras <span class="text-gold">propiedades</span></a>
        <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">Selección de ultimas propiedades </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
       <!-- Cards -->

       @foreach ($propiedades as $propiedad )
         <div class="bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow-lg transition-all duration-500 card-hover" data-aos="fade-up" data-aos-delay="50">
  <div class="relative">
    <img src="{{asset($propiedad->imagenes()->first()->ruta)}}" class="w-full h-64 object-cover" alt="">
    <div class="absolute top-4 right-4 bg-gold text-white px-3 py-1 rounded-full text-sm font-medium">Destacado</div>
    <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-[#09121b]/70 to-transparent p-4">
      <div class="text-white font-bold text-xl">${{$propiedad->precio}}</div>
    </div>
  </div>
  <div class="p-6">
    <h3 class="text-xl font-bold mb-2 text-white">{{$propiedad->titulo}}</h3>
    <div class="flex items-center text-gray-600 dark:text-gray-300 mb-4">
      <i class="fas fa-map-marker-alt text-gold mr-2"></i><span>{{$propiedad->ubicacion}}</span>
    </div>
    <div class="flex justify-between mb-6 text-sm">
      <div class="flex items-center">
        <i class="fas fa-bed text-gold mr-1"></i><span class="mr-3 text-white">{{$propiedad->habitaciones}}</span>
        <i class="fas fa-bath text-gold mr-1"></i><span class="mr-3 text-white">{{$propiedad->banos}}</span>
        <i class="fas fa-ruler-combined text-gold mr-1"></i><span class="text-white">{{$propiedad->area_terreno}} m²</span>
      </div>
    </div>
    <a href="{{route('page.mas',$propiedad->id)}}" class="block text-center bg-gold/10 text-gold font-medium py-3 rounded-lg hover:bg-gold hover:text-white transition">Ver Detalles</a>
  </div>
</div>
       @endforeach

      <div class="text-center mt-12">
        <a href="{{route('page.propiedades')}}" class="inline-block bg-dark text-white font-medium px-8 py-4 rounded-full hover:bg-gold transition">Ver Todas las Propiedades</a>
      </div>
    </div>
  </section>

  <!-- ABOUT con AOS y adornos animados -->
  <section id="about" class="py-20 bg-white dark:bg-gray-900 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4">
      <div class="flex flex-col lg:flex-row items-center gap-12">
        <div class="lg:w-1/2 relative" data-aos="fade-right">
          <div class="relative z-10 rounded-xl overflow-hidden shadow-2xl transition duration-700 hover:scale-105 hover:rotate-1 max-w-md mx-auto">
            <img src="https://images.unsplash.com/photo-1577415124269-fc1140a69e91?auto=format&fit=crop&w=1974&q=80" alt="" class="w-full h-auto">
            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 hover:opacity-100 transition"></div>
          </div>
          <div class="absolute -bottom-6 -right-6 w-48 h-48 bg-gold/10 rounded-full z-0 animate-pulse-soft"></div>
          <div class="absolute -top-6 -left-6 w-24 h-24 bg-gold/10 rounded-full z-0 animate-pulse-soft" style="animation-delay:1s"></div>
          <div class="absolute top-1/4 right-1/4 w-3 h-3 bg-gold/40 rounded-full z-0 animate-float"></div>
          <div class="absolute bottom-1/3 left-1/3 w-2 h-2 bg-gold/30 rounded-full z-0 animate-float" style="animation-delay:1.5s"></div>
        </div>

        <div class="lg:w-1/2" data-aos="fade-left" data-aos-delay="200">
          <span class="inline-block px-4 py-1 bg-gold/10 text-gold text-sm font-medium mb-4 rounded-full">SOBRE NOSOTROS</span>
          <h2 class="text-4xl font-bold mb-6 relative">
            <span class="relative z-10 text-white">Expertos en </span><span class="text-gold relative z-10">Inmobiliaria</span>
            <span class="absolute -bottom-2 left-0 h-1 w-24 bg-gold rounded-full"></span>
          </h2>
          <p class="text-gray-600 dark:text-gray-300 mb-6 leading-relaxed">En ENCASA, redefinimos la experiencia inmobiliaria con un enfoque innovador.</p>
          <p class="text-gray-600 dark:text-gray-300 mb-8 leading-relaxed">Innovación, sostenibilidad y experiencias memorables.</p>

          <div class="grid grid-cols-2 gap-6 mb-8">
            <div class="feature-card flex items-center p-3 rounded-lg hover:bg-gold/5 hover:shadow-md transform hover:-translate-y-1 transition">
              <div class="bg-gold rounded-full p-2 mr-4 shadow-lg"><i class="fas fa-rocket text-white"></i></div>
              <div><h3 class="font-bold">Innovación</h3><p class="text-gray-600 dark:text-gray-300 text-sm">Tecnología inmobiliaria</p></div>
            </div>
            <div class="feature-card flex items-center p-3 rounded-lg hover:bg-gold/5 hover:shadow-md transform hover:-translate-y-1 transition">
              <div class="bg-gold rounded-full p-2 mr-4 shadow-lg"><i class="fas fa-handshake text-white"></i></div>
              <div><h3 class="font-bold">Confianza</h3><p class="text-gray-600 dark:text-gray-300 text-sm">Transparencia total</p></div>
            </div>
            <div class="feature-card flex items-center p-3 rounded-lg hover:bg-gold/5 hover:shadow-md transform hover:-translate-y-1 transition">
              <div class="bg-gold rounded-full p-2 mr-4 shadow-lg"><i class="fas fa-leaf text-white"></i></div>
              <div><h3 class="font-bold">Sostenibilidad</h3><p class="text-gray-600 dark:text-gray-300 text-sm">Hogares eco-friendly</p></div>
            </div>
            <div class="feature-card flex items-center p-3 rounded-lg hover:bg-gold/5 hover:shadow-md transform hover:-translate-y-1 transition">
              <div class="bg-gold rounded-full p-2 mr-4 shadow-lg"><i class="fas fa-vr-cardboard text-white"></i></div>
              <div><h3 class="font-bold">Experiencia</h3><p class="text-gray-600 dark:text-gray-300 text-sm">Tours 3D</p></div>
            </div>
          </div>

          <a href="{{route('about')}}" class="inline-block bg-transparent text-gold font-medium px-8 py-3 rounded-full hover:bg-gold hover:text-white transition border border-gold relative overflow-hidden group">
            <span class="relative z-10">Conoce al Equipo</span>
            <span class="absolute inset-0 bg-gold scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- AGENTS con partículas -->
  <section id="agents" class="py-20 bg-light relative overflow-hidden">
    <div class="absolute top-0 right-0 w-64 h-64 bg-gold/5 rounded-full animate-pulse-soft"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-gold/5 rounded-full animate-pulse-soft" style="animation-delay:1.5s"></div>
    <div class="absolute top-1/2 left-1/4 w-6 h-6 bg-gold/20 rounded-full animate-float"></div>
    <div class="absolute bottom-1/3 right-1/4 w-4 h-4 bg-gold/30 rounded-full animate-float" style="animation-delay:1s"></div>

    <div class="max-w-7xl mx-auto px-4 relative z-10">
      <div class="text-center mb-16" data-aos="fade-up">
        <span class="inline-block px-4 py-1 bg-gold/10 text-gold text-sm font-medium mb-4 rounded-full">NUESTRO EQUIPO DESTACADO</span>
        <h2 class="text-4xl font-bold mb-4">Conoce a Nuestros <span class="text-gold">Mejores Agentes</span></h2>
        <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">Profesionales con amplia experiencia.</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 ">
        @foreach ($agentes as $agente)
           <div class="bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow-lg transition hover:-translate-y-2 hover:shadow-xl group agent-card" data-aos="fade-up" data-aos-delay="100">
          <div class="relative overflow-hidden">
            <div class="agent-status"><p>Ranking: {{ number_format($agente->ratings_avg_rating, 1) }} ⭐</p></div>
            <img src="{{$agente->user->foto_perfil}}" class="w-full h-64 object-cover agent-image" alt="">
            <div class="absolute inset-0 agent-overlay"></div>
            <div class="absolute bottom-0 left-0 right-0 p-6 agent-content">
              <h3 class="text-white text-xl font-bold">{{$agente->user->name}}</h3>
              <p class="text-gold">{{$agente->especialidad}}</p>
              <p class="text-white/80 text-sm mt-2">Especialista en propiedades.</p>
              <div class="flex justify-between mt-4">
              </div>
              <div class="flex space-x-3 mt-4">
                <a href="#" class="text-white hover:text-gold"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" class="text-white hover:text-gold"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white hover:text-gold"><i class="fas fa-envelope"></i></a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
       
       

     

      </div>

      <div class="text-center mt-12">
        <a href="#" class="inline-block bg-gold text-white font-medium px-8 py-4 rounded-full hover:bg-dark transition transform hover:scale-105">Ver Todos los Agentes</a>
      </div>
    </div>
  </section>

  <!-- Convertirse en Agente Section -->
<section id="become-agent" class="py-24 bg-white relative overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 grid lg:grid-cols-2 gap-12 items-center">
    
    <!-- Texto -->
    <div data-aos="fade-right" class="space-y-6">
      <h2 class="text-4xl md:text-5xl font-bold">
        <span class="text-gold">Impulsa tu Carrera</span><br>
        con Nosotros
      </h2>
      <p class="text-lg text-gray-600">
        Únete al equipo de agentes inmobiliarios más exitoso y transforma tu futuro profesional. 
        Disfruta de formación continua, excelentes comisiones y un entorno que impulsa tu crecimiento.
      </p>
      <a href="{{route('page.solicitud')}}" class="inline-block bg-gold text-white px-8 py-4 rounded-full font-medium hover:bg-dark transition transform hover:scale-105">
        Convertirme en Agente
      </a>
    </div>

    <!-- Imagen -->
    <div data-aos="fade-left" class="relative">
      <div class="rounded-2xl overflow-hidden shadow-2xl">
        <img 
          src="https://img.freepik.com/foto-gratis/retrato-macho-agente-inmobiliario_23-2150164690.jpg?semt=ais_hybrid&w=740&q=80" 
          alt="Agente inmobiliario mostrando una propiedad" 
          class="w-full h-full object-cover"
        >
      </div>
      <!-- Elementos decorativos -->
      <div class="absolute -top-6 -left-6 w-24 h-24 bg-gold/20 rounded-full blur-xl animate-pulse-soft"></div>
      <div class="absolute -bottom-8 -right-8 w-32 h-32 bg-gold/10 rounded-full blur-2xl animate-float"></div>
    </div>

  </div>
</section>




  <!-- CTA oscuro -->
  <section class="py-16 bg-dark relative overflow-hidden">
    <div class="absolute top-0 left-0 w-full h-1 bg-gold"></div>
    <div class="max-w-7xl mx-auto px-4 text-center relative z-10">
      <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">¿Buscando la <span class="text-gold">propiedad perfecta</span>?</h2>
      <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">Permítanos ayudarle a encontrarla.</p>
      <div class="flex flex-col sm:flex-row justify-center gap-4">
        
        <a href="{{route('page.propiedades')}}" class="bg-transparent text-white font-medium px-8 py-4 rounded-full hover:bg-white/10 transition border border-white">Ver Catálogo</a>
      </div>
    </div>
  </section>



  <!-- AOS JS -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

  <!-- JS: interacciones, carrusel, partículas, contadores y dark mode -->
  <script>
    // Menú móvil (evita error si no existe)
    document.getElementById('mobile-menu-button')?.addEventListener('click', () => {
      document.getElementById('mobile-menu')?.classList.toggle('hidden');
    });

    // Smooth scroll
    document.querySelectorAll('a[href^="#"]').forEach(a=>{
      a.addEventListener('click',e=>{
        const href = a.getAttribute('href');
        if(href && href.length>1){
          e.preventDefault();
          document.querySelector(href)?.scrollIntoView({behavior:'smooth'});
        }
      });
    });

    // Partículas en #agents
    const agentsSection = document.getElementById('agents');
    function createParticle(){
      if(!agentsSection) return;
      const particle=document.createElement('div');
      particle.className='particle';
      const rect=agentsSection.getBoundingClientRect();
      const x=Math.random()*rect.width;
      const y=Math.random()*rect.height;
      particle.style.left=`${x}px`;particle.style.top=`${y}px`;
      const size=Math.random()*6+2;
      particle.style.width=`${size}px`;particle.style.height=`${size}px`;
      particle.style.animation=`float ${Math.random()*5+3}s linear forwards`;
      agentsSection.appendChild(particle);
      setTimeout(()=>particle.remove(),8000);
    }
    function checkVisibility(){
      if(!agentsSection) return;
      const r=agentsSection.getBoundingClientRect();
      const visible=r.top<window.innerHeight && r.bottom>=0;
      if(visible){ createParticle(); setTimeout(createParticle,300); setTimeout(createParticle,600); }
    }
    setInterval(checkVisibility,1000);

    // Carrusel
    function initCarousel(){
      const slides=[...document.querySelectorAll('.carousel-slide')];
      const indicators=[...document.querySelectorAll('.carousel-indicator')];
      const prev=document.querySelector('.carousel-control.prev');
      const next=document.querySelector('.carousel-control.next');
      let current=0, n=slides.length, timer;

      function show(i){
        slides.forEach(s=>s.style.opacity='0');
        indicators.forEach((dot,idx)=>{
          dot.classList.toggle('active', idx===i);
          dot.style.backgroundColor = idx===i ? '#BA9D79' : 'rgba(255,255,255,0.5)';
        });
        slides[i].style.opacity='1';
        current=i;
      }
      function nextSlide(){ show((current+1)%n); }
      function prevSlide(){ show((current-1+n)%n); }
      function reset(){ clearInterval(timer); timer=setInterval(nextSlide,5000); }

      prev?.addEventListener('click',()=>{prevSlide();reset();});
      next?.addEventListener('click',()=>{nextSlide();reset();});
      indicators.forEach((dot,idx)=>dot.addEventListener('click',()=>{show(idx);reset();}));

      show(0);
      timer=setInterval(nextSlide,5000);
    }

    // Contadores (primer span numérico dentro de .agent-card .flex.justify-between)
    function animateCounters(){
      document.querySelectorAll('.agent-card .flex.justify-between span:first-child').forEach(span=>{
        const text=span.innerText.trim();
        const target=parseInt(text);
        const suffix=text.replace(/[0-9]/g,'');
        if(!Number.isFinite(target)) return;
        span.innerText='0'+suffix;
        const step=Math.ceil(target/20);
        function tick(){
          const current=parseInt(span.innerText);
          if(current<target){ span.innerText=(current+step)+suffix; setTimeout(tick,50); }
          else{ span.innerText=text; }
        }
        const io=new IntersectionObserver(es=>{
          es.forEach(e=>{
            if(e.isIntersecting){ tick(); io.unobserve(e.target); }
          });
        },{threshold:.5});
        io.observe(span);
      });
    }

    // AOS + Inits
    document.addEventListener('DOMContentLoaded', ()=>{
      AOS.init({ duration:800, easing:'ease-in-out', once:false, mirror:false });
      initCarousel();
      animateCounters();
    });

    // Dark mode
    const darkBtn=document.getElementById('darkModeToggle');
    const darkIcon=document.getElementById('darkModeIcon');
    const html=document.documentElement;
    const saved=localStorage.getItem('theme');
    const prefers=window.matchMedia('(prefers-color-scheme: dark)').matches;
    if(saved==='dark' || (!saved && prefers)){
      html.classList.add('dark');
      darkIcon?.classList.replace('fa-moon','fa-sun');
    }
    darkBtn?.addEventListener('click',()=>{
      html.classList.toggle('dark');
      if(html.classList.contains('dark')){
        darkIcon?.classList.replace('fa-moon','fa-sun');
        localStorage.setItem('theme','dark');
      }else{
        darkIcon?.classList.replace('fa-sun','fa-moon');
        localStorage.setItem('theme','light');
      }
    });
  </script>

    @endsection
    