
    @extends('layout.app')
    @vite(['resources/css/app.css', 'resources/js/page/index.js'])

    @section('content')

<style>
  #map { height: 100%; }
</style>

<!-- Hero Section con Slider Mejorado -->
<!-- Hero Section con Slider Mejorado -->
<section class="relative h-screen overflow-hidden">
  <div class="relative h-full bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80')">
    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
    <div class="absolute inset-0 flex flex-col justify-center items-start px-6 md:px-16">
      <div class="text-white text-5xl md:text-6xl font-bold leading-tight mb-4 animate-fade-in opacity-0 transform translate-y-8 transition duration-500">
        Encuentra tu hogar ideal
      </div>
      <p class="text-white text-lg md:text-xl mb-6 animate-fade-in delay-100 opacity-0 transform translate-y-8 transition duration-500">
        Explora las mejores propiedades en todo El Salvador
      </p>
      <a href="#buscar" class="bg-[#BA9D79] hover:bg-[#a38564] text-white font-semibold py-3 px-6 rounded-full shadow-lg transition duration-300 transform hover:scale-105">
        Buscar ahora
      </a>
    </div>
  </div>
</section>

<!-- Sección de Búsqueda -->
<section id="buscar" class="bg-gray-100 py-16">
  <div class="max-w-7xl mx-auto px-6">
    <div class="bg-white p-6 rounded-xl shadow-md">
      <h2 class="text-2xl font-bold text-gray-800 mb-6">Filtrar Propiedades</h2>
      <div class="grid md:grid-cols-4 gap-6">
        <input type="text" placeholder="Ciudad o zona..." class="w-full py-3 px-4 rounded-full border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#BA9D79] transition duration-300 ease-in-out">
        <select class="w-full py-3 px-4 rounded-full border border-gray-300 shadow-sm focus:outline-none transition duration-300">
          <option>Tipo</option>
          <option>Casa</option>
          <option>Apartamento</option>
        </select>
        <select class="w-full py-3 px-4 rounded-full border border-gray-300 shadow-sm focus:outline-none transition duration-300">
          <option>Precio</option>
          <option>$0 - $100k</option>
          <option>$100k - $200k</option>
        </select>
        <button class="bg-[#BA9D79] hover:bg-[#a38564] text-white font-semibold py-3 px-6 rounded-full transition duration-300 transform hover:scale-105">
          Buscar
        </button>
      </div>
    </div>
  </div>
</section>

<!-- Sección de Propiedades Destacadas -->
<section class="py-16 bg-white">
  <div class="max-w-7xl mx-auto px-6">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Propiedades Destacadas</h2>
    <div class="grid md:grid-cols-3 gap-8">
      <!-- Card ejemplo -->
      <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transform hover:scale-[1.05] transition duration-300">
        <img src="https://images.unsplash.com/photo-1570129477492-45c003edd2be?auto=format&fit=crop&w=800&q=80" class="w-full h-56 object-cover">
        <div class="p-5">
          <h3 class="text-xl font-semibold text-gray-800 mb-2">Casa Moderna en San Salvador</h3>
          <p class="text-gray-500 text-sm mb-4">3 habitaciones • 2 baños • 1 parqueo • 180m²</p>
          <div class="flex justify-between items-center">
            <span class="text-[#BA9D79] font-bold text-lg">$120,000</span>
            <a href="#" class="text-[#BA9D79] hover:underline font-medium">Ver más</a>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transform hover:scale-[1.05] transition duration-300">
        <img src="https://images.unsplash.com/photo-1570129477492-45c003edd2be?auto=format&fit=crop&w=800&q=80" class="w-full h-56 object-cover">
        <div class="p-5">
          <h3 class="text-xl font-semibold text-gray-800 mb-2">Casa Moderna en San Salvador</h3>
          <p class="text-gray-500 text-sm mb-4">3 habitaciones • 2 baños • 1 parqueo • 180m²</p>
          <div class="flex justify-between items-center">
            <span class="text-[#BA9D79] font-bold text-lg">$120,000</span>
            <a href="#" class="text-[#BA9D79] hover:underline font-medium">Ver más</a>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transform hover:scale-[1.05] transition duration-300">
        <img src="https://images.unsplash.com/photo-1570129477492-45c003edd2be?auto=format&fit=crop&w=800&q=80" class="w-full h-56 object-cover">
        <div class="p-5">
          <h3 class="text-xl font-semibold text-gray-800 mb-2">Casa Moderna en San Salvador</h3>
          <p class="text-gray-500 text-sm mb-4">3 habitaciones • 2 baños • 1 parqueo • 180m²</p>
          <div class="flex justify-between items-center">
            <span class="text-[#BA9D79] font-bold text-lg">$120,000</span>
            <a href="#" class="text-[#BA9D79] hover:underline font-medium">Ver más</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Sección de Agentes -->
<section class="bg-gray-100 py-16">
  <div class="max-w-7xl mx-auto px-6">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">Nuestros Agentes</h2>
    <div class="grid md:grid-cols-3 gap-8">
      <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-xl transition-all">
        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Agente" class="w-24 h-24 mx-auto rounded-full mb-4">
        <h3 class="text-xl font-semibold text-gray-800">Carlos Pérez</h3>
        <p class="text-gray-500">Especialista en Bienes Raíces</p>
        <a href="#" class="inline-block mt-4 bg-[#BA9D79] text-white py-2 px-4 rounded-full hover:bg-[#a38564] transition">Contactar</a>
      </div>
      <!-- Repite para más agentes -->
    </div>
  </div>
</section>

<!-- Sección de Servicios -->
<section class="py-16 bg-white">
  <div class="max-w-7xl mx-auto px-6">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Servicios</h2>
    <div class="grid md:grid-cols-3 gap-8">
      <div class="text-center p-6 bg-gray-50 rounded-xl shadow-sm hover:shadow-md transition">
        <div class="text-[#BA9D79] text-5xl mb-4">
          <i class="fas fa-home"></i>
        </div>
        <h3 class="text-xl font-semibold text-gray-800 mb-2">Venta de Propiedades</h3>
        <p class="text-gray-500">Asistencia profesional para vender tu propiedad al mejor precio.</p>
      </div>
      <!-- Repite para más servicios -->
    </div>
  </div>
</section>

<!-- Sección de Testimonios -->
<section class="bg-gray-100 py-16">
  <div class="max-w-7xl mx-auto px-6">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Testimonios</h2>
    <div class="grid md:grid-cols-2 gap-8">
      <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition">
        <p class="text-gray-600 italic mb-4">"Encontré la casa perfecta gracias a EnCasa. Muy profesionales y amables."</p>
        <div class="flex items-center gap-4">
          <img src="https://randomuser.me/api/portraits/women/44.jpg" class="w-12 h-12 rounded-full">
          <div>
            <p class="font-semibold text-gray-800">Ana Gómez</p>
            <p class="text-sm text-gray-500">San Miguel</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Sección Convertirse en Agente -->
<section class="py-16 bg-[#f9f9f9]">
  <div class="max-w-4xl mx-auto px-6 text-center">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">¿Quieres ser parte del equipo EnCasa?</h2>
    <p class="text-gray-600 mb-8">Únete como agente y accede a oportunidades exclusivas, herramientas profesionales y una comunidad de expertos en bienes raíces.</p>
    <a href="#" class="bg-[#BA9D79] hover:bg-[#a38564] text-white font-semibold py-3 px-8 rounded-full shadow-lg transition duration-300">
      Convertirse en Agente
    </a>
  </div>
</section>


    @endsection
    