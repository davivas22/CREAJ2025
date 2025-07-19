<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel Agente - Sidebar Moderno Oscuro</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            dorado: '#BA9D79',
            morado: '#5B3C88'
          }
        }
      }
    }
  </script>
  <style>
    #sidebar {
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    #sidebar.collapsed .text-label,
    #sidebar.collapsed .user-name {
      display: none;
    }
    #sidebar .text-label,
    #sidebar .user-name {
      transition: opacity 0.4s ease, transform 0.4s ease;
    }
    #sidebar svg {
      width: 24px;
      height: 24px;
    }
  </style>
</head>
<body class="bg-[#f9f9f9] text-black font-sans">
  <div class="flex">
    <!-- Sidebar -->
    <aside id="sidebar" class="w-[260px] h-screen bg-[#1E1E2F] text-white shadow-md flex flex-col justify-between py-6 px-3 fixed z-10">
      <div class="flex flex-col items-center w-full">
        <div class="w-12 h-12 rounded-full overflow-hidden border-2 border-dorado">
          <img src="{{ asset(auth()->user()->foto_perfil) }}" class="w-full h-full object-cover">
        </div>
        <span class="mt-2 text-sm font-semibold user-name whitespace-nowrap">{{ auth()->user()->name }}</span>

        <!-- Navegación principal -->
        <nav class="flex flex-col w-full mt-8 space-y-1">
          <a href="/agente/dashboard" class="group flex items-center gap-3 p-3 rounded-xl hover:bg-[#2A2A3F] transition-all duration-300 {{ request()->is('agente/dashboard') ? 'bg-[#33334D] text-white' : 'text-white' }}">
            <div class="flex items-center justify-center w-10 h-10">
              <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7m-9 2v8" />
              </svg>
            </div>
            <span class="text-label text-sm font-medium">Panel Principal</span>
          </a>
          <a href="{{ route('agente.propiedades') }}" class="group flex items-center gap-3 p-3 rounded-xl hover:bg-[#2A2A3F] transition-all duration-300 {{ request()->is('agente/propiedades*') ? 'bg-[#33334D] text-white' : 'text-white' }}">
            <div class="flex items-center justify-center w-10 h-10">
              <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
              </svg>
            </div>
            <span class="text-label text-sm font-medium">Mis Propiedades</span>
          </a>
          <a href="{{ route('agente.crear') }}" class="group flex items-center gap-3 p-3 rounded-xl hover:bg-[#2A2A3F] transition-all duration-300 {{ request()->is('agente/crear') ? 'bg-[#33334D] text-white' : 'text-white' }}">
            <div class="flex items-center justify-center w-10 h-10">
              <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
              </svg>
            </div>
            <span class="text-label text-sm font-medium">Crear Propiedad</span>
          </a>
          <a href="/agente/mensajes" class="group flex items-center gap-3 p-3 rounded-xl hover:bg-[#2A2A3F] transition-all duration-300 {{ request()->is('agente/mensajes*') ? 'bg-[#33334D] text-white' : 'text-white' }}">
            <div class="flex items-center justify-center w-10 h-10">
              <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
            </div>
            <span class="text-label text-sm font-medium">Mensajes</span>
          </a>
          <a href="/agente/solicitudes" class="group flex items-center gap-3 p-3 rounded-xl hover:bg-[#2A2A3F] transition-all duration-300 {{ request()->is('agente/solicitudes*') ? 'bg-[#33334D] text-white' : 'text-white' }}">
            <div class="flex items-center justify-center w-10 h-10">
              <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2a4 4 0 118 0v2m-4 4h.01M4 6h16"/>
              </svg>
            </div>
            <span class="text-label text-sm font-medium">Solicitudes</span>
          </a>
          <a href="{{ route('agente.perfil') }}" class="group flex items-center gap-3 p-3 rounded-xl hover:bg-[#2A2A3F] transition-all duration-300 {{ request()->is('agente/perfil*') ? 'bg-[#33334D] text-white' : 'text-white' }}">
            <div class="flex items-center justify-center w-10 h-10">
              <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A4 4 0 017 15h10a4 4 0 011.879.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
              </svg>
            </div>
            <span class="text-label text-sm font-medium">Mi Perfil</span>
          </a>
        </nav>
      </div>

      <!-- Cerrar sesión -->
      <form method="POST" action="{{ route('logout') }}" class="w-full">
        @csrf
        <button type="submit" class="flex items-center gap-3 p-3 rounded-xl hover:bg-[#2A2A3F] transition-all duration-300 text-white w-full">
          <div class="flex items-center justify-center w-10 h-10">
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H6a2 2 0 01-2-2V7a2 2 0 012-2h5a2 2 0 012 2v1" />
            </svg>
          </div>
          <span class="text-label text-sm font-medium">Cerrar Sesión</span>
        </button>
      </form>
    </aside>

    <!-- Contenido -->
    <main class="ml-[260px] transition-all duration-500 flex-1 min-h-screen bg-[#f9f9f9] p-6" id="mainContent">
      @yield('contenido')
    </main>
  </div>

  <script>
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('mainContent');

    let isMouseOver = false;

    sidebar.addEventListener('mouseenter', () => {
      isMouseOver = true;
      sidebar.classList.remove('collapsed');
      sidebar.classList.remove('w-[64px]');
      sidebar.classList.add('w-[260px]');
      mainContent.classList.remove('ml-[64px]');
      mainContent.classList.add('ml-[260px]');
    });

    sidebar.addEventListener('mouseleave', () => {
      isMouseOver = false;
      setTimeout(() => {
        if (!isMouseOver) {
          sidebar.classList.add('collapsed');
          sidebar.classList.remove('w-[260px]');
          sidebar.classList.add('w-[64px]');
          mainContent.classList.remove('ml-[260px]');
          mainContent.classList.add('ml-[64px]');
        }
      }, 500);
    });
  </script>
</body>
</html>
