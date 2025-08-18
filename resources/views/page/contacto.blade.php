@extends('layout.app')

@section('content')
<!-- Sección de Contacto Mejorada con Estilo Impactante y Fondo Blanco -->
<section class="py-16 bg-white text-gray-900" id="contacto">
  <div class="max-w-7xl mx-auto px-6">
    <!-- Título -->
    <h2 class="text-5xl font-extrabold text-center text-[#BA9D79] mb-12 animate-fade-in">Contáctanos</h2>

    <div class="grid md:grid-cols-2 gap-16">
      <!-- Formulario de Contacto -->
      <div>
        <h3 class="text-3xl font-semibold text-[#BA9D79] mb-6">¡Estamos para ayudarte!</h3>
        <p class="text-lg mb-6">¿Tienes alguna duda? ¿Estás listo para encontrar tu propiedad ideal? Completa el formulario y nos pondremos en contacto contigo en la brevedad.</p>
        <form action="#" method="POST" class="space-y-6">
          <div>
            <label for="name" class="block text-lg font-medium">Nombre</label>
            <input type="text" id="name" name="name" required class="w-full py-4 px-6 rounded-lg border border-[#BA9D79] shadow-sm focus:outline-none focus:ring-2 focus:ring-[#BA9D79] bg-gray-100 text-gray-900 placeholder-gray-400" placeholder="Tu nombre">
          </div>
          <div>
            <label for="email" class="block text-lg font-medium">Correo electrónico</label>
            <input type="email" id="email" name="email" required class="w-full py-4 px-6 rounded-lg border border-[#BA9D79] shadow-sm focus:outline-none focus:ring-2 focus:ring-[#BA9D79] bg-gray-100 text-gray-900 placeholder-gray-400" placeholder="Tu correo electrónico">
          </div>
          <div>
            <label for="message" class="block text-lg font-medium">Mensaje</label>
            <textarea id="message" name="message" rows="5" required class="w-full py-4 px-6 rounded-lg border border-[#BA9D79] shadow-sm focus:outline-none focus:ring-2 focus:ring-[#BA9D79] bg-gray-100 text-gray-900 placeholder-gray-400" placeholder="Escribe tu mensaje..."></textarea>
          </div>
          <button type="submit" class="w-full bg-[#BA9D79] hover:bg-[#a38564] text-white font-bold py-4 px-6 rounded-full transition duration-300 transform hover:scale-105 shadow-lg">Enviar mensaje</button>
        </form>
      </div>

      <!-- Información de Contacto -->
      <div>
        <h3 class="text-3xl font-semibold text-[#BA9D79] mb-6">Conoce a Nuestros Agentes</h3>
        <p class="text-lg mb-6">Nuestros expertos en bienes raíces están listos para ofrecerte la mejor asesoría. Aquí puedes encontrar sus detalles de contacto para cualquier consulta.</p>
        
        <div class="space-y-8">
          <!-- Agente Jimmy Peña -->
          <div class="bg-gray-100 p-6 rounded-xl shadow-lg hover:shadow-2xl transform hover:scale-105 transition duration-300">
            <h4 class="text-2xl font-semibold text-[#BA9D79] mb-2">Jimmy Peña</h4>
            <p class="text-lg text-gray-600 mb-4">Especialista en Bienes Raíces con más de 5 años de experiencia en el sector. Te ayudará a encontrar la propiedad perfecta.</p>
            <ul class="space-y-3 text-lg">
              <li class="flex items-center">
                <i class="fas fa-phone-alt text-[#BA9D79] text-xl mr-3"></i>
                <span>+503 9876 5432</span>
              </li>
              <li class="flex items-center">
                <i class="fas fa-envelope text-[#BA9D79] text-xl mr-3"></i>
                <span>jimmy@encasa.com</span>
              </li>
              <li class="flex items-center">
                <i class="fas fa-map-marker-alt text-[#BA9D79] text-xl mr-3"></i>
                <span>San Salvador, El Salvador</span>
              </li>
            </ul>
          </div>

          <!-- Agente Steven Quevedo -->
          <div class="bg-gray-100 p-6 rounded-xl shadow-lg hover:shadow-2xl transform hover:scale-105 transition duration-300">
            <h4 class="text-2xl font-semibold text-[#BA9D79] mb-2">Steven Quevedo</h4>
            <p class="text-lg text-gray-600 mb-4">Con años de experiencia en el mercado inmobiliario, Steven es tu mejor opción para asesorarte en la compra o venta de propiedades.</p>
            <ul class="space-y-3 text-lg">
              <li class="flex items-center">
                <i class="fas fa-phone-alt text-[#BA9D79] text-xl mr-3"></i>
                <span>+503 1234 5678</span>
              </li>
              <li class="flex items-center">
                <i class="fas fa-envelope text-[#BA9D79] text-xl mr-3"></i>
                <span>steven@encasa.com</span>
              </li>
              <li class="flex items-center">
                <i class="fas fa-map-marker-alt text-[#BA9D79] text-xl mr-3"></i>
                <span>San Salvador, El Salvador</span>
              </li>
            </ul>
          </div>

          <!-- Agente Samuel Menjivar -->
          <div class="bg-gray-100 p-6 rounded-xl shadow-lg hover:shadow-2xl transform hover:scale-105 transition duration-300">
            <h4 class="text-2xl font-semibold text-[#BA9D79] mb-2">Samuel Menjivar</h4>
            <p class="text-lg text-gray-600 mb-4">Samuel es conocido por su atención al detalle y su enfoque personalizado para cada cliente. Con él, encontrarás la propiedad de tus sueños.</p>
            <ul class="space-y-3 text-lg">
              <li class="flex items-center">
                <i class="fas fa-phone-alt text-[#BA9D79] text-xl mr-3"></i>
                <span>+503 2345 6789</span>
              </li>
              <li class="flex items-center">
                <i class="fas fa-envelope text-[#BA9D79] text-xl mr-3"></i>
                <span>samuel@encasa.com</span>
              </li>
              <li class="flex items-center">
                <i class="fas fa-map-marker-alt text-[#BA9D79] text-xl mr-3"></i>
                <span>San Salvador, El Salvador</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- Sección de Ubicación y Mapa -->
    <div class="mt-16 grid md:grid-cols-2 gap-16">
      <!-- Mapa de Ubicación -->
      <div class="relative w-full h-80 rounded-xl overflow-hidden shadow-lg">
        <iframe class="absolute inset-0 w-full h-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.5762998778655!2d-89.21547208469055!3d13.990211522489992!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f63c22b80b507b1%3A0x1a62dbeb9ad0dbb7!2sCalle%20Principal%20%23123%2C%20San%20Salvador!5e0!3m2!1ses!2ssv!4v1651556091123!5m2!1ses!2ssv" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
      
      <!-- Información Adicional -->
      <div>
        <h3 class="text-2xl font-semibold text-[#BA9D79] mb-6">Visítanos</h3>
        <p class="text-lg text-gray-600 mb-4">Estamos ubicados en el corazón de San Salvador, en una ubicación estratégica para brindarte la mejor atención. Ven a visitarnos en cualquier momento dentro de nuestro horario de atención:</p>
        <ul class="space-y-4 text-lg">
          <li class="flex items-center">
            <i class="fas fa-clock text-[#BA9D79] text-xl mr-3"></i>
            <span>Lunes - Viernes: 9:00 AM - 6:00 PM</span>
          </li>
          <li class="flex items-center">
            <i class="fas fa-calendar-day text-[#BA9D79] text-xl mr-3"></i>
            <span>Sábado: 9:00 AM - 1:00 PM</span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>
@endsection