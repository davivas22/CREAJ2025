<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ENCASA - Tu mejor solución para el hogar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  
   

   
    @vite(['resources/css/app.css', 'resources/js/page/index.js'])
    <style>
        .parallax-scroll {
            transition: transform 0.5s cubic-bezier(0.33, 1, 0.68, 1);
            will-change: transform;
        }

        .gradient-shine {
            position: relative;
            overflow: hidden;
        }

        .gradient-shine::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                45deg,
                transparent,
                rgba(255, 255, 255, 0.1),
                transparent
            );
            transform: translateX(-100%);
            animation: shine 3s infinite;
        }

        @keyframes shine {
            100% {
                transform: translateX(100%);
            }
        }

        .scale-hover {
            transition: transform 0.3s ease;
        }

        .scale-hover:hover {
            transform: scale(1.05);
        }
    </style>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 1s ease-in-out',
                        'slide-up': 'slideUp 0.5s ease-out',
                        'pulse-slow': 'pulse 3s infinite',
                        'float': 'float 3s ease-in-out infinite',
                        'scale': 'scale 0.3s ease-in-out',
                        'bounce-custom': 'bounce 1s infinite',
                        'spin-slow': 'spin 8s linear infinite',
                        'wiggle': 'wiggle 1s ease-in-out infinite'
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(20px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        float: {
                            '0%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' },
                            '100%': { transform: 'translateY(0px)' },
                        },
                        scale: {
                            '0%': { transform: 'scale(1)' },
                            '100%': { transform: 'scale(1.05)' },
                        },
                        wiggle: {
                            '0%, 100%': { transform: 'rotate(-3deg)' },
                            '50%': { transform: 'rotate(3deg)' },
                        }
                    },
                    transitionProperty: {
                        'height': 'height',
                        'spacing': 'margin, padding',
                    }
                },
            },
        }
    </script>

       @vite(['resources/css/app.css', 'resources/js/page/index.js'])
</head>
<body class="min-h-screen bg-[#F4F4F4]">
    <!-- Navegación -->
    <header class="bg-[#F4F4F4] shadow-sm fixed w-full z-50 transition-all duration-300" id="navbar">
        <div class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <div class="flex items-center">
                    <h1 class="text-2xl font-bold text-[#5E5E5E] hover:scale-105 transition-transform duration-300">ENCASA</h1>
                    <p class="text-xs text-[#BA9D79] ml-2">Tu mejor solución para el hogar</p>
                </div>
                
                <!-- Menú de navegación -->
                <nav class="hidden md:flex space-x-8">
                    <a href="{{route('home')}}" class="text-black font-medium relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 after:bg-[#BA9D79] hover:after:w-full after:transition-all after:duration-300">Home</a>
                    <a href="/about" class="text-black font-medium  hover:text-[#BA9D79] relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 after:bg-[#BA9D79] hover:after:w-full after:transition-all after:duration-300">Acerca de</a>
                    <a href="{{route('page.propiedades')}}" class="text-black font-medium  hover:text-[#BA9D79] relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 after:bg-[#BA9D79] hover:after:w-full after:transition-all after:duration-300">Propiedades</a>
                    <a href="{{route('contacto')}}" class="text-black font-medium  hover:text-[#BA9D79] relative after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 after:bg-[#BA9D79] hover:after:w-full after:transition-all after:duration-300">Contacto</a>
                    @if($favoritosCount > 0)
                        <a href="{{ route('favoritos.index') }}" class="flex items-center gap-1 text-gray-700 hover:text-red-600">
                            <!-- Ícono corazón -->
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                class="w-6 h-6 text-red-600" 
                                viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 
                                        2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 
                                        4.5 2.09C13.09 3.81 14.76 3 16.5 
                                        3 19.58 3 22 5.42 22 8.5c0 
                                        3.78-3.4 6.86-8.55 11.54L12 
                                        21.35z"/>
                            </svg>

                            <!-- Número de favoritos -->
                            <span class="font-medium">({{ $favoritosCount }})</span>
                        </a>
                    @endif


                </nav>
                @guest
                        <!-- Botón de inicio de sesión -->
                <a href="{{route('login')}}" class="hidden md:block px-4 py-2 border border-[#BA9D79] text-[#BA9D79] rounded-full hover:bg-[#BA9D79] hover:text-[#F4F4F4] transition-all duration-300 hover:shadow-lg">
                    Iniciar sesión
                </a>
                
                @endguest
                
                @auth
                      <!-- Avatar y Menú -->
                <div class="relative inline-block text-left" id="user-menu">
                    <!-- Botón del avatar -->
                   <button onclick="toggleMenu()" class="flex items-center justify-center w-10 h-10 rounded-full bg-black text-white font-bold focus:outline-none overflow-hidden">
                        <img src="{{ auth()->user()->foto_perfil ? asset(auth()->user()->foto_perfil) : asset('photos/6c55d49dd6839b5b79e84a1aa6d2260d.jpg') }}" alt="Foto perfil"
                            class="w-full h-full object-cover rounded-full">
                    </button>

                    <!-- Menú desplegable -->
                    <div id="dropdownMenu" class="origin-top-right absolute right-0 mt-2 w-48 rounded-lg shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden z-50">
                        <div class="py-1 text-sm text-gray-800">
                            <a href="{{route('page.perfil', auth()->user()->id)}}" class="block px-4 py-2 hover:bg-[#BA9D79] hover:text-white transition">Perfil</a>
                            <a href="{{route('page.solicitud')}}" class="block px-4 py-2 hover:bg-[#BA9D79] hover:text-white transition">Convertirse en agente</a>
                            <a href="{{route('favoritos.index')}}" class="block px-4 py-2 hover:bg-[#BA9D79] hover:text-white transition">Favoritos</a>
                            <a href="#" onclick="document.getElementById('logout-form').submit()" class="block px-4 py-2 hover:bg-[#BA9D79] hover:text-white transition">Cerrar sesión</a>
                             
                        </div>
                    </div>

                    <!-- Formulario logout -->
                    <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
                        @csrf
                    </form>
                </div>
                @endauth
                  
                
                
                <!-- Menú móvil -->
                <button class="md:hidden text-[#5E5E5E] focus:outline-none" id="menuButton">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Menú móvil desplegable -->
            <div class="md:hidden hidden mt-4 pb-4" id="mobileMenu">
                <a href="#" class="block py-2 text-[#5E5E5E] font-medium">Home</a>
                <a href="#" class="block py-2 text-[#5E5E5E] hover:text-[#BA9D79]">Acerca de</a>
                <a href="{{route('page.propiedades')}}" class="block py-2 text-[#5E5E5E] hover:text-[#BA9D79]">Propiedades</a>
                <a href="#" class="block py-2 text-[#5E5E5E] hover:text-[#BA9D79]">Contacto</a>
                <a href="{{route('login')}}" class="block py-2 mt-2 text-center border border-[#BA9D79] text-[#BA9D79] rounded-full hover:bg-[#BA9D79] hover:text-[#F4F4F4] transition-all duration-300">Iniciar sesión</a>
               

            </div>
        </div>
    </header>

     {{-- CONTENIDO DE CADA PÁGINA --}}
    <main class=" pt-10">
        @yield('content')
        
    </main>

     <!-- Footer -->
    <footer class="bg-gray-900 text-white py-16 mt-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <!-- Company Info -->
                <div class="animate-slide-up">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-10 h-10 bg-gradient-to-br from-encasa-primary to-encasa-dark rounded-lg flex items-center justify-center animate-glow">
                            <i class="fas fa-home text-white text-lg"></i>
                        </div>
                        <span class="text-2xl font-bold bg-gradient-to-r from-encasa-light to-white bg-clip-text text-transparent">ENCASA</span>
                    </div>
                    <p class="text-gray-400 leading-relaxed mb-4">
                        Tu socio confiable en el mundo inmobiliario. Hacemos realidad el sueño de tu hogar propio.
                    </p>
                    <div class="flex space-x-4">
                        <div class="w-10 h-10 bg-encasa-dark rounded-full flex items-center justify-center hover:bg-encasa-darker transition-colors cursor-pointer">
                            <i class="fab fa-facebook-f text-white"></i>
                        </div>
                        <div class="w-10 h-10 bg-pink-600 rounded-full flex items-center justify-center hover:bg-pink-700 transition-colors cursor-pointer animate-float" style="animation-delay: 0.5s">
                            <i class="fab fa-instagram text-white"></i>
                        </div>
                        <div class="w-10 h-10 bg-encasa-secondary rounded-full flex items-center justify-center hover:bg-encasa-dark transition-colors cursor-pointer">
                            <i class="fab fa-linkedin-in text-white"></i>
                        </div>
                        <div class="w-10 h-10 bg-encasa-primary rounded-full flex items-center justify-center hover:bg-encasa-dark transition-colors cursor-pointer animate-float" style="animation-delay: 1.5s">
                            <i class="fab fa-whatsapp text-white"></i>
                        </div>
                    </div>
                </div>
                
                <!-- Services -->
                <div class="animate-slide-up" style="animation-delay: 0.2s">
                    <h3 class="text-lg font-bold mb-6 text-encasa-light">Servicios</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors flex items-center"><i class="fas fa-chevron-right mr-2 text-encasa-primary"></i>Venta de Propiedades</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors flex items-center"><i class="fas fa-chevron-right mr-2 text-encasa-primary"></i>Alquiler</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors flex items-center"><i class="fas fa-chevron-right mr-2 text-encasa-primary"></i>Gestión Integral</a></li>
             
                    </ul>
                </div>
                
                <!-- Quick Links -->
                <div class="animate-slide-up" style="animation-delay: 0.4s">
                    <h3 class="text-lg font-bold mb-6 text-encasa-light">Enlaces Rápidos</h3>
                    <ul class="space-y-3">
                        <li><a href="{{route('register')}}" class="text-gray-400 hover:text-white transition-colors flex items-center"><i class="fas fa-chevron-right mr-2 text-encasa-primary"></i>Registro</a></li>
                        <li><a href="{{route('about')}}" class="text-gray-400 hover:text-white transition-colors flex items-center"><i class="fas fa-chevron-right mr-2 text-encasa-primary"></i>Acerca de</a></li>
                        <li><a href="{{route('page.propiedades')}}" class="text-gray-400 hover:text-white transition-colors flex items-center"><i class="fas fa-chevron-right mr-2 text-encasa-primary"></i>Propiedades</a></li>
                        <li><a href="{{route('contacto')}}" class="text-gray-400 hover:text-white transition-colors flex items-center"><i class="fas fa-chevron-right mr-2 text-encasa-primary"></i>Contacto</a></li>
                        
                    </ul>
                </div>
                
                <!-- Contact Info -->
                <div class="animate-slide-up" style="animation-delay: 0.6s">
                    <h3 class="text-lg font-bold mb-6 text-encasa-light">Contacto</h3>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <i class="fas fa-map-marker-alt text-encasa-primary mt-1 mr-3"></i>
                            <div>
                                <p class="text-gray-400">Col. Escalón</p>
                                <p class="text-gray-400">San Salvador, El Salvador</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-phone text-encasa-primary mr-3"></i>
                            <p class="text-gray-400">+503 2234-5678</p>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-envelope text-encasa-primary mr-3"></i>
                            <p class="text-gray-400">info@encasa.com.sv</p>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-clock text-encasa-primary mr-3"></i>
                            <p class="text-gray-400">Lun - Vie: 8:00 AM - 6:00 PM</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Bottom Footer -->
            <div class="border-t border-gray-800 pt-8 mt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400 mb-4 md:mb-0">
                        © 2025 ENCASA. Todos los derechos reservados.
                    </p>
                    
                </div>
            </div>
        </div>
    </footer>

    <script>
    function toggleMenu() {
        const menu = document.getElementById('dropdownMenu');
        menu.classList.toggle('hidden');
        document.addEventListener('click', function (e) {
            const dropdown = document.getElementById('user-menu');
            if (!dropdown.contains(e.target)) {
                menu.classList.add('hidden');
            }
        });
    }
   </script>

</body>
</html>