@extends('layout.app')

@section('content')
   <body class="bg-gray-50 text-gray-800 min-h-screen">
    <!-- Encabezado de la página -->
    <header class="pt-24 pb-12 bg-gradient-to-r from-blue-500 to-blue-700 text-white relative overflow-hidden">
        <!-- Círculos decorativos animados -->
        <div class="absolute top-20 right-20 w-32 h-32 bg-blue-400 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
        <div class="absolute top-40 left-20 w-36 h-36 bg-blue-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-20 right-40 w-28 h-28 bg-indigo-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
        
        <div class="container mx-auto px-4 relative z-10">
            <h1 class="text-4xl md:text-5xl font-bold mb-4 animate-fade-in">Encuentra tu propiedad ideal</h1>
            <p class="text-xl md:text-2xl mb-8 max-w-2xl animate-slide-up">Explora nuestra selección exclusiva de propiedades y encuentra el hogar de tus sueños.</p>
            
            <!-- Filtros de búsqueda -->
            <div class="bg-white rounded-xl shadow-lg p-6 max-w-4xl animate-slide-up" style="animation-delay: 0.2s;">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="relative">
                        <label class="block text-gray-700 text-sm font-medium mb-2">Tipo de propiedad</label>
                        <select class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                            <option selected>Todas las propiedades</option>
                            <option>Casa</option>
                            <option>Apartamento</option>
                            <option>Terreno</option>
                            <option>Local comercial</option>
                        </select>
                    </div>
                    
                    <div class="relative">
                        <label class="block text-gray-700 text-sm font-medium mb-2">Ubicación</label>
                        <select class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                            <option selected>Todas las ubicaciones</option>
                            <option>San Salvador</option>
                            <option>Santa Ana</option>
                            <option>San Miguel</option>
                            <option>La Libertad</option>
                        </select>
                    </div>
                    
                    <div class="relative">
                        <label class="block text-gray-700 text-sm font-medium mb-2">Precio máximo</label>
                        <select class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                            <option selected>Sin límite</option>
                            <option>$50,000</option>
                            <option>$100,000</option>
                            <option>$200,000</option>
                            <option>$500,000</option>
                        </select>
                    </div>
                    
                    <div class="flex items-end">
                        <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 px-4 rounded-lg transition-colors duration-300 transform hover:scale-105 flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            Buscar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Sección de filtros y vista -->
    <section class="py-8 container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center mb-8">
            <!-- Filtros rápidos -->
            <div class="flex flex-wrap gap-2 mb-4 md:mb-0">
                <button class="px-4 py-2 rounded-full bg-blue-600 text-white font-medium transition-all duration-300 hover:shadow-md">Todas</button>
                <button class="px-4 py-2 rounded-full bg-gray-200 text-gray-700 font-medium transition-all duration-300 hover:bg-blue-600 hover:text-white hover:shadow-md">Venta</button>
                <button class="px-4 py-2 rounded-full bg-gray-200 text-gray-700 font-medium transition-all duration-300 hover:bg-blue-600 hover:text-white hover:shadow-md">Alquiler</button>
                <button class="px-4 py-2 rounded-full bg-gray-200 text-gray-700 font-medium transition-all duration-300 hover:bg-blue-600 hover:text-white hover:shadow-md">Nuevas</button>
            </div>
            
            <!-- Toggle de vista -->
            <div class="flex items-center space-x-4">
                <span class="text-gray-700">Vista:</span>
                <div class="flex space-x-2">
                    <button id="gridViewBtn" class="p-2 rounded-lg bg-blue-600 text-white transition-colors duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                        </svg>
                    </button>
                    <button id="mapViewBtn" class="p-2 rounded-lg bg-gray-200 text-gray-700 transition-colors duration-300 hover:bg-blue-600 hover:text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Vista de cuadrícula (visible por defecto) -->
        <div id="gridView" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <!-- Propiedad 1 -->
            <div class="property-card bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-500 animate-fade-in" style="animation-delay: 0.1s;">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1475&q=80" alt="Casa moderna" class="w-full h-56 object-cover transition-transform duration-500 hover:scale-110">
                    <div class="absolute top-4 left-4 bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full">Venta</div>
                    <div class="absolute top-4 right-4 bg-white rounded-full p-2 cursor-pointer transform transition-transform hover:scale-110">
                        <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Casa moderna en San Salvador</h3>
                    <p class="text-gray-600 mb-4 line-clamp-2">Hermosa casa con diseño moderno, amplios espacios y acabados de lujo en zona exclusiva.</p>
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-2xl font-bold text-blue-600">$245,000</span>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <span class="text-gray-600 ml-1">4.9</span>
                        </div>
                    </div>
                    <div class="flex justify-between text-gray-600 border-t pt-4">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-1 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                            <span>110 m²</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-1 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            <span>2</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-1 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span>2</span>
                        </div>
                    </div>
                </div>
                <div class="px-5 pb-5">
                    <a href="propiedad-detalle.html" class="block w-full py-3 px-4 bg-blue-600 hover:bg-blue-700 text-white font-medium text-center rounded-lg transition-colors duration-300 transform hover:scale-105">Ver detalles</a>
                </div>
            </div>
        </div>
        
        <!-- Vista de mapa (oculta por defecto) -->
        <div id="mapView" class="hidden">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden animate-fade-in">
                <div class="h-[600px] relative">
                    <!-- Aquí iría el mapa interactivo con la API de Google Maps o similar -->
                    <div class="absolute inset-0 bg-gray-200 flex items-center justify-center">
                        <div class="text-center p-8">
                            <svg class="w-16 h-16 text-blue-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                            </svg>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Mapa interactivo</h3>
                            <p class="text-gray-600 mb-6">Explora las propiedades disponibles en el mapa</p>
                            <button id="loadMapBtn" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-300 transform hover:scale-105">
                                Cargar mapa
                            </button>
                        </div>
                    </div>
                    
                    <!-- Marcadores de propiedades (se mostrarían sobre el mapa) -->
                    <div class="hidden">
                        <div class="map-marker absolute top-1/4 left-1/3 cursor-pointer">
                            <div class="relative">
                                <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold shadow-lg">
                                    $245k
                                </div>
                                <div class="w-4 h-4 bg-blue-600 absolute -bottom-2 left-1/2 transform -translate-x-1/2 rotate-45"></div>
                            </div>
                        </div>
                        
                        <div class="map-marker absolute top-1/3 right-1/4 cursor-pointer">
                            <div class="relative">
                                <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center text-white font-bold shadow-lg">
                                    $1.2k
                                </div>
                                <div class="w-4 h-4 bg-green-600 absolute -bottom-2 left-1/2 transform -translate-x-1/2 rotate-45"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de paginación -->
    <section class="py-8 container mx-auto px-4">
        <div class="flex justify-center">
            <nav class="inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                <a href="#" class="relative inline-flex items-center px-4 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-blue-600 text-sm font-medium text-white hover:bg-blue-700 transition-colors duration-300">1</a>
                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-300">2</a>
                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-300">3</a>
                <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">...</span>
                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-300">8</a>
                <a href="#" class="relative inline-flex items-center px-4 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </nav>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-2xl font-bold mb-4">ENCASA</h3>
                    <p class="text-gray-400 mb-4">Tu mejor opción para encontrar el hogar de tus sueños. Ofrecemos las mejores propiedades con atención personalizada.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"></path>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2C6.477 2 2 6.477 2 12c0 5.523 4.477 10 10 10s10-4.477 10-10c0-5.523-4.477-10-10-10zm5.23 7.53l-5.55 5.55c-.14.14-.33.22-.53.22s-.39-.08-.53-.22l-2.45-2.45c-.29-.29-.29-.77 0-1.06.29-.29.77-.29 1.06 0l1.92 1.92 5.02-5.02c.29-.29.77-.29 1.06 0 .29.29.29.76 0 1.06z"></path>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Enlaces rápidos</h4>
                    <ul class="space-y-2">
                        <li><a href="index.html" class="text-gray-400 hover:text-white transition-colors duration-300">Inicio</a></li>
                        <li><a href="propiedades.html" class="text-gray-400 hover:text-white transition-colors duration-300">Propiedades</a></li>
                        <li><a href="nosotros.html" class="text-gray-400 hover:text-white transition-colors duration-300">Nosotros</a></li>
                        <li><a href="contacto.html" class="text-gray-400 hover:text-white transition-colors duration-300">Contacto</a></li>
                        <li><a href="ser-agente.html" class="text-gray-400 hover:text-white transition-colors duration-300">¿Quieres ser agente?</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Servicios</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Compra de propiedades</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Venta de propiedades</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Alquiler de propiedades</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Asesoría legal</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Financiamiento</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Contacto</h4>
                    <ul class="space-y-2">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-blue-500 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="text-gray-400">Av. Principal #123, San Salvador</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-blue-500 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span class="text-gray-400">+503 2222-3333</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-blue-500 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span class="text-gray-400">info@encasa.com</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2023 ENCASA Bienes Raíces. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>
@endsection