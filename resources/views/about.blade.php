@extends('layout.app')

@section('content')

<!-- Sección Sobre Nosotros -->
<section class="py-16 bg-white text-gray-900" id="sobre-nosotros">
  <div class="max-w-7xl mx-auto px-6">
    <!-- Título -->
    <h2 class="text-5xl font-extrabold text-center text-[#BA9D79] mb-12">Sobre Nosotros</h2>
    <p class="text-lg text-center text-gray-600 mb-8">En EnCasa, nos apasiona ayudarte a encontrar el hogar de tus sueños. Con un equipo de expertos en bienes raíces, cada cliente recibe atención personalizada, asesoría integral y el mejor servicio posible. Conoce a nuestros agentes y descubre lo que podemos hacer por ti.</p>

    <!-- Sección de Agentes -->
    <div class="grid md:grid-cols-3 gap-16">
      <!-- Agente Jimmy Peña -->
      <div class="bg-white p-6 rounded-2xl shadow-xl hover:shadow-2xl transform hover:scale-105 transition duration-500">
        <img src="https://cdn-icons-png.flaticon.com/512/6522/6522581.png" alt="Jimmy Peña" class="w-full h-64 object-cover rounded-lg mb-6 border-4 border-[#BA9D79]">
        <h4 class="text-2xl font-semibold text-[#BA9D79] mb-2">Jimmy Peña</h4>
        <p class="text-lg text-gray-600 mb-4">Especialista en Bienes Raíces con más de 5 años de experiencia en el sector. Conoce a fondo el mercado inmobiliario y siempre está dispuesto a ayudarte a encontrar la propiedad perfecta.</p>
        <ul class="space-y-3 text-lg">
          <li class="flex items-center">
            <i class="fas fa-briefcase text-[#BA9D79] text-xl mr-3"></i>
            <span>5+ años de experiencia</span>
          </li>
          <li class="flex items-center">
            <i class="fas fa-phone-alt text-[#BA9D79] text-xl mr-3"></i>
            <span>+503 9876 5432</span>
          </li>
          <li class="flex items-center">
            <i class="fas fa-envelope text-[#BA9D79] text-xl mr-3"></i>
            <span>jimmy@encasa.com</span>
          </li>
        </ul>
        <a href="mailto:jimmy@encasa.com" class="bg-[#BA9D79] hover:bg-[#a38564] text-white py-2 px-4 rounded-full mt-4 inline-block">Contactar a Jimmy</a>
      </div>

      <!-- Agente Steven Quevedo -->
      <div class="bg-white p-6 rounded-2xl shadow-xl hover:shadow-2xl transform hover:scale-105 transition duration-500">
        <img src="https://cdn-icons-png.flaticon.com/512/6522/6522581.png" alt="Steven Quevedo" class="w-full h-64 object-cover rounded-lg mb-6 border-4 border-[#BA9D79]">
        <h4 class="text-2xl font-semibold text-[#BA9D79] mb-2">Steven Quevedo</h4>
        <p class="text-lg text-gray-600 mb-4">Con años de experiencia, Steven se dedica a ofrecer un servicio altamente personalizado, ayudando a sus clientes a tomar decisiones informadas y acertadas en el mercado inmobiliario.</p>
        <ul class="space-y-3 text-lg">
          <li class="flex items-center">
            <i class="fas fa-briefcase text-[#BA9D79] text-xl mr-3"></i>
            <span>Especialista en ventas</span>
          </li>
          <li class="flex items-center">
            <i class="fas fa-phone-alt text-[#BA9D79] text-xl mr-3"></i>
            <span>+503 1234 5678</span>
          </li>
          <li class="flex items-center">
            <i class="fas fa-envelope text-[#BA9D79] text-xl mr-3"></i>
            <span>steven@encasa.com</span>
          </li>
        </ul>
        <a href="mailto:steven@encasa.com" class="bg-[#BA9D79] hover:bg-[#a38564] text-white py-2 px-4 rounded-full mt-4 inline-block">Contactar a Steven</a>
      </div>

      <!-- Agente Samuel Menjivar -->
      <div class="bg-white p-6 rounded-2xl shadow-xl hover:shadow-2xl transform hover:scale-105 transition duration-500">
        <img src="https://cdn-icons-png.flaticon.com/512/6522/6522581.png" alt="Samuel Menjivar" class="w-full h-64 object-cover rounded-lg mb-6 border-4 border-[#BA9D79]">
        <h4 class="text-2xl font-semibold text-[#BA9D79] mb-2">Samuel Menjivar</h4>
        <p class="text-lg text-gray-600 mb-4">Samuel es reconocido por su atención al detalle y su enfoque único hacia cada cliente. Se asegura de que cada transacción sea satisfactoria y segura para todas las partes.</p>
        <ul class="space-y-3 text-lg">
          <li class="flex items-center">
            <i class="fas fa-briefcase text-[#BA9D79] text-xl mr-3"></i>
            <span>Especialista en bienes residenciales</span>
          </li>
          <li class="flex items-center">
            <i class="fas fa-phone-alt text-[#BA9D79] text-xl mr-3"></i>
            <span>+503 2345 6789</span>
          </li>
          <li class="flex items-center">
            <i class="fas fa-envelope text-[#BA9D79] text-xl mr-3"></i>
            <span>samuel@encasa.com</span>
          </li>
        </ul>
        <a href="mailto:samuel@encasa.com" class="bg-[#BA9D79] hover:bg-[#a38564] text-white py-2 px-4 rounded-full mt-4 inline-block">Contactar a Samuel</a>
      </div>
    </div>

    <!-- Sección de Valores y Compromiso -->
    <div class="mt-16 bg-[#f9f9f9] py-12 px-6 rounded-lg shadow-md text-center">
      <h3 class="text-3xl font-semibold text-[#BA9D79] mb-6">Nuestros Valores y Compromiso</h3>
      <p class="text-lg text-gray-600">En EnCasa, nos comprometemos a brindarte un servicio de calidad, profesionalismo y transparencia. Creemos en la honestidad, la atención personalizada y la excelencia en cada transacción. Tu satisfacción es nuestra prioridad.</p>
    </div>

    <!-- Testimonios de Clientes -->
    <div class="mt-16 text-center">
      <h3 class="text-3xl font-semibold text-[#BA9D79] mb-6">Testimonios</h3>
      <div class="flex justify-center gap-8">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-xs">
          <p class="text-gray-600 italic mb-4">"Gracias a EnCasa, encontramos la casa perfecta para nuestra familia. El proceso fue rápido y muy fácil, ¡sin duda los recomendaré!"</p>
          <div class="flex items-center">
            <img src="https://randomuser.me/api/portraits/women/44.jpg" class="w-12 h-12 rounded-full mr-4">
            <div>
              <p class="font-semibold text-gray-800">Ana Gómez</p>
              <p class="text-sm text-gray-500">San Salvador</p>
            </div>
          </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-xs">
          <p class="text-gray-600 italic mb-4">"¡El servicio fue excelente! Los agentes realmente se preocuparon por entender nuestras necesidades y nos ayudaron a elegir la propiedad perfecta."</p>
          <div class="flex items-center">
            <img src="https://randomuser.me/api/portraits/men/24.jpg" class="w-12 h-12 rounded-full mr-4">
            <div>
              <p class="font-semibold text-gray-800">Carlos Pérez</p>
              <p class="text-sm text-gray-500">Santa Tecla</p>
            </div>
          </div>
        </div>
      </div>
    </div>

   <!-- Sección de Misión, Visión y Valores con Cards Creativas y Fondo Único -->
<section class="py-16 bg-white text-gray-900" id="mision-vision-valores">
  <div class="max-w-7xl mx-auto px-6">
    <!-- Título -->
    <h2 class="text-5xl font-extrabold text-center text-[#BA9D79] mb-12">Nuestra Misión, Visión y Valores</h2>
    
    <div class="grid md:grid-cols-3 gap-16">
      <!-- Card de Misión -->
      <div class="bg-[#BA9D79] text-white p-8 rounded-xl shadow-lg transform hover:scale-105 transition duration-300">
        <div class="text-4xl mb-6">
          <i class="fas fa-bullseye"></i>
        </div>
        <h4 class="text-3xl font-semibold mb-4">Misión</h4>
        <p class="text-lg">Nuestra misión es ofrecer un servicio inmobiliario de alta calidad, basado en la confianza y la honestidad, ayudando a nuestros clientes a tomar decisiones informadas y satisfactorias en el proceso de compra y venta de propiedades.</p>
      </div>

      <!-- Card de Visión -->
      <div class="bg-[#BA9D79] text-white p-8 rounded-xl shadow-lg transform hover:scale-105 transition duration-300">
        <div class="text-4xl mb-6">
          <i class="fas fa-eye"></i>
        </div>
        <h4 class="text-3xl font-semibold mb-4">Visión</h4>
        <p class="text-lg">Ser reconocidos como la agencia inmobiliaria más confiable de El Salvador, brindando soluciones innovadoras, servicios personalizados y un alto nivel de satisfacción para nuestros clientes.</p>
      </div>

      <!-- Card de Valores -->
      <div class="bg-[#BA9D79] text-white p-8 rounded-xl shadow-lg transform hover:scale-105 transition duration-300">
        <div class="text-4xl mb-6">
          <i class="fas fa-handshake"></i>
        </div>
        <h4 class="text-3xl font-semibold mb-4">Valores</h4>
        <ul class="text-lg space-y-4">
          <li><strong>Confianza:</strong> Construimos relaciones duraderas basadas en la transparencia.</li>
          <li><strong>Profesionalismo:</strong> Nos comprometemos a ofrecer un servicio excepcional en todo momento.</li>
          <li><strong>Honestidad:</strong> Siempre actuamos con integridad y responsabilidad.</li>
          <li><strong>Innovación:</strong> Buscamos soluciones creativas y eficientes para cada cliente.</li>
        </ul>
      </div>
    </div>
  </div>
</section>
@endsection