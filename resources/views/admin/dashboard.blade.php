@extends('layout.sidebaradmin')

@section('content')
 <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden bg-gray-50">
            <!-- Top Navigation -->
            <header class="bg-white border-b border-gray-200  relative z-30">
                <div class="px-4 sm:px-6 lg:px-8 py-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <button @click="$store.mobileMenu.toggle()" class="md:hidden text-gray-600 hover:text-gray-900 focus:outline-none">
                                <i class="fas fa-bars text-xl"></i>
                            </button>
                            <div class="ml-4 md:ml-0">
                                <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
                                <p class="text-sm text-gray-500">Bienvenido de nuevo, {{ auth()->user()->name }} {{ auth()->user()->lastname }}</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-6">
                            

                          
                            
                            <!-- Notifications -->
                                                <div class="relative">
                        <button onclick="document.getElementById('notificaciones').classList.toggle('hidden')" class="relative">
                            <!-- Campana -->
                            <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V4a2 2 0 10-4 0v1.341C8.67 6.165 8 7.388 8 8.75v5.408c0 .538-.214 1.055-.595 1.437L6 17h5m4 0v1a2 2 0 11-4 0v-1m4 0H9" />
                            </svg>

                            <!-- Contador -->
                            @if ($solicitudesNuevas->count() > 0)
                            <span class="absolute -top-1 -right-1 bg-red-600 text-white text-xs px-1.5 py-0.5 rounded-full">
                                {{ $solicitudesNuevas->count() }}
                            </span>
                            @endif
                        </button>

                        <!-- Dropdown -->
                        <div id="notificaciones" class="absolute right-0 mt-2 w-72 bg-white shadow-lg rounded-lg hidden z-50">
                            <ul>
                            @forelse ($solicitudesNuevas as $sol)
                                <li class="border-b px-4 py-3 hover:bg-gray-100 text-sm">
                                <a href="{{ route('Admin.verSolicitud', $sol->id) }}" class="block text-gray-800">
                                    Nueva solicitud para agente de <strong>{{ $sol->name }}</strong>
                                    <br><span class="text-xs text-gray-500">{{ $sol->created_at->diffForHumans() }}</span>
                                </a>
                                </li>
                            @empty
                                <li class="px-4 py-3 text-gray-500 text-sm">No hay nuevas solicitudes</li>
                            @endforelse
                            </ul>
                        </div>
                        </div>


                          

                            <!-- Profile Dropdown -->
                            <div class="relative" x-data="{ open: false }">
                                <button @click="open = !open" class="flex items-center space-x-2 text-gray-600 hover:text-gray-900 focus:outline-none">
                                    <img src="{{auth()->user()->foto_perfil ? asset(auth()->user()->foto_perfil) : 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name.' '.auth()->user()->lastname).'&background=BA9D79&color=000000' }}" class="w-8 h-8 rounded-lg">
                                    <i class="fas fa-chevron-down text-sm"></i>
                                </button>
                                <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2">
                                    <a href="{{route('admin.configuracion')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Mi Perfil</a>
            
                                    <hr class="my-2">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 w-full text-left">
                                            Cerrar sesión
                                        </button>
                                    </form>

                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto bg-gray-50 p-6">
                <!-- Quick Stats -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <!-- Revenue Card -->
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <div class="p-3 rounded-xl bg-blue-50 text-blue-600">
                                    <i class="fas fa-dollar-sign text-2xl"></i>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-sm font-medium text-gray-400">Ingresos</h3>
                                    <p class="text-2xl font-bold text-gray-900">$0</p>
                                </div>
                            </div>
                            <span class="text-green-500 text-sm font-medium flex items-center">
                                <i class="fas fa-arrow-up mr-1"></i>
                                
                            </span>
                        </div>
                        <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                            <div class="h-full bg-blue-500 rounded-full" style="width: 82%"></div>
                        </div>
                    </div>

                    <!-- Properties Card -->
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <div class="p-3 rounded-xl bg-purple-50 text-purple-600">
                                    <i class="fas fa-building text-2xl"></i>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-sm font-medium text-gray-400">Propiedades</h3>
                                    <p class="text-2xl font-bold text-gray-900">{{$propiedades}}</p>
                                </div>
                            </div>
                            <span class="text-green-500 text-sm font-medium flex items-center">
                                <i class="fas fa-arrow-up mr-1"></i>
                                14%
                            </span>
                        </div>
                        <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                            <div class="h-full bg-purple-500 rounded-full" style="width: 65%"></div>
                        </div>
                    </div>

                    <!-- Clients Card -->
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <div class="p-3 rounded-xl bg-green-50 text-green-600">
                                    <i class="fas fa-users text-2xl"></i>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-sm font-medium text-gray-400">Agentes</h3>
                                    <p class="text-2xl font-bold text-gray-900">{{$agentes}}</p>
                                </div>
                            </div>
                            <span class="text-green-500 text-sm font-medium flex items-center">
                                <i class="fas fa-arrow-up mr-1"></i>
                                8%
                            </span>
                        </div>
                        <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                            <div class="h-full bg-green-500 rounded-full" style="width: 75%"></div>
                        </div>
                    </div>

                    <!-- Conversion Card -->
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <div class="p-3 rounded-xl bg-yellow-50 text-yellow-600">
                                    <i class="fas fa-chart-pie text-2xl"></i>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-sm font-medium text-gray-400">Conversión</h3>
                                    <p class="text-2xl font-bold text-gray-900"></p>
                                </div>
                            </div>
                            <span class="text-red-500 text-sm font-medium flex items-center">
                                <i class="fas fa-arrow-down mr-1"></i>
                                2%
                            </span>
                        </div>
                        <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                            <div class="h-full bg-yellow-500 rounded-full" style="width: 45%"></div>
                        </div>
                    </div>
                </div>

                <!-- Main Grid -->
                <div class="grid grid-cols-12 gap-6">
                    <!-- Left Column -->
                    <div class="col-span-12 lg:col-span-8 space-y-6">
                        <!-- Revenue Chart -->
                        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                            <div class="flex items-center justify-between mb-6">
                                <div>
                                    <h2 class="text-lg font-bold text-gray-900">Ingresos por Mes</h2>
                                    <p class="text-sm text-gray-500">Análisis detallado de ingresos</p>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <button data-filter="day" class="px-3 py-1 text-sm text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-all duration-200">Día</button>
                                    <button data-filter="month" class="px-3 py-1 text-sm text-white bg-blue-600 rounded-lg">Mes</button>
                                    <button data-filter="year" class="px-3 py-1 text-sm text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-all duration-200">Año</button>
                                </div>
                            </div>
                            <canvas id="revenueChart" class="w-full h-72"></canvas>
                        </div>

                        <!-- Recent Properties -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                            <div class="p-6 border-b border-gray-100">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h2 class="text-lg font-bold text-gray-900">Propiedades Recientes</h2>
                                        <p class="text-sm text-gray-500">Últimas propiedades añadidas</p>
                                    </div>
                                    <button class="px-4 py-2 text-sm text-blue-600 hover:text-blue-700 hover:bg-blue-50 rounded-lg transition-all duration-200">
                                        Ver todas
                                    </button>
                                </div>
                            </div>
                            <div class="divide-y divide-gray-100">
                                <!-- Property Item -->
                                <div class="p-6 hover:bg-gray-50 transition-all duration-200">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-shrink-0">
                                            <img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="w-16 h-16 rounded-lg object-cover">
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-900 truncate">Casa Moderna en Zona Norte</p>
                                            <p class="text-sm text-gray-500">Calle Principal 123, Ciudad</p>
                                            <div class="flex items-center mt-1">
                                                <span class="text-xs text-gray-500">4 hab • 3 baños • 250m²</span>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-lg font-bold text-gray-900">$450,000</p>
                                            <p class="text-xs text-green-500 font-medium">Disponible</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- More Property Items -->
                                <!-- ... (similar structure for other properties) ... -->
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-span-12 lg:col-span-4 space-y-6">
                       
                        

                        <!-- Recent Activities -->
                        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                            <h2 class="text-lg font-bold text-gray-900 mb-4">Actividad Reciente</h2>
                            <div class="space-y-4">
                                <!-- Activity Item -->
                                <div class="flex items-start space-x-4">
                                    <div class="flex-shrink-0">
                                        <span class="w-8 h-8 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center">
                                            <i class="fas fa-home"></i>
                                        </span>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900">Nueva propiedad listada</p>
                                        <p class="text-sm text-gray-500">Casa moderna en Zona Norte</p>
                                        <p class="text-xs text-gray-400 mt-1">Hace 2 horas</p>
                                    </div>
                                </div>

                                <!-- More Activity Items -->
                                <!-- ... (similar structure for other activities) ... -->
                            </div>
                        </div>

                        
                       
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection