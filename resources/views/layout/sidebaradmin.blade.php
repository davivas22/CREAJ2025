<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración ENCASA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Estilos para el Sidebar */
        .sidebar {
            width: 260px; /* Ancho fijo del sidebar */
            height: 100%;
            background-color: white;
            position: fixed;
            top: 0;
            left: 0;
            box-shadow: 4px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar a {
            display: block;
            padding: 16px;
            color: black; /* Cambiar el color del texto a negro */
            text-decoration: none;
            transition: background-color 0.3s ease, padding-left 0.3s ease;
        }

        /* Mejorar el resaltado */
        .sidebar a:hover, .sidebar a.active {
            background-color: #BA9D79; /* Fondo resaltado */
            color: white; /* Texto blanco cuando se resalta */
            padding-left: 24px; /* Desplazar el texto a la izquierda para hacerlo más atractivo */
            border-radius: 12px; /* Bordes redondeados */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Sombra suave para el efecto visual */
        }

        /* Estilos para el contenido principal */
        .main-content {
            margin-left: 260px; /* Deja espacio para el sidebar */
            transition: margin-left 0.3s ease;
        }
    </style>
</head>
<body class="bg-gray-50">

    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar (Desktop) -->
        <aside id="sidebar" class="sidebar w-72 h-screen bg-white border-r border-neutral-200/70 shadow-sm flex flex-col">
  <!-- Header -->
  <div class="px-5 py-5 border-b border-neutral-200/70">
    <h2 class="text-xl font-bold tracking-tight flex items-center gap-3 text-neutral-900">
      <i class="fas fa-estate text-[22px] text-neutral-900"></i>
      <span>Panel <span class="text-[#BA9D79]">ENCASA</span></span>
    </h2>
  </div>

  <!-- Nav -->
  <nav class="flex-1 overflow-y-auto px-3 py-5 scrollbar-thin scrollbar-thumb-neutral-300/80 scrollbar-track-transparent">
    {{-- Grupo: Principal --}}
    <div class="mb-7">
      <h3 class="px-3 text-[11px] font-semibold text-neutral-500 uppercase tracking-[0.12em]">Principal</h3>
      <ul class="mt-3 space-y-1.5">
        <li>
          <a href="{{ route('admin.dashboard') }}"
             class="group relative flex items-center gap-3 px-3 py-2.5 rounded-xl transition
                    {{ request()->routeIs('admin.dashboard')
                        ? 'bg-[#BA9D79]/10 text-neutral-900 ring-1 ring-[#BA9D79]/30'
                        : 'text-neutral-700 hover:bg-neutral-100' }}">
            <i class="fas fa-chart-line text-[18px] {{ request()->routeIs('admin.dashboard') ? 'text-[#BA9D79]' : 'text-neutral-900/80 group-hover:text-neutral-900' }}"></i>
            <span class="text-sm font-medium">Dashboard</span>
            @if(request()->routeIs('admin.dashboard'))
              <span class="absolute inset-y-0 left-0 w-1 rounded-r-xl bg-[#BA9D79]"></span>
            @endif
          </a>
        </li>

        <li>
          <a href="{{ route('admin.propiedades') }}"
             class="group relative flex items-center gap-3 px-3 py-2.5 rounded-xl transition
                    {{ request()->routeIs('admin.propiedades')
                        ? 'bg-[#BA9D79]/10 text-neutral-900 ring-1 ring-[#BA9D79]/30'
                        : 'text-neutral-700 hover:bg-neutral-100' }}">
            <i class="fas fa-building text-[18px] {{ request()->routeIs('admin.propiedades') ? 'text-[#BA9D79]' : 'text-neutral-900/80 group-hover:text-neutral-900' }}"></i>
            <span class="text-sm font-medium">Propiedades</span>
            @if(request()->routeIs('admin.propiedades'))
              <span class="absolute inset-y-0 left-0 w-1 rounded-r-xl bg-[#BA9D79]"></span>
            @endif
          </a>
        </li>
      </ul>
    </div>

    {{-- Grupo: Gestión --}}
    <div class="mb-7">
      <h3 class="px-3 text-[11px] font-semibold text-neutral-500 uppercase tracking-[0.12em]">Gestión</h3>
      <ul class="mt-3 space-y-1.5">
        <li>
          <a href="{{ route('admin.agentes') }}"
             class="group relative flex items-center gap-3 px-3 py-2.5 rounded-xl transition
                    {{ request()->routeIs('admin.agentes')
                        ? 'bg-[#BA9D79]/10 text-neutral-900 ring-1 ring-[#BA9D79]/30'
                        : 'text-neutral-700 hover:bg-neutral-100' }}">
            <i class="fas fa-users text-[18px] {{ request()->routeIs('admin.agentes') ? 'text-[#BA9D79]' : 'text-neutral-900/80 group-hover:text-neutral-900' }}"></i>
            <span class="text-sm font-medium">Agentes</span>
            @if(request()->routeIs('admin.agentes'))
              <span class="absolute inset-y-0 left-0 w-1 rounded-r-xl bg-[#BA9D79]"></span>
            @endif
          </a>
        </li>

        <li>
          <a href="{{ route('admin.solicitud.agente') }}"
             class="group relative flex items-center gap-3 px-3 py-2.5 rounded-xl transition
                    {{ request()->routeIs('admin.solicitud.agente')
                        ? 'bg-[#BA9D79]/10 text-neutral-900 ring-1 ring-[#BA9D79]/30'
                        : 'text-neutral-700 hover:bg-neutral-100' }}">
            <i class="fas fa-user-tie text-[18px] {{ request()->routeIs('admin.solicitud.agente') ? 'text-[#BA9D79]' : 'text-neutral-900/80 group-hover:text-neutral-900' }}"></i>
            <span class="text-sm font-medium">Solicitudes</span>
            @if(request()->routeIs('admin.solicitud.agente'))
              <span class="absolute inset-y-0 left-0 w-1 rounded-r-xl bg-[#BA9D79]"></span>
            @endif
          </a>
        </li>

        <li>
          <a href=""
             class="group relative flex items-center gap-3 px-3 py-2.5 rounded-xl transition
                    {{ request()->routeIs('admin.citas')
                        ? 'bg-[#BA9D79]/10 text-neutral-900 ring-1 ring-[#BA9D79]/30'
                        : 'text-neutral-700 hover:bg-neutral-100' }}">
            <i class="fas fa-calendar-alt text-[18px] {{ request()->routeIs('admin.citas') ? 'text-[#BA9D79]' : 'text-neutral-900/80 group-hover:text-neutral-900' }}"></i>
            <span class="text-sm font-medium">Citas</span>
            @if(request()->routeIs('admin.citas'))
              <span class="absolute inset-y-0 left-0 w-1 rounded-r-xl bg-[#BA9D79]"></span>
            @endif
          </a>
        </li>
      </ul>
    </div>

    {{-- Grupo: Análisis --}}
    <div class="mb-7">
      <h3 class="px-3 text-[11px] font-semibold text-neutral-500 uppercase tracking-[0.12em]">Análisis</h3>
      <ul class="mt-3 space-y-1.5">
        <li>
          <a href=""
             class="group relative flex items-center gap-3 px-3 py-2.5 rounded-xl transition
                    {{ request()->routeIs('admin.reportes')
                        ? 'bg-[#BA9D79]/10 text-neutral-900 ring-1 ring-[#BA9D79]/30'
                        : 'text-neutral-700 hover:bg-neutral-100' }}">
            <i class="fas fa-chart-bar text-[18px] {{ request()->routeIs('admin.reportes') ? 'text-[#BA9D79]' : 'text-neutral-900/80 group-hover:text-neutral-900' }}"></i>
            <span class="text-sm font-medium">Reportes</span>
            @if(request()->routeIs('admin.reportes'))
              <span class="absolute inset-y-0 left-0 w-1 rounded-r-xl bg-[#BA9D79]"></span>
            @endif
          </a>
        </li>
      </ul>
    </div>

    {{-- Grupo: Sistema --}}
    <div class="mb-2">
      <h3 class="px-3 text-[11px] font-semibold text-neutral-500 uppercase tracking-[0.12em]">Sistema</h3>
      <ul class="mt-3 space-y-1.5">
        <li>
          <a href=""
             class="group relative flex items-center gap-3 px-3 py-2.5 rounded-xl transition
                    {{ request()->routeIs('admin.config')
                        ? 'bg-[#BA9D79]/10 text-neutral-900 ring-1 ring-[#BA9D79]/30'
                        : 'text-neutral-700 hover:bg-neutral-100' }}">
            <i class="fas fa-cog text-[18px] {{ request()->routeIs('admin.config') ? 'text-[#BA9D79]' : 'text-neutral-900/80 group-hover:text-neutral-900' }}"></i>
            <span class="text-sm font-medium">Configuración</span>
            @if(request()->routeIs('admin.config'))
              <span class="absolute inset-y-0 left-0 w-1 rounded-r-xl bg-[#BA9D79]"></span>
            @endif
          </a>
        </li>

        <li>
          <a href=""
             class="group relative flex items-center gap-3 px-3 py-2.5 rounded-xl transition
                    {{ request()->routeIs('admin.usuarios')
                        ? 'bg-[#BA9D79]/10 text-neutral-900 ring-1 ring-[#BA9D79]/30'
                        : 'text-neutral-700 hover:bg-neutral-100' }}">
            <i class="fas fa-users-cog text-[18px] {{ request()->routeIs('admin.usuarios') ? 'text-[#BA9D79]' : 'text-neutral-900/80 group-hover:text-neutral-900' }}"></i>
            <span class="text-sm font-medium">Usuarios</span>
            @if(request()->routeIs('admin.usuarios'))
              <span class="absolute inset-y-0 left-0 w-1 rounded-r-xl bg-[#BA9D79]"></span>
            @endif
          </a>
        </li>

        <li>
          <a href=""
             class="group relative flex items-center gap-3 px-3 py-2.5 rounded-xl transition
                    {{ request()->routeIs('admin.roles')
                        ? 'bg-[#BA9D79]/10 text-neutral-900 ring-1 ring-[#BA9D79]/30'
                        : 'text-neutral-700 hover:bg-neutral-100' }}">
            <i class="fas fa-user-shield text-[18px] {{ request()->routeIs('admin.roles') ? 'text-[#BA9D79]' : 'text-neutral-900/80 group-hover:text-neutral-900' }}"></i>
            <span class="text-sm font-medium">Roles</span>
            @if(request()->routeIs('admin.roles'))
              <span class="absolute inset-y-0 left-0 w-1 rounded-r-xl bg-[#BA9D79]"></span>
            @endif
          </a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Footer / Perfil -->
  <div class="p-4 border-t border-neutral-200/70">
    <a href="" class="flex items-center gap-3 group">
      <div class="relative">
        <img src="{{ auth()->user()->foto_perfil ? asset(auth()->user()->foto_perfil) : 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name.' '.auth()->user()->lastname).'&background=BA9D79&color=000000' }}"
             class="w-11 h-11 rounded-xl object-cover ring-1 ring-neutral-200" alt="Perfil">
        <span class="absolute -bottom-0.5 -right-0.5 w-3 h-3 bg-emerald-500 border-2 border-white rounded-full"></span>
      </div>
     
     
    </a>
  </div>
</aside>


        <!-- Contenido -->
        <main id="mainContent" class="flex-1 p-6 overflow-auto ml-[260px]">
            @yield('content')
        </main>
    </div>

</body>
</html>
