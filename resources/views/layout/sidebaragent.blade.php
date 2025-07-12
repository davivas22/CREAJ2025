<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel Agente - Layout</title>
  <script src="https://cdn.tailwindcss.com"></script>
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
</head>
<body class="bg-[#f9f9f9] text-black font-sans">
  <div class="flex">
    <!-- Sidebar -->
   <aside id="sidebar" class="w-64 bg-black text-white shadow-xl h-screen fixed">
  <!-- Encabezado con foto y nombre del agente -->
  <div class="flex flex-col items-center py-6 border-b border-gray-800 px-4 text-center">
    <div class="w-20 h-20 rounded-full overflow-hidden border-4 border-[#BA9D79] shadow-md mb-3">
      <img src="{{ asset(auth()->user()->foto_perfil) }}" alt="Foto de perfil" class="w-full h-full object-cover">
    </div>
    <h2 class="text-lg font-semibold text-dorado">
      {{ auth()->user()->name }}
    </h2>
  </div>

  <!-- Navegación -->
  <nav class="mt-4 divide-y divide-gray-800">
    <div class="space-y-1 pb-2">
      <a href="/agente/dashboard"
         class="group flex items-center px-6 py-3 text-sm font-medium transition
                {{ request()->is('agente/dashboard') ? 'text-dorado bg-dorado/10' : 'text-white hover:text-dorado hover:bg-dorado/10' }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 text-dorado" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 12l2-2m0 0l7-7 7 7m-9 2v8"/>
        </svg>
        Panel Principal
      </a>

      <a href="{{ route('agente.propiedades') }}"
         class="group flex items-center px-6 py-3 text-sm font-medium transition
                {{ request()->is('agente/propiedades*') ? 'text-dorado bg-dorado/10' : 'text-white hover:text-dorado hover:bg-dorado/10' }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 text-dorado" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
        </svg>
        Mis Propiedades
      </a>

      <a href="{{ route('agente.crear') }}"
         class="group flex items-center px-6 py-3 text-sm font-medium transition
                {{ request()->is('agente/crear') ? 'text-dorado bg-dorado/10' : 'text-white hover:text-dorado hover:bg-dorado/10' }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 text-dorado" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 4v16m8-8H4"/>
        </svg>
        Crear Propiedad
      </a>
    </div>

    <div class="space-y-1 pt-2 pb-2">
      <a href="/agente/mensajes"
         class="group flex items-center px-6 py-3 text-sm font-medium transition
                {{ request()->is('agente/mensajes*') ? 'text-dorado bg-dorado/10' : 'text-white hover:text-dorado hover:bg-dorado/10' }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 text-dorado" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 10h.01M12 10h.01M16 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        Mensajes
      </a>

      <a href="/agente/solicitudes"
         class="group flex items-center px-6 py-3 text-sm font-medium transition
                {{ request()->is('agente/solicitudes*') ? 'text-dorado bg-dorado/10' : 'text-white hover:text-dorado hover:bg-dorado/10' }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 text-dorado" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 17v-2a4 4 0 118 0v2m-4 4h.01M4 6h16"/>
        </svg>
        Solicitudes
      </a>
    </div>

    <div class="space-y-1 pt-2">
      <a href="{{ route('agente.perfil') }}"
         class="group flex items-center px-6 py-3 text-sm font-medium transition
                {{ request()->is('agente/perfil*') ? 'text-dorado bg-dorado/10' : 'text-white hover:text-dorado hover:bg-dorado/10' }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 text-dorado" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5.121 17.804A4 4 0 017 15h10a4 4 0 011.879.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
        </svg>
        Mi Perfil
      </a>
    </div>

    <div class="space-y-1 pt-2">
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"
                class="w-full text-left group flex items-center px-6 py-3 text-sm font-medium transition text-white hover:bg-dorado/10 hover:text-dorado">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 text-dorado" fill="none"
               viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H6a2 2 0 01-2-2V7a2 2 0 012-2h5a2 2 0 012 2v1"/>
          </svg>
          Cerrar Sesión
        </button>
      </form>
    </div>
  </nav>
</aside>

    <!-- Contenido principal -->
    <main class="ml-64 flex-1 bg-[#f9f9f9] h-screen overflow-y-auto p-8">
      @yield('contenido')
    </main>
  </div>

  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.toggle('w-64');
      sidebar.classList.toggle('w-0');
      sidebar.classList.toggle('overflow-hidden');
    }
  </script>
</body>
</html>
