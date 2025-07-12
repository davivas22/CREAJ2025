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
</head>
<body class="bg-gray-50">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar (Desktop) -->
     <aside class="hidden md:flex md:flex-col w-72 bg-white text-[#BA9D79] border-r border-gray-200">
    <div class="p-6 border-b border-gray-300">
        <h2 class="text-2xl font-bold flex items-center text-[#BA9D79]">
            <i class="fas fa-estate mr-3 text-black"></i>
            Panel ENCASA
        </h2>
    </div>

    <nav class="flex-1 overflow-y-auto px-4 py-6">
        <div class="mb-6">
            <h3 class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Principal</h3>
            <ul class="mt-4 space-y-2">
                <li>
                    <a href="{{route('admin.dashboard')}}" class="flex items-center px-4 py-3 bg-black text-[#BA9D79] rounded-lg font-semibold">
                        <i class="fas fa-chart-line mr-3 text-[#BA9D79]"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.propiedades')}}" class="flex items-center px-4 py-3 text-black hover:bg-gray-200 rounded-lg transition">
                        <i class="fas fa-building mr-3 text-black"></i>
                        <span>Propiedades</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="mb-6">
            <h3 class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Gestión</h3>
            <ul class="mt-4 space-y-2">
                <li>
                    <a href="{{route('admin.agentes')}}" class="flex items-center px-4 py-3 text-black hover:bg-gray-200 rounded-lg transition">
                        <i class="fas fa-users mr-3 text-black"></i>
                        <span>Agentes</span>
                    </a>
                </li>
                <li>
                    <a href="clientes.html" class="flex items-center px-4 py-3 text-black hover:bg-gray-200 rounded-lg transition">
                        <i class="fas fa-user-tie mr-3 text-black"></i>
                        <span>Clientes</span>
                    </a>
                </li>
                <li>
                    <a href="citas.html" class="flex items-center px-4 py-3 text-black hover:bg-gray-200 rounded-lg transition">
                        <i class="fas fa-calendar-alt mr-3 text-black"></i>
                        <span>Citas</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="mb-6">
            <h3 class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Análisis</h3>
            <ul class="mt-4 space-y-2">
                <li>
                    <a href="reportes.html" class="flex items-center px-4 py-3 text-black hover:bg-gray-200 rounded-lg transition">
                        <i class="fas fa-chart-bar mr-3 text-black"></i>
                        <span>Reportes</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="mb-6">
            <h3 class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Sistema</h3>
            <ul class="mt-4 space-y-2">
                <li>
                    <a href="configuracion.html" class="flex items-center px-4 py-3 text-black hover:bg-gray-200 rounded-lg transition">
                        <i class="fas fa-cog mr-3 text-black"></i>
                        <span>Configuración</span>
                    </a>
                </li>
                <li>
                    <a href="usuarios.html" class="flex items-center px-4 py-3 text-black hover:bg-gray-200 rounded-lg transition">
                        <i class="fas fa-users-cog mr-3 text-black"></i>
                        <span>Usuarios</span>
                    </a>
                </li>
                <li>
                    <a href="roles.html" class="flex items-center px-4 py-3 text-black hover:bg-gray-200 rounded-lg transition">
                        <i class="fas fa-user-shield mr-3 text-black"></i>
                        <span>Roles</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="p-4 border-t border-gray-300">
        <a href="perfil.html" class="flex items-center space-x-4">
            <div class="relative">
                <img src="https://ui-avatars.com/api/?name=Admin+User&background=BA9D79&color=000000" class="w-10 h-10 rounded-lg">
                <span class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 border-2 border-white rounded-full"></span>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-black truncate">{{auth()->user()->name}} {{auth()->user()->lastname}}</p>
                <p class="text-xs text-gray-500 truncate">{{auth()->user()->email}}</p>
            </div>
            <div class="inline-flex items-center justify-center p-2 text-gray-600 hover:text-black hover:bg-gray-200 rounded-lg transition">
                <i class="fas fa-cog"></i>
            </div>
        </a>
    </div>
</aside>

        <!-- Mobile Sidebar -->
        <div x-data="{ open: false }" class="fixed inset-0 z-40 md:hidden" :class="{ 'hidden': !open }" id="mobileSidebar">
            <div class="absolute inset-0 bg-gray-600 opacity-75" @click="open = false"></div>
            
            <div class="relative flex-1 flex flex-col w-full max-w-xs bg-gradient-to-b from-blue-800 to-blue-900 text-white transform transition-transform duration-300 ease-in-out">
                <!-- Copiar el contenido del sidebar desktop aquí -->
            </div>
        </div>

{{-- CONTENIDO DE CADA PÁGINA --}}
    <main class="flex-1 p-6 overflow-auto">
        @yield('content')
    </main>

</body>
</html>