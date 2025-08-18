
    @extends('layout.app')
    @vite(['resources/css/app.css', 'resources/js/page/index.js'])

    @section('content')

<style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');
        
        * {
            font-family: 'Inter', sans-serif;
        }
        
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes slide-up {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        @keyframes pulse-slow {
            0%, 100% { opacity: 0.1; }
            50% { opacity: 0.3; }
        }
        @keyframes gradient-shift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        @keyframes scale-pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        @keyframes animate-gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        @keyframes scale-x {
            from { transform: scaleX(0); }
            to { transform: scaleX(1); }
        }
        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }
        @keyframes glow {
            0%, 100% { box-shadow: 0 0 5px rgba(186, 157, 121, 0.3); }
            50% { box-shadow: 0 0 20px rgba(186, 157, 121, 0.6), 0 0 30px rgba(227, 205, 174, 0.4); }
        }
        @keyframes breathe {
            0%, 100% { transform: scale(1) rotate(0deg); }
            50% { transform: scale(1.1) rotate(2deg); }
        }
        @keyframes wave {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        @keyframes sparkle {
            0%, 100% { opacity: 0; transform: scale(0); }
            50% { opacity: 1; transform: scale(1); }
        }
        .animate-gradient {
            animation: animate-gradient 3s ease infinite;
        }
        .animate-shimmer {
            animation: shimmer 2s infinite;
        }
        .animate-glow {
            animation: glow 2s ease-in-out infinite;
        }
        .animate-breathe {
            animation: breathe 4s ease-in-out infinite;
        }
        .animate-wave {
            animation: wave 3s ease-in-out infinite;
        }
        .animate-sparkle {
            animation: sparkle 2s ease-in-out infinite;
        }
        
        .animate-fade-in { animation: fade-in 1s ease-out; }
        .animate-slide-up { animation: slide-up 1s ease-out 0.3s both; }
        .animate-float { animation: float 3s ease-in-out infinite; }
        .animate-pulse-slow { animation: pulse-slow 4s ease-in-out infinite; }
        .animate-gradient { animation: gradient-shift 6s ease infinite; }
        .animate-rotate { animation: rotate 20s linear infinite; }
        .animate-scale-pulse { animation: scale-pulse 3s ease-in-out infinite; }
        
        .gradient-bg {
            background: linear-gradient(-45deg, #F4F4F4, #E3CDAE, #BA9D79, #F4F4F4);
            background-size: 400% 400%;
        }
        
        .gradient-text {
            background: linear-gradient(45deg, #BA9D79, #E3CDAE, #5E5E5E);
            background-size: 200% 200%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .hover-lift {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .hover-lift:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        
        .parallax {
            transform: translateZ(0);
            will-change: transform;
        }
        
        .slider-indicator.active {
            background-opacity: 1;
        }
        
        .custom-scrollbar::-webkit-scrollbar {
            width: 8px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #BA9D79;
            border-radius: 4px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #E3CDAE;
        }
        
        /* Estilos para botones interactivos del slider */
        .hero-slide {
            transition: opacity 0.5s ease-in-out;
        }
        
        .slide-indicator {
            transition: all 0.3s ease;
        }
        
        .slide-indicator.active {
            background-color: rgba(255, 255, 255, 0.9) !important;
            transform: scale(1.2) !important;
        }
        

    </style>
</head>
<body class="bg-white custom-scrollbar">
   

    <!-- Hero Section Premium con Slider -->
    <section class="relative h-screen overflow-hidden">
        <!-- Sistema de partículas ultra avanzado -->
        <div class="absolute inset-0 z-0 overflow-hidden">
            <!-- Partículas grandes premium -->
            <div class="absolute top-20 left-10 w-40 h-40 bg-gradient-to-br from-[#BA9D79]/25 to-[#E3CDAE]/15 rounded-full animate-float blur-sm opacity-80"></div>
            <div class="absolute bottom-20 right-10 w-32 h-32 bg-gradient-to-tl from-[#E3CDAE]/30 to-[#BA9D79]/20 rounded-full animate-float blur-sm opacity-70" style="animation-delay: 1s;"></div>
            <div class="absolute top-1/2 left-1/4 w-24 h-24 bg-gradient-to-r from-[#5E5E5E]/15 to-[#BA9D79]/15 rounded-full animate-rotate blur-sm opacity-60"></div>
            <div class="absolute top-10 right-1/3 w-28 h-28 bg-gradient-to-bl from-[#BA9D79]/20 to-[#E3CDAE]/10 rounded-full animate-breathe blur-md opacity-50" style="animation-delay: 2.5s;"></div>
            
            <!-- Partículas medianas mejoradas -->
            <div class="absolute top-1/3 right-1/4 w-16 h-16 bg-[#BA9D79]/20 rounded-full animate-pulse-slow opacity-70"></div>
            <div class="absolute bottom-1/3 left-1/3 w-20 h-20 bg-[#E3CDAE]/25 rounded-full animate-float opacity-60" style="animation-delay: 2s;"></div>
            <div class="absolute top-3/4 right-1/3 w-12 h-12 bg-[#5E5E5E]/15 rounded-full animate-scale-pulse opacity-50" style="animation-delay: 1.5s;"></div>
            <div class="absolute bottom-1/4 left-1/5 w-14 h-14 bg-gradient-to-r from-[#E3CDAE]/20 to-[#BA9D79]/15 rounded-full animate-glow opacity-40" style="animation-delay: 3s;"></div>
            
            <!-- Partículas pequeñas con sparkle -->
            <div class="absolute top-10 right-20 w-3 h-3 bg-[#BA9D79] rounded-full animate-sparkle opacity-80"></div>
            <div class="absolute top-32 left-20 w-2 h-2 bg-[#E3CDAE] rounded-full animate-sparkle opacity-60" style="animation-delay: 0.5s;"></div>
            <div class="absolute bottom-32 right-32 w-4 h-4 bg-[#BA9D79] rounded-full animate-sparkle opacity-70" style="animation-delay: 1s;"></div>
            <div class="absolute bottom-10 left-32 w-2 h-2 bg-[#E3CDAE] rounded-full animate-sparkle opacity-50" style="animation-delay: 1.5s;"></div>
            <div class="absolute top-1/2 right-10 w-3 h-3 bg-[#5E5E5E] rounded-full animate-sparkle opacity-60" style="animation-delay: 2s;"></div>
            <div class="absolute top-16 left-1/3 w-1.5 h-1.5 bg-white rounded-full animate-sparkle opacity-90" style="animation-delay: 0.8s;"></div>
            <div class="absolute bottom-16 right-1/5 w-2.5 h-2.5 bg-[#BA9D79] rounded-full animate-sparkle opacity-70" style="animation-delay: 2.2s;"></div>
            <div class="absolute top-2/3 left-1/6 w-1 h-1 bg-[#E3CDAE] rounded-full animate-sparkle opacity-80" style="animation-delay: 1.8s;"></div>
            
            <!-- Líneas decorativas animadas -->
            <div class="absolute top-0 left-1/4 w-px h-32 bg-gradient-to-b from-[#BA9D79]/40 to-transparent animate-wave opacity-60"></div>
            <div class="absolute bottom-0 right-1/3 w-px h-24 bg-gradient-to-t from-[#E3CDAE]/50 to-transparent animate-wave opacity-50" style="animation-delay: 1s;"></div>
            <div class="absolute top-1/3 left-0 w-20 h-px bg-gradient-to-r from-transparent to-[#BA9D79]/30 animate-shimmer opacity-40" style="animation-delay: 2s;"></div>
            <div class="absolute bottom-1/4 right-0 w-16 h-px bg-gradient-to-l from-transparent to-[#E3CDAE]/35 animate-shimmer opacity-30" style="animation-delay: 3s;"></div>
            
            <!-- Formas geométricas premium -->
            <div class="absolute top-20 right-1/4 w-8 h-8 border border-[#BA9D79]/30 rotate-45 animate-rotate opacity-50" style="animation-duration: 15s;"></div>
            <div class="absolute bottom-20 left-1/4 w-6 h-6 border border-[#E3CDAE]/40 rotate-12 animate-float opacity-40"></div>
            <div class="absolute top-1/4 right-1/6 w-10 h-10 border-2 border-[#BA9D79]/20 rounded-full animate-breathe opacity-30" style="animation-delay: 1.5s;"></div>
            <div class="absolute bottom-1/3 left-1/8 w-4 h-4 bg-[#E3CDAE]/25 transform rotate-45 animate-glow opacity-50" style="animation-delay: 2.8s;"></div>
            
            <!-- Efectos de luz adicionales -->
            <div class="absolute top-1/5 left-1/2 w-32 h-1 bg-gradient-to-r from-transparent via-[#BA9D79]/20 to-transparent animate-shimmer opacity-30" style="animation-delay: 4s;"></div>
            <div class="absolute bottom-1/5 right-1/2 w-24 h-1 bg-gradient-to-l from-transparent via-[#E3CDAE]/25 to-transparent animate-shimmer opacity-25" style="animation-delay: 5s;"></div>
        </div>
        
        <!-- Overlay con gradiente dinámico -->
        <div class="absolute inset-0 bg-gradient-to-br from-black/20 via-transparent to-black/30 z-10"></div>
        
        <div class="relative h-full overflow-hidden" id="heroSlider">
            <!-- Slide 1 -->
            <div class="absolute inset-0 w-full h-full transition-all duration-1000 ease-in-out opacity-100 bg-cover bg-center parallax" 
                style="background-image: url('https://images.unsplash.com/photo-1586023492125-27b2c045efd7?ixlib=rb-4.0.3&auto=format&fit=crop&w=2158&q=80')" 
                data-slide="0">
                <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/40 to-transparent"></div>
                <div class="absolute inset-0 flex flex-col justify-center items-start px-4 md:px-16">
                    <div class="max-w-3xl" data-aos="fade-right" data-aos-duration="1000">
                        <!-- Título principal mejorado -->
                        <div class="relative mb-8">
                            <h1 class="text-6xl md:text-8xl font-black text-white mb-4 leading-none tracking-tight">
                                <span class="relative inline-block">
                                    SANTA TECLA
                                    <div class="absolute -bottom-2 left-0 w-full h-1 bg-gradient-to-r from-[#BA9D79] to-[#E3CDAE] transform scale-x-0 animate-[scale-x_1s_ease-out_0.5s_forwards]"></div>
                                </span>
                            </h1>
                            <h2 class="text-5xl md:text-7xl font-black mb-4 leading-none">
                                <span class="bg-gradient-to-r from-[#E3CDAE] via-white to-[#BA9D79] bg-clip-text text-transparent animate-gradient bg-[length:200%_100%]">RESIDENCIAL</span>
                            </h2>
                            <div class="flex items-center space-x-4 mb-6">
                                <h3 class="text-4xl md:text-6xl font-light text-white/90">ESTILO</h3>
                                <div class="w-16 h-px bg-gradient-to-r from-[#BA9D79] to-transparent"></div>
                            </div>
                            <h4 class="text-7xl md:text-9xl font-black bg-gradient-to-r from-[#BA9D79] via-[#E3CDAE] to-white bg-clip-text text-transparent animate-gradient bg-[length:300%_100%] leading-none">
                                CONTEMPORÁNEO
                            </h4>
                        </div>
                        
                        <!-- Descripción mejorada -->
                        <div class="relative mb-10" data-aos="fade-up" data-aos-delay="300">
                            <p class="text-xl md:text-2xl text-white/95 mb-4 max-w-3xl leading-relaxed font-light">
                                Descubre espacios únicos donde el <span class="text-[#E3CDAE] font-semibold">lujo</span> se encuentra con la <span class="text-[#BA9D79] font-semibold">funcionalidad</span> en perfecta armonía.
                            </p>
                            <p class="text-lg text-white/80 max-w-2xl leading-relaxed">
                                Arquitectura vanguardista, acabados premium y ubicación privilegiada en el corazón de Santa Tecla.
                            </p>
                            <div class="absolute -left-4 top-0 w-1 h-full bg-gradient-to-b from-[#BA9D79] to-[#E3CDAE] rounded-full"></div>
                        </div>

                        
                        <!-- Indicadores de características -->
                        <div class="flex items-center space-x-8 mt-12" data-aos="fade-up" data-aos-delay="700">
                            <div class="flex items-center space-x-2 text-white/80">
                                <div class="w-2 h-2 bg-[#BA9D79] rounded-full animate-pulse"></div>
                                <span class="text-sm font-medium">Ubicación Premium</span>
                            </div>
                            <div class="flex items-center space-x-2 text-white/80">
                                <div class="w-2 h-2 bg-[#E3CDAE] rounded-full animate-pulse" style="animation-delay: 0.5s;"></div>
                                <span class="text-sm font-medium">Diseño Exclusivo</span>
                            </div>
                            <div class="flex items-center space-x-2 text-white/80">
                                <div class="w-2 h-2 bg-white rounded-full animate-pulse" style="animation-delay: 1s;"></div>
                                <span class="text-sm font-medium">Acabados de Lujo</span>
                            </div>
                        </div>
                        

                    </div>
                </div>
            </div>
            
            <!-- Slide 2 -->
            <div class="absolute inset-0 w-full h-full transition-all duration-1000 ease-in-out opacity-0 bg-cover bg-center parallax" 
                style="background-image: url('https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80')" 
                data-slide="1">
                <div class="absolute inset-0 bg-gradient-to-l from-black/60 via-black/40 to-transparent"></div>
                <div class="absolute inset-0 flex flex-col justify-center items-end px-4 md:px-16">
                    <div class="max-w-3xl text-right">
                        <h2 class="text-5xl md:text-7xl font-black text-white mb-6 leading-tight">
                            DISEÑO 
                            <span class="block gradient-text bg-gradient-to-l from-white to-[#E3CDAE] bg-clip-text text-transparent">EXCLUSIVO</span>
                        </h2>
                        <h3 class="text-6xl md:text-8xl font-black text-white mb-8">PREMIUM</h3>
                        <p class="text-xl text-white/90 mb-8 max-w-2xl leading-relaxed ml-auto">
                            Cada detalle ha sido cuidadosamente seleccionado para crear experiencias habitacionales extraordinarias.
                        </p>

                        

                    </div>
                </div>
            </div>
            
            <!-- Slide 3 -->
            <div class="absolute inset-0 w-full h-full transition-all duration-1000 ease-in-out opacity-0 bg-cover bg-center parallax" 
                style="background-image: url('https://images.unsplash.com/photo-1616594039964-ae9021a400a0?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80')" 
                data-slide="2">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
                <div class="absolute inset-0 flex flex-col justify-center items-center px-4 md:px-16">
                    <div class="max-w-4xl text-center">
                        <h2 class="text-5xl md:text-7xl font-black text-white mb-6 leading-tight">
                            ESPACIOS 
                            <span class="block gradient-text bg-gradient-to-r from-white via-[#E3CDAE] to-white bg-clip-text text-transparent">MODERNOS</span>
                        </h2>
                        <h3 class="text-6xl md:text-8xl font-black text-white mb-8">ELEGANTES</h3>
                        <p class="text-xl text-white/90 mb-8 max-w-3xl mx-auto leading-relaxed">
                            Donde la arquitectura contemporánea se fusiona con la comodidad y el estilo de vida que mereces.
                        </p>

                        

                    </div>
                </div>
            </div>
            
            <!-- Controles de navegación -->
            <div class="absolute bottom-1/2 left-4 transform translate-y-1/2 z-10">
                <button id="prevSlide" class="p-3 rounded-full glass-effect text-white hover:bg-white/20 transition-all duration-300 focus:outline-none hover-lift">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
            </div>
            
            <div class="absolute bottom-1/2 right-4 transform translate-y-1/2 z-10">
                <button id="nextSlide" class="p-3 rounded-full glass-effect text-white hover:bg-white/20 transition-all duration-300 focus:outline-none hover-lift">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Indicadores de slide -->
            <div class="absolute bottom-8 left-0 right-0 flex justify-center space-x-3 z-10">
                <button data-slide-index="0" class="w-4 h-4 rounded-full bg-white bg-opacity-70 focus:outline-none slider-indicator active transition-all duration-300 hover:scale-110"></button>
                <button data-slide-index="1" class="w-4 h-4 rounded-full bg-white bg-opacity-40 focus:outline-none slider-indicator transition-all duration-300 hover:scale-110"></button>
                <button data-slide-index="2" class="w-4 h-4 rounded-full bg-white bg-opacity-40 focus:outline-none slider-indicator transition-all duration-300 hover:scale-110"></button>
            </div>
        </div>
        
        <!-- Scroll indicator -->
        <div class="absolute bottom-10 left-0 right-0 flex justify-center z-10">
            <div class="text-white text-center animate-float">
                <p class="uppercase text-sm tracking-widest mb-2 font-medium">SCROLL</p>
                <svg class="mx-auto w-6 h-6 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </div>
        </div>
        
        <!-- Social media links -->
        <div class="absolute bottom-10 left-10 flex flex-col space-y-4 z-10">
            <a href="#" class="text-white hover:text-[#E3CDAE] hover:scale-125 transition-all duration-300 p-2 glass-effect rounded-full">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"></path>
                </svg>
            </a>
            <a href="#" class="text-white hover:text-[#E3CDAE] hover:scale-125 transition-all duration-300 p-2 glass-effect rounded-full">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"></path>
                </svg>
            </a>
            <a href="#" class="text-white hover:text-[#E3CDAE] hover:scale-125 transition-all duration-300 p-2 glass-effect rounded-full">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"></path>
                </svg>
            </a>
        </div>
    </section>

    <!-- Búsqueda de propiedades -->
    <section class="py-20 bg-gradient-to-br from-[#F4F4F4] to-white relative overflow-hidden">
        <!-- Elementos decorativos -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-10 right-10 w-40 h-40 bg-[#BA9D79] rounded-full animate-pulse-slow"></div>
            <div class="absolute bottom-10 left-10 w-32 h-32 bg-[#E3CDAE] rounded-full animate-float"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-4xl md:text-5xl font-black mb-6 text-[#5E5E5E] gradient-text">Encuentra tu hogar ideal</h2>
                <p class="text-xl text-[#5E5E5E]/80 mb-8 max-w-3xl mx-auto leading-relaxed">
                    Utiliza nuestros filtros avanzados para encontrar la propiedad perfecta que se adapte a tus necesidades
                </p>
            </div>
            
            <div class="max-w-6xl mx-auto">
                <form class="bg-white rounded-2xl shadow-2xl p-8 hover-lift" data-aos="fade-up" data-aos-delay="200">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-[#5E5E5E] uppercase tracking-wide">Ubicación</label>
                            <select class="w-full p-4 border-2 border-gray-200 rounded-xl focus:border-[#BA9D79] focus:ring-4 focus:ring-[#BA9D79]/20 transition-all duration-300">
                                <option>Seleccionar ubicación</option>
                                <option>Santa Tecla</option>
                                <option>San Salvador</option>
                                <option>Antiguo Cuscatlán</option>
                                <option>Nueva San Salvador</option>
                            </select>
                        </div>
                        
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-[#5E5E5E] uppercase tracking-wide">Tipo</label>
                            <select class="w-full p-4 border-2 border-gray-200 rounded-xl focus:border-[#BA9D79] focus:ring-4 focus:ring-[#BA9D79]/20 transition-all duration-300">
                                <option>Tipo de propiedad</option>
                                <option>Casa</option>
                                <option>Apartamento</option>
                                <option>Condominio</option>
                                <option>Terreno</option>
                                <option>Comercial</option>
                            </select>
                        </div>
                        
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-[#5E5E5E] uppercase tracking-wide">Precio</label>
                            <select class="w-full p-4 border-2 border-gray-200 rounded-xl focus:border-[#BA9D79] focus:ring-4 focus:ring-[#BA9D79]/20 transition-all duration-300">
                                <option>Rango de precio</option>
                                <option>$50,000 - $100,000</option>
                                <option>$100,000 - $200,000</option>
                                <option>$200,000 - $300,000</option>
                                <option>$300,000+</option>
                            </select>
                        </div>
                        
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-[#5E5E5E] uppercase tracking-wide">Habitaciones</label>
                            <select class="w-full p-4 border-2 border-gray-200 rounded-xl focus:border-[#BA9D79] focus:ring-4 focus:ring-[#BA9D79]/20 transition-all duration-300">
                                <option>Cualquier cantidad</option>
                                <option>1 habitación</option>
                                <option>2 habitaciones</option>
                                <option>3 habitaciones</option>
                                <option>4+ habitaciones</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <button type="submit" class="px-8 py-4 bg-[#BA9D79] text-white rounded-xl hover:bg-[#E3CDAE] hover:text-[#5E5E5E] transition-all duration-300 font-semibold hover-lift flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            Buscar Propiedades
                        </button>
                        <button type="button" class="px-8 py-4 border-2 border-[#BA9D79] text-[#BA9D79] rounded-xl hover:bg-[#BA9D79] hover:text-white transition-all duration-300 font-semibold">
                            Búsqueda Avanzada
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    
    <!-- Estadísticas animadas -->
    <section class="py-20 bg-white relative overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center group" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-4xl md:text-5xl font-black text-[#BA9D79] mb-2 group-hover:scale-110 transition-transform duration-300" data-counter="500">0</div>
                    <p class="text-[#5E5E5E] font-semibold">Propiedades Vendidas</p>
                </div>
                <div class="text-center group" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-4xl md:text-5xl font-black text-[#BA9D79] mb-2 group-hover:scale-110 transition-transform duration-300" data-counter="15">0</div>
                    <p class="text-[#5E5E5E] font-semibold">Años de Experiencia</p>
                </div>
                <div class="text-center group" data-aos="fade-up" data-aos-delay="300">
                    <div class="text-4xl md:text-5xl font-black text-[#BA9D79] mb-2 group-hover:scale-110 transition-transform duration-300" data-counter="1200">0</div>
                    <p class="text-[#5E5E5E] font-semibold">Clientes Satisfechos</p>
                </div>
                <div class="text-center group" data-aos="fade-up" data-aos-delay="400">
                    <div class="text-4xl md:text-5xl font-black text-[#BA9D79] mb-2 group-hover:scale-110 transition-transform duration-300" data-counter="98">0</div>
                    <p class="text-[#5E5E5E] font-semibold">% Satisfacción</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Propiedades destacadas -->
    <section id="propiedades" class="py-24 bg-[#F4F4F4] relative overflow-hidden">
        <!-- Elementos decorativos -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-20 left-20 w-64 h-64 bg-[#BA9D79] rounded-full animate-pulse-slow"></div>
            <div class="absolute bottom-20 right-20 w-48 h-48 bg-[#E3CDAE] rounded-full animate-float"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl md:text-5xl font-black mb-6 text-[#5E5E5E] gradient-text">Propiedades destacadas</h2>
                <p class="text-xl text-[#5E5E5E]/80 mb-8 max-w-3xl mx-auto leading-relaxed">
                    Descubre nuestras propiedades más exclusivas seleccionadas especialmente para ti
                </p>
                <div class="flex justify-center space-x-4 mb-12">
                    <button class="px-6 py-3 bg-[#BA9D79] text-white rounded-full hover:bg-[#E3CDAE] hover:text-[#5E5E5E] transition-all duration-300 font-semibold" data-filter="all">Todas</button>
                    <button class="px-6 py-3 border-2 border-[#BA9D79] text-[#BA9D79] rounded-full hover:bg-[#BA9D79] hover:text-white transition-all duration-300 font-semibold" data-filter="sale">Venta</button>
                    <button class="px-6 py-3 border-2 border-[#BA9D79] text-[#BA9D79] rounded-full hover:bg-[#BA9D79] hover:text-white transition-all duration-300 font-semibold" data-filter="rent">Alquiler</button>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                <!-- Propiedad 1 -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:scale-[1.02] group hover-lift" data-aos="fade-up" data-aos-delay="100" data-category="sale">
                    <div class="relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Propiedad 1" class="w-full h-72 object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute top-4 left-4 bg-[#BA9D79] text-white text-sm font-bold px-4 py-2 rounded-full shadow-lg">
                            Venta
                        </div>
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm text-[#5E5E5E] p-2 rounded-full hover:bg-white transition-all duration-300 cursor-pointer">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <div class="bg-white/90 backdrop-blur-sm rounded-lg p-3">
                                <div class="flex items-center space-x-4 text-sm text-[#5E5E5E]">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1 text-[#BA9D79]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                        </svg>
                                        350m²
                                    </span>
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1 text-[#BA9D79]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10v11M20 10v11"></path>
                                        </svg>
                                        4 hab
                                    </span>
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1 text-[#BA9D79]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        3 baños
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3 text-[#5E5E5E] group-hover:text-[#BA9D79] transition-colors duration-300">Casa de lujo en Santa Tecla</h3>
                        <p class="text-[#5E5E5E]/80 mb-4 leading-relaxed">Hermosa casa con acabados de lujo, 4 habitaciones, 3 baños, piscina y jardín amplio en zona exclusiva.</p>
                        <div class="flex justify-between items-center mb-6">
                            <span class="text-3xl font-black text-[#BA9D79]">$450,000</span>
                            <div class="flex items-center space-x-1">
                                <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <span class="text-sm text-[#5E5E5E] font-semibold">4.9</span>
                            </div>
                        </div>
                        <div class="flex space-x-3">
                            <a href="propiedad-detalle.html" class="flex-1 bg-[#BA9D79] text-white py-3 px-4 rounded-xl hover:bg-[#E3CDAE] hover:text-[#5E5E5E] transition-all duration-300 text-center font-semibold hover-lift">
                                Ver detalles
                            </a>
                            <button class="px-4 py-3 border-2 border-[#BA9D79] text-[#BA9D79] rounded-xl hover:bg-[#BA9D79] hover:text-white transition-all duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Propiedad 2 -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:scale-[1.02] group hover-lift" data-aos="fade-up" data-aos-delay="200" data-category="rent">
                    <div class="relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Propiedad 2" class="w-full h-72 object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute top-4 left-4 bg-[#BA9D79] text-white text-sm font-bold px-4 py-2 rounded-full shadow-lg">
                            Alquiler
                        </div>
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm text-[#5E5E5E] p-2 rounded-full hover:bg-white transition-all duration-300 cursor-pointer">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <div class="bg-white/90 backdrop-blur-sm rounded-lg p-3">
                                <div class="flex items-center space-x-4 text-sm text-[#5E5E5E]">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1 text-[#BA9D79]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                        </svg>
                                        120m²
                                    </span>
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1 text-[#BA9D79]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10v11M20 10v11"></path>
                                        </svg>
                                        2 hab
                                    </span>
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1 text-[#BA9D79]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        2 baños
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-3 text-[#5E5E5E] group-hover:text-[#BA9D79] transition-colors duration-300">Apartamento moderno</h3>
                        <p class="text-[#5E5E5E]/80 mb-4 leading-relaxed">Apartamento completamente amueblado en zona exclusiva con todas las comodidades y vista panorámica.</p>
                        <div class="flex justify-between items-center mb-6">
                            <span class="text-3xl font-black text-[#BA9D79]">$1,200<span class="text-lg font-normal">/mes</span></span>
                            <div class="flex items-center space-x-1">
                                <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                                <span class="text-sm text-[#5E5E5E] font-semibold">4.8</span>
                            </div>
                        </div>
                        <div class="flex space-x-3">
                            <a href="propiedad-detalle.html" class="flex-1 bg-[#BA9D79] text-white py-3 px-4 rounded-xl hover:bg-[#E3CDAE] hover:text-[#5E5E5E] transition-all duration-300 text-center font-semibold hover-lift">
                                Ver detalles
                            </a>
                            <button class="px-4 py-3 border-2 border-[#BA9D79] text-[#BA9D79] rounded-xl hover:bg-[#BA9D79] hover:text-white transition-all duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Propiedad 3 -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:scale-[1.02] group hover-lift" data-aos="fade-up" data-aos-delay="300" data-category="sale">
                    <div class="relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" alt="Propiedad 3" class="w-full h-72 object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute top-4 left-4 bg-[#BA9D79] text-white text-sm font-bold px-4 py-2 rounded-full shadow-lg">
                            Venta
                        </div>
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm text-[#5E5E5E] p-2 rounded-full hover:bg-white transition-all duration-300 cursor-pointer">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <div class="bg-white/90 backdrop-blur-sm rounded-lg p-3">
                                <div class="flex items-center space-x-4 text-sm text-[#5E5E5E]">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1 text-[#BA9D79]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                        </svg>
                                        500m²
                                    </span>
                                    <span class="flex items-center">
                                         <svg class="w-4 h-4 mr-1 text-[#BA9D79]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10v11M20 10v11"></path>
                                         </svg>
                                         5 hab
                                     </span>
                                     <span class="flex items-center">
                                         <svg class="w-4 h-4 mr-1 text-[#BA9D79]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                         </svg>
                                         4 baños
                                     </span>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="p-6">
                         <h3 class="text-xl font-bold mb-3 text-[#5E5E5E] group-hover:text-[#BA9D79] transition-colors duration-300">Villa exclusiva con piscina</h3>
                         <p class="text-[#5E5E5E]/80 mb-4 leading-relaxed">Espectacular villa con diseño contemporáneo, 5 habitaciones, piscina infinita y vistas panorámicas.</p>
                         <div class="flex justify-between items-center mb-6">
                             <span class="text-3xl font-black text-[#BA9D79]">$750,000</span>
                             <div class="flex items-center space-x-1">
                                 <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                     <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                 </svg>
                                 <span class="text-sm text-[#5E5E5E] font-semibold">5.0</span>
                             </div>
                         </div>
                         <div class="flex space-x-3">
                             <a href="propiedad-detalle.html" class="flex-1 bg-[#BA9D79] text-white py-3 px-4 rounded-xl hover:bg-[#E3CDAE] hover:text-[#5E5E5E] transition-all duration-300 text-center font-semibold hover-lift">
                                 Ver detalles
                             </a>
                             <button class="px-4 py-3 border-2 border-[#BA9D79] text-[#BA9D79] rounded-xl hover:bg-[#BA9D79] hover:text-white transition-all duration-300">
                                 <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                 </svg>
                             </button>
                         </div>
                     </div>
                 </div>
             </div>
             
             <div class="text-center mt-16" data-aos="fade-up">
                 <a href="propiedades.html" class="inline-flex items-center px-8 py-4 bg-[#BA9D79] text-white rounded-full hover:bg-[#E3CDAE] hover:text-[#5E5E5E] transition-all duration-300 font-semibold hover-lift">
                     Ver todas las propiedades
                     <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                     </svg>
                 </a>
             </div>
         </div>
     </section>

     <!-- Servicios -->
     <section class="py-24 bg-white relative overflow-hidden">
         <div class="absolute inset-0 opacity-5">
             <div class="absolute top-20 left-20 w-64 h-64 bg-[#BA9D79] rounded-full animate-pulse-slow"></div>
             <div class="absolute bottom-20 right-20 w-48 h-48 bg-[#E3CDAE] rounded-full animate-float"></div>
         </div>
         
         <div class="container mx-auto px-4 relative z-10">
             <div class="text-center mb-16" data-aos="fade-up">
                 <h2 class="text-4xl md:text-5xl font-black mb-6 text-[#5E5E5E] gradient-text">Nuestros servicios</h2>
                 <p class="text-xl text-[#5E5E5E]/80 mb-8 max-w-3xl mx-auto leading-relaxed">
                     Ofrecemos una gama completa de servicios inmobiliarios para satisfacer todas tus necesidades
                 </p>
             </div>
             
             <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                 <!-- Servicio 1 -->
                 <div class="bg-gradient-to-br from-white to-[#F4F4F4] rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover-lift group" data-aos="fade-up" data-aos-delay="100">
                     <div class="w-16 h-16 bg-[#BA9D79] rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                         <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                         </svg>
                     </div>
                     <h3 class="text-xl font-bold mb-4 text-[#5E5E5E] group-hover:text-[#BA9D79] transition-colors duration-300">Venta de propiedades</h3>
                     <p class="text-[#5E5E5E]/80 leading-relaxed mb-6">
                         Te ayudamos a vender tu propiedad al mejor precio del mercado con estrategias de marketing efectivas.
                     </p>
                     <a href="#" class="inline-flex items-center text-[#BA9D79] font-semibold hover:text-[#E3CDAE] transition-colors duration-300">
                         Más información
                         <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                         </svg>
                     </a>
                 </div>
                 
                 <!-- Servicio 2 -->
                 <div class="bg-gradient-to-br from-white to-[#F4F4F4] rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover-lift group" data-aos="fade-up" data-aos-delay="200">
                     <div class="w-16 h-16 bg-[#BA9D79] rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                         <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                         </svg>
                     </div>
                     <h3 class="text-xl font-bold mb-4 text-[#5E5E5E] group-hover:text-[#BA9D79] transition-colors duration-300">Búsqueda personalizada</h3>
                     <p class="text-[#5E5E5E]/80 leading-relaxed mb-6">
                         Encontramos la propiedad perfecta según tus necesidades específicas y presupuesto.
                     </p>
                     <a href="#" class="inline-flex items-center text-[#BA9D79] font-semibold hover:text-[#E3CDAE] transition-colors duration-300">
                         Más información
                         <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                         </svg>
                     </a>
                 </div>
                 
                 <!-- Servicio 3 -->
                 <div class="bg-gradient-to-br from-white to-[#F4F4F4] rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover-lift group" data-aos="fade-up" data-aos-delay="300">
                     <div class="w-16 h-16 bg-[#BA9D79] rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                         <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                         </svg>
                     </div>
                     <h3 class="text-xl font-bold mb-4 text-[#5E5E5E] group-hover:text-[#BA9D79] transition-colors duration-300">Asesoría legal</h3>
                     <p class="text-[#5E5E5E]/80 leading-relaxed mb-6">
                         Brindamos asesoría legal completa para garantizar transacciones seguras y transparentes.
                     </p>
                     <a href="#" class="inline-flex items-center text-[#BA9D79] font-semibold hover:text-[#E3CDAE] transition-colors duration-300">
                         Más información
                         <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                         </svg>
                     </a>
                 </div>
                 
                 <!-- Servicio 4 -->
                 <div class="bg-gradient-to-br from-white to-[#F4F4F4] rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover-lift group" data-aos="fade-up" data-aos-delay="400">
                     <div class="w-16 h-16 bg-[#BA9D79] rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                         <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                         </svg>
                     </div>
                     <h3 class="text-xl font-bold mb-4 text-[#5E5E5E] group-hover:text-[#BA9D79] transition-colors duration-300">Financiamiento</h3>
                     <p class="text-[#5E5E5E]/80 leading-relaxed mb-6">
                         Te conectamos con las mejores opciones de financiamiento para hacer realidad tu sueño.
                     </p>
                     <a href="#" class="inline-flex items-center text-[#BA9D79] font-semibold hover:text-[#E3CDAE] transition-colors duration-300">
                         Más información
                         <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                         </svg>
                     </a>
                 </div>
                 
                 <!-- Servicio 5 -->
                 <div class="bg-gradient-to-br from-white to-[#F4F4F4] rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover-lift group" data-aos="fade-up" data-aos-delay="500">
                     <div class="w-16 h-16 bg-[#BA9D79] rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                         <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                         </svg>
                     </div>
                     <h3 class="text-xl font-bold mb-4 text-[#5E5E5E] group-hover:text-[#BA9D79] transition-colors duration-300">Tours virtuales</h3>
                     <p class="text-[#5E5E5E]/80 leading-relaxed mb-6">
                         Explora propiedades desde la comodidad de tu hogar con nuestros tours virtuales 360°.
                     </p>
                     <a href="#" class="inline-flex items-center text-[#BA9D79] font-semibold hover:text-[#E3CDAE] transition-colors duration-300">
                         Más información
                         <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                         </svg>
                     </a>
                 </div>
                 
                 <!-- Servicio 6 -->
                 <div class="bg-gradient-to-br from-white to-[#F4F4F4] rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover-lift group" data-aos="fade-up" data-aos-delay="600">
                     <div class="w-16 h-16 bg-[#BA9D79] rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                         <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                         </svg>
                     </div>
                     <h3 class="text-xl font-bold mb-4 text-[#5E5E5E] group-hover:text-[#BA9D79] transition-colors duration-300">Valuación gratuita</h3>
                     <p class="text-[#5E5E5E]/80 leading-relaxed mb-6">
                         Obtén una valuación profesional y gratuita de tu propiedad con nuestros expertos certificados.
                     </p>
                     <a href="#" class="inline-flex items-center text-[#BA9D79] font-semibold hover:text-[#E3CDAE] transition-colors duration-300">
                         Más información
                         <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                         </svg>
                     </a>
                 </div>
             </div>
         </div>
     </section>

     <!-- Testimonios -->
     <section class="py-24 bg-gradient-to-br from-[#F4F4F4] to-white relative overflow-hidden">
         <div class="absolute inset-0 opacity-5">
             <div class="absolute top-20 left-20 w-64 h-64 bg-[#BA9D79] rounded-full animate-pulse-slow"></div>
             <div class="absolute bottom-20 right-20 w-48 h-48 bg-[#E3CDAE] rounded-full animate-float"></div>
         </div>
         
         <div class="container mx-auto px-4 relative z-10">
             <div class="text-center mb-16" data-aos="fade-up">
                 <h2 class="text-4xl md:text-5xl font-black mb-6 text-[#5E5E5E] gradient-text">Lo que dicen nuestros clientes</h2>
                 <p class="text-xl text-[#5E5E5E]/80 mb-8 max-w-3xl mx-auto leading-relaxed">
                     La satisfacción de nuestros clientes es nuestra mayor recompensa
                 </p>
             </div>
             
             <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                 <!-- Testimonio 1 -->
                 <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover-lift" data-aos="fade-up" data-aos-delay="100">
                     <div class="flex items-center mb-6">
                         <div class="flex text-yellow-400">
                             <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                 <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                             </svg>
                             <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                 <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                             </svg>
                             <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                 <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                             </svg>
                             <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                 <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                             </svg>
                             <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                 <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                             </svg>
                         </div>
                     </div>
                     <p class="text-[#5E5E5E]/80 mb-6 leading-relaxed italic">
                         "Excelente servicio y atención personalizada. Encontraron la casa perfecta para mi familia en tiempo récord. Altamente recomendados."
                     </p>
                     <div class="flex items-center">
                         <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=150&q=80" alt="Cliente" class="w-12 h-12 rounded-full object-cover mr-4">
                         <div>
                             <h4 class="font-semibold text-[#5E5E5E]">Carlos Mendoza</h4>
                             <p class="text-sm text-[#5E5E5E]/60">Cliente satisfecho</p>
                         </div>
                     </div>
                 </div>
                 
                 <!-- Testimonio 2 -->
                 <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover-lift" data-aos="fade-up" data-aos-delay="200">
                     <div class="flex items-center mb-6">
                         <div class="flex text-yellow-400">
                             <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                 <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                             </svg>
                             <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                 <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                             </svg>
                             <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                 <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                             </svg>
                             <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                 <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                             </svg>
                             <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                 <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                             </svg>
                         </div>
                     </div>
                     <p class="text-[#5E5E5E]/80 mb-6 leading-relaxed italic">
                         "Profesionales de primera. Me ayudaron a vender mi propiedad al precio que esperaba. El proceso fue muy transparente."
                     </p>
                     <div class="flex items-center">
                         <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=150&q=80" alt="Cliente" class="w-12 h-12 rounded-full object-cover mr-4">
                         <div>
                             <h4 class="font-semibold text-[#5E5E5E]">María González</h4>
                             <p class="text-sm text-[#5E5E5E]/60">Cliente satisfecha</p>
                         </div>
                     </div>
                 </div>
                 
                 <!-- Testimonio 3 -->
                 <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover-lift" data-aos="fade-up" data-aos-delay="300">
                     <div class="flex items-center mb-6">
                         <div class="flex text-yellow-400">
                             <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                 <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                             </svg>
                             <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                 <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                             </svg>
                             <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                 <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                             </svg>
                             <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                 <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                             </svg>
                             <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                 <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                             </svg>
                         </div>
                     </div>
                     <p class="text-[#5E5E5E]/80 mb-6 leading-relaxed italic">
                         "La mejor experiencia inmobiliaria que he tenido. Muy profesionales y siempre disponibles para resolver dudas."
                     </p>
                     <div class="flex items-center">
                         <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=150&q=80" alt="Cliente" class="w-12 h-12 rounded-full object-cover mr-4">
                         <div>
                             <h4 class="font-semibold text-[#5E5E5E]">Roberto Silva</h4>
                             <p class="text-sm text-[#5E5E5E]/60">Cliente satisfecho</p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>

     <!-- Footer -->
     <footer class="bg-[#5E5E5E] text-white py-16 relative overflow-hidden">
         <div class="absolute inset-0 opacity-10">
             <div class="absolute top-10 right-10 w-32 h-32 bg-[#BA9D79] rounded-full animate-float"></div>
             <div class="absolute bottom-10 left-10 w-24 h-24 bg-[#E3CDAE] rounded-full animate-pulse-slow"></div>
         </div>
         
         <div class="container mx-auto px-4 relative z-10">
             <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                 <!-- Información de la empresa -->
                 <div class="lg:col-span-2">
                     <div class="text-3xl font-bold mb-6">
                         <span class="text-[#BA9D79] gradient-text">EN</span>CASA
                     </div>
                     <p class="text-white/80 mb-6 leading-relaxed max-w-md">
                         Tu socio de confianza en el mundo inmobiliario. Más de 15 años ayudando a familias a encontrar su hogar perfecto en El Salvador.
                     </p>
                     <div class="flex space-x-4">
                         <a href="#" class="w-10 h-10 bg-[#BA9D79] rounded-full flex items-center justify-center hover:bg-[#E3CDAE] transition-colors duration-300">
                             <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                 <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"></path>
                             </svg>
                         </a>
                         <a href="#" class="w-10 h-10 bg-[#BA9D79] rounded-full flex items-center justify-center hover:bg-[#E3CDAE] transition-colors duration-300">
                             <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                 <path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 715.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"></path>
                             </svg>
                         </a>
                         <a href="#" class="w-10 h-10 bg-[#BA9D79] rounded-full flex items-center justify-center hover:bg-[#E3CDAE] transition-colors duration-300">
                             <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                 <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"></path>
                             </svg>
                         </a>
                         <a href="#" class="w-10 h-10 bg-[#BA9D79] rounded-full flex items-center justify-center hover:bg-[#E3CDAE] transition-colors duration-300">
                             <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                 <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"></path>
                             </svg>
                         </a>
                     </div>
                 </div>
                 
                 <!-- Enlaces rápidos -->
                 <div>
                     <h3 class="text-xl font-bold mb-6 text-[#BA9D79]">Enlaces rápidos</h3>
                     <ul class="space-y-3">
                         <li><a href="#" class="text-white/80 hover:text-[#BA9D79] transition-colors duration-300">Inicio</a></li>
                         <li><a href="propiedades.html" class="text-white/80 hover:text-[#BA9D79] transition-colors duration-300">Propiedades</a></li>
                         <li><a href="nosotros.html" class="text-white/80 hover:text-[#BA9D79] transition-colors duration-300">Nosotros</a></li>
                         <li><a href="contacto.html" class="text-white/80 hover:text-[#BA9D79] transition-colors duration-300">Contacto</a></li>
                         <li><a href="#" class="text-white/80 hover:text-[#BA9D79] transition-colors duration-300">Blog</a></li>
                     </ul>
                 </div>
                 
                 <!-- Contacto -->
                 <div>
                     <h3 class="text-xl font-bold mb-6 text-[#BA9D79]">Contacto</h3>
                     <div class="space-y-4">
                         <div class="flex items-center space-x-3">
                             <svg class="w-5 h-5 text-[#BA9D79]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                             </svg>
                             <span class="text-white/80">Santa Tecla, El Salvador</span>
                         </div>
                         <div class="flex items-center space-x-3">
                             <svg class="w-5 h-5 text-[#BA9D79]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                             </svg>
                             <span class="text-white/80">+503 2345-6789</span>
                         </div>
                         <div class="flex items-center space-x-3">
                             <svg class="w-5 h-5 text-[#BA9D79]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                             </svg>
                             <span class="text-white/80">info@encasa.com</span>
                         </div>
                     </div>
                 </div>
             </div>
             
             <div class="border-t border-white/20 pt-8">
                 <div class="flex flex-col md:flex-row justify-between items-center">
                     <p class="text-white/60 mb-4 md:mb-0">
                         © 2024 ENCASA. Todos los derechos reservados.
                     </p>
                     <div class="flex space-x-6">
                         <a href="#" class="text-white/60 hover:text-[#BA9D79] transition-colors duration-300">Política de Privacidad</a>
                         <a href="#" class="text-white/60 hover:text-[#BA9D79] transition-colors duration-300">Términos de Uso</a>
                         <a href="#" class="text-white/60 hover:text-[#BA9D79] transition-colors duration-300">Cookies</a>
                     </div>
                 </div>
             </div>
         </div>
     </footer>

     <!-- Scripts -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
     <script>
         // Inicializar AOS
         AOS.init({
             duration: 1000,
             once: true,
             offset: 100
         });

         // Slider del hero
         let currentSlide = 0;
         const slides = document.querySelectorAll('[data-slide]');
         const indicators = document.querySelectorAll('[data-slide-index]');
         const totalSlides = slides.length;

         function showSlide(index) {
             // Actualizar slides
             slides.forEach((slide, i) => {
                 const slideIndex = parseInt(slide.getAttribute('data-slide'));
                 slide.style.opacity = slideIndex === index ? '1' : '0';
                 slide.style.zIndex = slideIndex === index ? '5' : '1';
             });
             
             // Actualizar indicadores
             indicators.forEach((indicator, i) => {
                 const indicatorIndex = parseInt(indicator.getAttribute('data-slide-index'));
                 indicator.classList.toggle('active', indicatorIndex === index);
                 if (indicatorIndex === index) {
                     indicator.style.backgroundColor = 'rgba(255, 255, 255, 0.9)';
                     indicator.style.transform = 'scale(1.2)';
                 } else {
                     indicator.style.backgroundColor = 'rgba(255, 255, 255, 0.4)';
                     indicator.style.transform = 'scale(1)';
                 }
             });
         }

         function nextSlide() {
             currentSlide = (currentSlide + 1) % totalSlides;
             showSlide(currentSlide);
         }

         function prevSlide() {
             currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
             showSlide(currentSlide);
         }

         // Event listeners para el slider
         document.getElementById('nextSlide').addEventListener('click', nextSlide);
         document.getElementById('prevSlide').addEventListener('click', prevSlide);

         // Indicadores del slider - Corregido para funcionar con todos los botones
         indicators.forEach((indicator) => {
             indicator.addEventListener('click', (e) => {
                 e.preventDefault();
                 const targetIndex = parseInt(indicator.getAttribute('data-slide-index'));
                 currentSlide = targetIndex;
                 showSlide(currentSlide);
             });
         });

         // Inicializar el slider
         showSlide(0);

         // Auto-play del slider
         setInterval(nextSlide, 5000);

         // Animación de contadores
         function animateCounters() {
             const counters = document.querySelectorAll('[data-counter]');
             
             counters.forEach(counter => {
                 const target = parseInt(counter.getAttribute('data-counter'));
                 const duration = 2000;
                 const step = target / (duration / 16);
                 let current = 0;
                 
                 const timer = setInterval(() => {
                     current += step;
                     if (current >= target) {
                         counter.textContent = target;
                         clearInterval(timer);
                     } else {
                         counter.textContent = Math.floor(current);
                     }
                 }, 16);
             });
         }

         // Observador para activar contadores cuando sean visibles
         const counterObserver = new IntersectionObserver((entries) => {
             entries.forEach(entry => {
                 if (entry.isIntersecting) {
                     animateCounters();
                     counterObserver.unobserve(entry.target);
                 }
             });
         });

         const statsSection = document.querySelector('[data-counter]')?.closest('section');
         if (statsSection) {
             counterObserver.observe(statsSection);
         }

         // Navbar scroll effect
         window.addEventListener('scroll', () => {
             const navbar = document.getElementById('navbar');
             if (window.scrollY > 100) {
                 navbar.classList.add('bg-white/95', 'shadow-lg');
                 navbar.classList.remove('bg-white/95');
             } else {
                 navbar.classList.remove('shadow-lg');
                 navbar.classList.add('bg-white/95');
             }
         });

         // Filtros de propiedades
         const filterButtons = document.querySelectorAll('[data-filter]');
         const propertyCards = document.querySelectorAll('[data-category]');

         filterButtons.forEach(button => {
             button.addEventListener('click', () => {
                 const filter = button.getAttribute('data-filter');
                 
                 // Actualizar botones activos
                 filterButtons.forEach(btn => {
                     btn.classList.remove('bg-[#BA9D79]', 'text-white');
                     btn.classList.add('border-2', 'border-[#BA9D79]', 'text-[#BA9D79]');
                 });
                 
                 button.classList.add('bg-[#BA9D79]', 'text-white');
                 button.classList.remove('border-2', 'border-[#BA9D79]', 'text-[#BA9D79]');
                 
                 // Filtrar propiedades
                 propertyCards.forEach(card => {
                     const category = card.getAttribute('data-category');
                     if (filter === 'all' || category === filter) {
                         card.style.display = 'block';
                         card.style.opacity = '1';
                     } else {
                         card.style.opacity = '0';
                         setTimeout(() => {
                             card.style.display = 'none';
                         }, 300);
                     }
                 });
             });
         });

         // Menú móvil
         const mobileMenuBtn = document.getElementById('mobile-menu-btn');
         const mobileMenu = document.getElementById('mobile-menu');

         if (mobileMenuBtn && mobileMenu) {
             mobileMenuBtn.addEventListener('click', () => {
                 mobileMenu.classList.toggle('hidden');
             });
         }

         // Smooth scroll para enlaces internos
         document.querySelectorAll('a[href^="#"]').forEach(anchor => {
             anchor.addEventListener('click', function (e) {
                 e.preventDefault();
                 const target = document.querySelector(this.getAttribute('href'));
                 if (target) {
                     target.scrollIntoView({
                         behavior: 'smooth',
                         block: 'start'
                     });
                 }
             });
         });

         // Parallax effect
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const parallaxElements = document.querySelectorAll('.parallax');
            
            parallaxElements.forEach(element => {
                const speed = 0.5;
                element.style.transform = `translateY(${scrolled * speed}px)`;
            });
        });
        

     </script>

    @endsection
    