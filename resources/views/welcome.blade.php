
    @extends('layout.app')
    @vite(['resources/css/app.css', 'resources/js/page/index.js'])

    @section('content')


    <!-- Hero Section con Slider Mejorado -->
    <section class="relative h-screen">
        <!-- Slider personalizado -->
        <div class="relative  h-5/6 overflow-hidden" id="heroSlider">
            <!-- Slides -->
            <div class="absolute inset-0 w-full h-full transition-opacity duration-1000 ease-in-out opacity-100 bg-cover bg-center" 
                style="background-image: url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80')" 
                data-slide="0">
                <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                <div class="absolute inset-0 flex flex-col justify-center items-start px-4 md:px-16">
                    <div class="max-w-2xl">
                        <h2 class="text-4xl md:text-6xl font-bold text-white mb-4 shadow-sm animate-fade-in">SANTA TECLA <span class="block">RESIDENCIAL</span> <span class="text-3xl md:text-5xl">ESTILO</span></h2>
                        <h3 class="text-5xl md:text-7xl font-bold text-white mb-8 shadow-sm animate-slide-up">CONTEMPORÁNEO</h3>
                        <a href="#" class="inline-flex items-center px-6 py-3 border border-white text-white rounded-full hover:bg-white hover:text-gray-900 transition-all duration-300 hover:shadow-lg">
                            Ver más
                            <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="absolute inset-0 w-full h-full transition-opacity duration-1000 ease-in-out opacity-0 bg-cover bg-center" 
                style="background-image: url('https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80')" 
                data-slide="1">
                <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                <div class="absolute inset-0 flex flex-col justify-center items-start px-4 md:px-16">
                    <div class="max-w-2xl">
                        <h2 class="text-4xl md:text-6xl font-bold text-white mb-4 shadow-sm animate-fade-in">DISEÑO <span class="block">EXCLUSIVO</span></h2>
                        <h3 class="text-5xl md:text-7xl font-bold text-white mb-8 shadow-sm animate-slide-up">PREMIUM</h3>
                        <a href="#" class="inline-flex items-center px-6 py-3 border border-white text-white rounded-full hover:bg-white hover:text-gray-900 transition-all duration-300 hover:shadow-lg">
                            Explorar
                            <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="absolute inset-0 w-full h-full transition-opacity duration-1000 ease-in-out opacity-0 bg-cover bg-center" 
                style="background-image: url('https://images.unsplash.com/photo-1613490493576-7fde63acd811?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80')" 
                data-slide="2">
                <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                <div class="absolute inset-0 flex flex-col justify-center items-start px-4 md:px-16">
                    <div class="max-w-2xl">
                        <h2 class="text-4xl md:text-6xl font-bold text-white mb-4 shadow-sm animate-fade-in">ESPACIOS <span class="block">MODERNOS</span></h2>
                        <h3 class="text-5xl md:text-7xl font-bold text-white mb-8 shadow-sm animate-slide-up">ELEGANTES</h3>
                        <a href="#" class="inline-flex items-center px-6 py-3 border border-white text-white rounded-full hover:bg-white hover:text-gray-900 transition-all duration-300 hover:shadow-lg">
                            Descubrir
                            <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Controles de navegación -->
            <div class="absolute bottom-1/2 left-4 transform translate-y-1/2 z-10">
                <button id="prevSlide" class="p-2 rounded-full bg-white bg-opacity-20 text-white hover:bg-opacity-40 transition-all duration-300 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
            </div>
            
            <div class="absolute bottom-1/2 right-4 transform translate-y-1/2 z-10">
                <button id="nextSlide" class="p-2 rounded-full bg-white bg-opacity-20 text-white hover:bg-opacity-40 transition-all duration-300 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Indicadores de slide -->
            <div class="absolute bottom-8 left-0 right-0 flex justify-center space-x-2 z-10">
                <button data-slide-index="0" class="w-3 h-3 rounded-full bg-white bg-opacity-70 focus:outline-none slider-indicator active"></button>
                <button data-slide-index="1" class="w-3 h-3 rounded-full bg-white bg-opacity-40 focus:outline-none slider-indicator"></button>
                <button data-slide-index="2" class="w-3 h-3 rounded-full bg-white bg-opacity-40 focus:outline-none slider-indicator"></button>
            </div>
        </div>
        
        <!-- Scroll indicator -->
        <div class="absolute bottom-10 left-0 right-0 flex justify-center z-10 translate-y-[-90px]">
            <div class="text-white text-center animate-float">
                <p class="uppercase text-sm tracking-widest mb-2">SCROLL</p>
                <svg class="mx-auto w-6 h-6 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </div>
        </div>
        
        <!-- Social media links -->
        <div class="absolute bottom-10 left-10 flex space-x-4 z-10 translate-y-[-99px]">
            <a href="#" class="text-white hover:text-gray-300 hover:scale-125 transition-all duration-300">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"></path>
                </svg>
            </a>
            <a href="#" class="text-white hover:text-gray-300 hover:scale-125 transition-all duration-300">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"></path>
                </svg>
            </a>
            <a href="#" class="text-white hover:text-gray-300 hover:scale-125 transition-all duration-300">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.995 6.68c-.37.177-.764.3-1.17.357.42-.252.744-.65.898-1.123-.394.234-.83.403-1.294.496-.372-.4-.898-.645-1.482-.645-1.12 0-2.03.912-2.03 2.033 0 .16.018.315.053.465-1.687-.085-3.183-.893-4.185-2.123-.175.3-.275.65-.275 1.02 0 .706.358 1.33.904 1.695-.334-.01-.647-.103-.92-.257v.025c0 .986.7 1.81 1.63 1.996-.17.046-.35.07-.534.07-.13 0-.257-.013-.38-.038.258.81 1.01 1.398 1.9 1.416-.696.546-1.573.87-2.525.87-.164 0-.327-.01-.487-.028.9.577 1.97.915 3.12.915 3.745 0 5.795-3.104 5.795-5.798 0-.088-.002-.176-.006-.262.4-.287.744-.646 1.017-1.054z"></path>
                </svg>
            </a>
            <a href="#" class="text-white hover:text-gray-300 hover:scale-125 transition-all duration-300">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2C6.477 2 2 6.477 2 12c0 4.42 2.865 8.166 6.839 9.489.5.092.682-.217.682-.482 0-.237-.008-.866-.013-1.7-2.782.603-3.369-1.342-3.369-1.342-.454-1.155-1.11-1.462-1.11-1.462-.908-.62.069-.608.069-.608 1.003.07 1.531 1.03 1.531 1.03.892 1.529 2.341 1.087 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.11-4.555-4.943 0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.27.098-2.647 0 0 .84-.269 2.75 1.025A9.578 9.578 0 0112 6.836c.85.004 1.705.114 2.504.336 1.909-1.294 2.747-1.025 2.747-1.025.546 1.377.202 2.394.1 2.647.64.699 1.028 1.592 1.028 2.683 0 3.842-2.339 4.687-4.566 4.933.359.309.678.919.678 1.852 0 1.336-.012 2.415-.012 2.743 0 .267.18.578.688.48C19.138 20.161 22 16.416 22 12c0-5.523-4.477-10-10-10z"></path>
                </svg>
            </a>
        </div>
    </section>
    
    <!-- Sección de búsqueda de propiedades -->
    <section class=" bg-[#F4F4F4]">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-10 text-[#5E5E5E]">Encuentra tu propiedad ideal</h2>
            
            <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 p-6 md:p-8 max-w-4xl mx-auto">
                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="group">
                            <label for="property-type" class="block text-sm font-medium text-[#5E5E5E] mb-1 group-hover:text-[#BA9D79] transition-colors duration-200">Tipo de propiedad</label>
                            <select id="property-type" class="w-full px-4 py-3 border border-[#E3CDAE] rounded-lg focus:ring-2 focus:ring-[#BA9D79] focus:border-[#BA9D79] transition-all duration-200 bg-[#F4F4F4] hover:bg-white">
                                <option value="">Cualquier tipo</option>
                                <option value="house">Casa</option>
                                <option value="apartment">Apartamento</option>
                                <option value="land">Terreno</option>
                                <option value="commercial">Comercial</option>
                            </select>
                        </div>
                        
                        <div class="group">
                            <label for="location" class="block text-sm font-medium text-[#5E5E5E] mb-1 group-hover:text-[#BA9D79] transition-colors duration-200">Ubicación</label>
                            <select id="location" class="w-full px-4 py-3 border border-[#E3CDAE] rounded-lg focus:ring-2 focus:ring-[#BA9D79] focus:border-[#BA9D79] transition-all duration-200 bg-[#F4F4F4] hover:bg-white">
                                <option value="">Cualquier ubicación</option>
                                <option value="santa-tecla">Santa Tecla</option>
                                <option value="san-salvador">San Salvador</option>
                                <option value="la-libertad">La Libertad</option>
                                <option value="antiguo-cuscatlan">Antiguo Cuscatlán</option>
                            </select>
                        </div>
                        
                        <div class="group">
                            <label for="price-range" class="block text-sm font-medium text-[#5E5E5E] mb-1 group-hover:text-[#BA9D79] transition-colors duration-200">Rango de precio</label>
                            <select id="price-range" class="w-full px-4 py-3 border border-[#E3CDAE] rounded-lg focus:ring-2 focus:ring-[#BA9D79] focus:border-[#BA9D79] transition-all duration-200 bg-[#F4F4F4] hover:bg-white">
                                <option value="">Cualquier precio</option>
                                <option value="0-100000">$0 - $100,000</option>
                                <option value="100000-200000">$100,000 - $200,000</option>
                                <option value="200000-300000">$200,000 - $300,000</option>
                                <option value="300000+">$300,000+</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="flex justify-center">
                        <button type="submit" class="px-8 py-3 bg-[#BA9D79] text-white rounded-full hover:bg-[#E3CDAE] hover:text-[#5E5E5E] shadow-md hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            Buscar propiedades
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    
    <!-- Propiedades destacadas -->    
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-4 text-[#5E5E5E]">Propiedades destacadas</h2>
            <p class="text-center text-[#BA9D79] mb-12 max-w-2xl mx-auto">Descubre nuestras propiedades más exclusivas seleccionadas especialmente para ti</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Propiedad 1 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 transform hover:scale-[1.02] group">
                    <div class="relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Propiedad 1" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute top-4 left-4 bg-[#BA9D79] text-white text-sm font-semibold px-3 py-1 rounded-full">
                            Venta
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-[#5E5E5E] group-hover:text-[#BA9D79] transition-colors duration-300">Casa de lujo en Santa Tecla</h3>
                        <p class="text-[#5E5E5E] mb-4">Hermosa casa con acabados de lujo, 4 habitaciones, 3 baños, piscina y jardín amplio.</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-2xl font-bold text-[#BA9D79]">$450,000</span>
                            <div class="flex space-x-3">
                                <span class="flex items-center text-[#5E5E5E] text-sm">
                                    <svg class="w-4 h-4 mr-1 text-[#BA9D79]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                    </svg>
                                    350m²
                                </span>
                                <span class="flex items-center text-[#5E5E5E] text-sm">
                                    <svg class="w-4 h-4 mr-1 text-[#BA9D79]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    4 hab
                                </span>
                                <span class="flex items-center text-[#5E5E5E] text-sm">
                                    <svg class="w-4 h-4 mr-1 text-[#BA9D79]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    3 baños
                                </span>
                            </div>
                        </div>
                        <a href="#" class="inline-flex items-center text-[#BA9D79] hover:text-[#E3CDAE] transition-colors duration-300 font-medium">
                            Ver detalles
                            <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                
                <!-- Propiedad 2 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 transform hover:scale-[1.02] group">
                    <div class="relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Propiedad 2" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute top-4 left-4 bg-[#BA9D79] text-white text-sm font-semibold px-3 py-1 rounded-full">
                            Alquiler
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-[#5E5E5E] group-hover:text-[#BA9D79] transition-colors duration-300">Apartamento moderno en San Salvador</h3>
                        <p class="text-[#5E5E5E] mb-4">Apartamento con vistas panorámicas, 2 habitaciones, 2 baños, gimnasio y seguridad 24/7.</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-2xl font-bold text-[#BA9D79]">$1,200/mes</span>
                            <div class="flex space-x-3">
                                <span class="flex items-center text-gray-600 text-sm">
                                    <svg class="w-4 h-4 mr-1 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                    </svg>
                                    120m²
                                </span>
                                <span class="flex items-center text-gray-600 text-sm">
                                    <svg class="w-4 h-4 mr-1 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    2 hab
                                </span>
                                <span class="flex items-center text-gray-600 text-sm">
                                    <svg class="w-4 h-4 mr-1 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    2 baños
                                </span>
                            </div>
                        </div>
                        <a href="#" class="inline-flex items-center text-blue-600 hover:text-blue-800 transition-colors duration-300 font-medium">
                            Ver detalles
                            <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                
                <!-- Propiedad 3 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 transform hover:scale-[1.02] group">
                    <div class="relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" alt="Propiedad 3" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute top-4 left-4 bg-green-600 text-white text-sm font-semibold px-3 py-1 rounded-full">
                            Nuevo
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-gray-800 group-hover:text-blue-700 transition-colors duration-300">Terreno en La Libertad</h3>
                        <p class="text-gray-600 mb-4">Amplio terreno con vista al mar, ideal para construir casa de playa o proyecto turístico.</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-2xl font-bold text-blue-700">$180,000</span>
                            <div class="flex space-x-3">
                                <span class="flex items-center text-gray-600 text-sm">
                                    <svg class="w-4 h-4 mr-1 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                    </svg>
                                    1000m²
                                </span>
                                <span class="flex items-center text-gray-600 text-sm">
                                    <svg class="w-4 h-4 mr-1 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    Playa El Tunco
                                </span>
                            </div>
                        </div>
                        <a href="#" class="inline-flex items-center text-blue-600 hover:text-blue-800 transition-colors duration-300 font-medium">
                            Ver detalles
                            <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-12">
                <a href="#" class="inline-flex items-center px-8 py-3 bg-[#BA9D79] text-white rounded-full hover:bg-[#E3CDAE] hover:text-[#5E5E5E] shadow-md hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                    Ver todas las propiedades
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

 <!-- SECCION DE AGENTES SOLICITUD -->

 <section class="bg-white py- px-4 md:px-10 lg:px-24 ">
    <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-12 items-center">
        <!-- Imagen -->
        <div class="relative group">
  <div class="sketchfab-embed-wrapper"> <iframe title="Forest House" frameborder="0" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking execution-while-out-of-viewport execution-while-not-rendered web-share width="640" height="480" src="https://sketchfab.com/models/52429e4ef7bf4deda1309364a2cda86f/embed"> </iframe> <p style="font-size: 13px; font-weight: normal; margin: 5px; color: #4A4A4A;"> <a href="https://sketchfab.com/3d-models/forest-house-52429e4ef7bf4deda1309364a2cda86f?utm_medium=embed&utm_campaign=share-popup&utm_content=52429e4ef7bf4deda1309364a2cda86f" target="_blank" rel="nofollow" style="font-weight: bold; color: #1CAAD9;"> Forest House </a> by <a href="https://sketchfab.com/peachyroyalty?utm_medium=embed&utm_campaign=share-popup&utm_content=52429e4ef7bf4deda1309364a2cda86f" target="_blank" rel="nofollow" style="font-weight: bold; color: #1CAAD9;"> peachyroyalty </a> on <a href="https://sketchfab.com?utm_medium=embed&utm_campaign=share-popup&utm_content=52429e4ef7bf4deda1309364a2cda86f" target="_blank" rel="nofollow" style="font-weight: bold; color: #1CAAD9;">Sketchfab</a></p></div>

        </div>

        <!-- Texto + Botón -->
        <div>
            <h2 class="text-4xl font-bold text-gray-800 mb-4">
                ¿Eres un profesional inmobiliario?
            </h2>
            <p class="text-lg text-gray-600 mb-6">
                Únete a nuestro equipo de agentes expertos. En <span class="text-[#BA9D79] font-semibold">Real Estate Pro</span> te damos las herramientas y visibilidad para crecer en el mundo inmobiliario.
            </p>

            <ul class="text-gray-700 space-y-2 mb-6">
                <li class="flex items-start gap-2">
                    <i class="fas fa-check text-[#BA9D79] mt-1"></i>
                    Acceso a una amplia cartera de propiedades.
                </li>
                <li class="flex items-start gap-2">
                    <i class="fas fa-check text-[#BA9D79] mt-1"></i>
                    Panel profesional para gestionar tus clientes.
                </li>
                <li class="flex items-start gap-2">
                    <i class="fas fa-check text-[#BA9D79] mt-1"></i>
                    Soporte y formación continua.
                </li>
            </ul>

            <a href="{{route('page.solicitud')}}"
               class="inline-block px-6 py-3 bg-[#BA9D79] text-white font-semibold rounded-lg shadow hover:bg-[#a18465] transition-all duration-300">
                Quiero ser agente
            </a>
        </div>
    </div>
</section>


    
    <!-- Sección Sobre Nosotros -->
    <section class="py-16 bg-[#F4F4F4]">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-4 text-[#5E5E5E]">Sobre Nuestra Agencia</h2>
            <p class="text-center text-[#BA9D79] mb-12 max-w-2xl mx-auto">Conoce más sobre EnCasa Inmobiliaria, tu mejor opción en El Salvador</p>
            
            <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg p-8 mb-12">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                    <div>
                        <h3 class="text-2xl font-bold mb-4 text-[#BA9D79]">Nuestra Historia</h3>
                        <p class="text-[#5E5E5E] mb-6">Fundada en 2008, EnCasa Inmobiliaria nació con la visión de transformar la experiencia de comprar, vender y alquilar propiedades en El Salvador. Con más de 15 años en el mercado, nos hemos consolidado como líderes en el sector inmobiliario.</p>
                        <p class="text-[#5E5E5E] mb-6">Nuestro equipo está formado por profesionales certificados con amplia experiencia en el mercado inmobiliario salvadoreño, comprometidos con ofrecer un servicio personalizado y de calidad.</p>
                        <a href="#" class="px-6 py-3 bg-[#BA9D79] text-white rounded-full hover:bg-[#E3CDAE] hover:text-[#5E5E5E] shadow-md hover:shadow-lg transform hover:scale-105 transition-all duration-300 flex items-center mx-auto md:mx-0 w-max">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Conoce a nuestro equipo
                        </a>
                    </div>
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1073&q=80" alt="Equipo de EnCasa" class="rounded-xl shadow-lg w-full h-auto object-cover transform hover:scale-[1.02] transition-all duration-500">
                        <div class="absolute -bottom-4 -right-4 bg-[#BA9D79] text-white py-2 px-4 rounded-lg shadow-lg">
                        <p class="font-bold">+500</p>
                        <p class="text-sm">Clientes satisfechos</p>
                    </div>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
                    <div class="text-center p-4 border border-[#E3CDAE] rounded-lg hover:border-[#BA9D79] hover:shadow-md transition-all duration-300">
                        <div class="w-16 h-16 bg-[#F4F4F4] rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-[#BA9D79]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold text-[#5E5E5E] mb-2">Confianza</h4>
                        <p class="text-[#5E5E5E]">Transparencia y honestidad en cada transacción inmobiliaria</p>
                    </div>
                    <div class="text-center p-4 border border-[#E3CDAE] rounded-lg hover:border-[#BA9D79] hover:shadow-md transition-all duration-300">
                        <div class="w-16 h-16 bg-[#F4F4F4] rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-[#BA9D79]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold text-[#5E5E5E] mb-2">Eficiencia</h4>
                        <p class="text-[#5E5E5E]">Procesos ágiles y soluciones rápidas para nuestros clientes</p>
                    </div>
                    <div class="text-center p-4 border border-[#E3CDAE] rounded-lg hover:border-[#BA9D79] hover:shadow-md transition-all duration-300">
                        <div class="w-16 h-16 bg-[#F4F4F4] rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-[#BA9D79]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold text-[#5E5E5E] mb-2">Personalización</h4>
                        <p class="text-[#5E5E5E]">Atención individualizada según las necesidades de cada cliente</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Sección de Servicios -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-4 text-[#5E5E5E]">Nuestros Servicios</h2>
            <p class="text-center text-[#BA9D79] mb-12 max-w-2xl mx-auto">Ofrecemos soluciones integrales para todas tus necesidades inmobiliarias</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <!-- Servicio 1 -->
                <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 p-6 border border-[#E3CDAE] hover:border-[#BA9D79] group">
                    <div class="w-16 h-16 rounded-full bg-[#F4F4F4] flex items-center justify-center mb-6 group-hover:bg-[#E3CDAE] transition-colors duration-300">
                        <svg class="w-8 h-8 text-[#BA9D79]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-[#5E5E5E] group-hover:text-[#BA9D79] transition-colors duration-300">Compra y Venta</h3>
                    <p class="text-[#5E5E5E] mb-4">Te acompañamos en todo el proceso de compra o venta de tu propiedad, desde la valoración inicial hasta el cierre de la transacción.</p>
                    <ul class="text-[#5E5E5E] mb-4 space-y-2">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-[#BA9D79] mr-2 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Valoración profesional de propiedades</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-blue-600 mr-2 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Marketing inmobiliario especializado</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-blue-600 mr-2 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Negociación y cierre de transacciones</span>
                        </li>
                    </ul>
                    <a href="#" class="text-blue-600 hover:text-blue-800 font-medium inline-flex items-center transition-colors duration-300">
                        Más información
                        <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
                
                <!-- Servicio 2 -->
                <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 p-6 border border-gray-100 hover:border-blue-200 group">
                    <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center mb-6 group-hover:bg-blue-200 transition-colors duration-300">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800 group-hover:text-blue-700 transition-colors duration-300">Alquiler de Propiedades</h3>
                    <p class="text-gray-600 mb-4">Gestionamos el alquiler de tu propiedad o te ayudamos a encontrar el lugar perfecto para vivir o establecer tu negocio.</p>
                    <ul class="text-gray-600 mb-4 space-y-2">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-blue-600 mr-2 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Gestión integral de alquileres</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-blue-600 mr-2 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Selección de inquilinos confiables</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-blue-600 mr-2 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Mantenimiento y supervisión de propiedades</span>
                        </li>
                    </ul>
                    <a href="#" class="text-blue-600 hover:text-blue-800 font-medium inline-flex items-center transition-colors duration-300">
                        Más información
                        <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
                
                <!-- Servicio 3 -->
                <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 p-6 border border-gray-100 hover:border-blue-200 group">
                    <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center mb-6 group-hover:bg-blue-200 transition-colors duration-300">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800 group-hover:text-blue-700 transition-colors duration-300">Asesoría Legal y Financiera</h3>
                    <p class="text-gray-600 mb-4">Contamos con un equipo de expertos que te guiarán en todos los aspectos legales y financieros de tu inversión inmobiliaria.</p>
                    <ul class="text-gray-600 mb-4 space-y-2">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-blue-600 mr-2 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Revisión de contratos y documentos legales</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-blue-600 mr-2 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Opciones de financiamiento personalizadas</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-blue-600 mr-2 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Asesoría fiscal para inversiones inmobiliarias</span>
                        </li>
                    </ul>
                    <a href="#" class="text-blue-600 hover:text-blue-800 font-medium inline-flex items-center transition-colors duration-300">
                        Más información
                        <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Sección de Testimonios Mejorada con Swiper -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-4 text-gray-800">Lo que dicen nuestros clientes</h2>
            <p class="text-center text-gray-600 mb-12 max-w-2xl mx-auto">Descubre las experiencias de quienes ya encontraron su hogar ideal con nosotros</p>
            
            <div class="swiper testimonialSwiper max-w-5xl mx-auto">
                <div class="swiper-wrapper pb-12">
                    <!-- Testimonio 1 -->
                    <div class="swiper-slide">
                        <div class="bg-white rounded-xl shadow-md p-8 h-full">
                            <div class="flex items-center mb-6">
                                <div class="w-16 h-16 rounded-full overflow-hidden mr-4">
                                    <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Cliente" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <h4 class="text-xl font-bold text-gray-800">María Rodríguez</h4>
                                    <p class="text-blue-600">Compró casa en Santa Tecla</p>
                                </div>
                            </div>
                            <div class="mb-6">
                                <div class="flex text-blue-400 mb-2">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                </div>
                            </div>
                            <p class="text-gray-600 italic">"El proceso de compra fue increíblemente sencillo. El equipo de ENCASA me guió en cada paso y encontraron exactamente lo que estaba buscando. Mi nueva casa es perfecta para mi familia."</p>
                        </div>
                    </div>
                    
                    <!-- Testimonio 2 -->
                    <div class="swiper-slide">
                        <div class="bg-white rounded-xl shadow-md p-8 h-full">
                            <div class="flex items-center mb-6">
                                <div class="w-16 h-16 rounded-full overflow-hidden mr-4">
                                    <img src="https://randomuser.me/api/portraits/men/44.jpg" alt="Cliente" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <h4 class="text-xl font-bold text-gray-800">Carlos Mendoza</h4>
                                    <p class="text-blue-600">Alquiló apartamento en San Salvador</p>
                                </div>
                            </div>
                            <div class="mb-6">
                                <div class="flex text-blue-400 mb-2">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                </div>
                            </div>
                            <p class="text-gray-600 italic">"Encontré mi apartamento ideal en tiempo récord. La atención personalizada y el conocimiento del mercado que tiene ENCASA son incomparables. Recomendaría sus servicios sin dudarlo."</p>
                        </div>
                    </div>
                    
                    <!-- Testimonio 3 -->
                    <div class="swiper-slide">
                        <div class="bg-white rounded-xl shadow-md p-8 h-full">
                            <div class="flex items-center mb-6">
                                <div class="w-16 h-16 rounded-full overflow-hidden mr-4">
                                    <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Cliente" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <h4 class="text-xl font-bold text-gray-800">Laura Guzmán</h4>
                                    <p class="text-blue-600">Invirtió en terreno en La Libertad</p>
                                </div>
                            </div>
                            <div class="mb-6">
                                <div class="flex text-blue-400 mb-2">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                </div>
                            </div>
                            <p class="text-gray-600 italic">"Como inversionista, valoro mucho el asesoramiento experto que recibí de ENCASA. Me ayudaron a encontrar un terreno con gran potencial de valorización. Su conocimiento del mercado es excepcional."</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    
    <!-- Carrusel de Casas Destacadas con Swiper -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-4 text-gray-800">Casas en Tendencia</h2>
            <p class="text-center text-gray-600 mb-12 max-w-2xl mx-auto">Las propiedades más exclusivas y buscadas del momento</p>
            
            <div class="swiper trendingSwiper max-w-7xl mx-auto">
                <div class="swiper-wrapper">
                    <!-- Casa 1 -->
                    <div class="swiper-slide">
                        <div class="relative overflow-hidden rounded-xl group">
                            <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3" 
                                 alt="Casa Moderna" 
                                 class="w-full h-[500px] object-cover transform group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/75 to-transparent">
                                <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                                    <h3 class="text-2xl font-bold mb-2">Casa Moderna en Santa Elena</h3>
                                    <p class="mb-4">4 habitaciones • 3 baños • 350m²</p>
                                    <span class="text-3xl font-bold">$450,000</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Casa 2 -->
                    <div class="swiper-slide">
                        <div class="relative overflow-hidden rounded-xl group">
                            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3" 
                                 alt="Casa Familiar" 
                                 class="w-full h-[500px] object-cover transform group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/75 to-transparent">
                                <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                                    <h3 class="text-2xl font-bold mb-2">Residencia Familiar en Antiguo Cuscatlán</h3>
                                    <p class="mb-4">5 habitaciones • 4 baños • 420m²</p>
                                    <span class="text-3xl font-bold">$520,000</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Casa 3 -->
                    <div class="swiper-slide">
                        <div class="relative overflow-hidden rounded-xl group">
                            <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?ixlib=rb-4.0.3" 
                                 alt="Casa de Lujo" 
                                 class="w-full h-[500px] object-cover transform group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/75 to-transparent">
                                <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                                    <h3 class="text-2xl font-bold mb-2">Villa de Lujo en Santa Tecla</h3>
                                    <p class="mb-4">6 habitaciones • 5 baños • 550m²</p>
                                    <span class="text-3xl font-bold">$750,000</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next text-white"></div>
                <div class="swiper-button-prev text-white"></div>
            </div>
        </div>
    </section>

    <!-- Sección de Características Destacadas -->
    <section class="py-20 bg-white overflow-hidden">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-4 text-gray-800">Características Destacadas</h2>
            <p class="text-center text-gray-600 mb-16 max-w-2xl mx-auto">Descubre por qué ENCASA es la mejor opción para encontrar tu hogar ideal</p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <!-- Característica 1: Búsqueda Inteligente -->
                <div class="relative transform hover:-translate-y-2 transition-all duration-300 ease-in-out">
                    <div class="absolute inset-0 bg-gradient-to-r from-[#BA9D79] to-[#E3CDAE] transform -rotate-6 rounded-2xl opacity-20 group-hover:opacity-30 transition-all duration-300"></div>
                    <div class="relative bg-white p-8 rounded-2xl shadow-lg border border-[#E3CDAE]">
                        <div class="w-16 h-16 bg-[#F4F4F4] rounded-full flex items-center justify-center mb-8">
                            <svg class="w-8 h-8 text-[#BA9D79] animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-4 text-gray-800">Búsqueda Inteligente</h3>
                        <p class="text-[#5E5E5E]">Nuestro sistema de búsqueda avanzada te ayuda a encontrar la propiedad perfecta según tus preferencias y necesidades específicas.</p>
                    </div>
                </div>

                <!-- Característica 2: Realidad Virtual -->
                <div class="relative transform hover:-translate-y-2 transition-all duration-300 ease-in-out">
                    <div class="absolute inset-0 bg-gradient-to-r from-[#BA9D79] to-[#E3CDAE] transform -rotate-6 rounded-2xl opacity-20 group-hover:opacity-30 transition-all duration-300"></div>
                    <div class="relative bg-white p-8 rounded-2xl shadow-lg border border-[#E3CDAE]">
                        <div class="w-16 h-16 bg-[#F4F4F4] rounded-full flex items-center justify-center mb-8">
                            <svg class="w-8 h-8 text-[#BA9D79] animate-spin-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-4 text-[#5E5E5E]">Tours Virtuales 360°</h3>
                        <p class="text-[#5E5E5E]">Explora cada rincón de tu futura casa con nuestros tours virtuales inmersivos desde la comodidad de tu hogar.</p>
                    </div>
                </div>

                <!-- Característica 3: Asesoría Personalizada -->
                <div class="relative transform hover:-translate-y-2 transition-all duration-300 ease-in-out">
                    <div class="absolute inset-0 bg-gradient-to-r from-[#BA9D79] to-[#E3CDAE] transform -rotate-6 rounded-2xl opacity-20 group-hover:opacity-30 transition-all duration-300"></div>
                    <div class="relative bg-white p-8 rounded-2xl shadow-lg border border-[#E3CDAE]">
                        <div class="w-16 h-16 bg-[#F4F4F4] rounded-full flex items-center justify-center mb-8">
                            <svg class="w-8 h-8 text-[#BA9D79] animate-bounce-custom" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-4 text-[#5E5E5E]">Asesoría Personalizada</h3>
                        <p class="text-[#5E5E5E]">Nuestro equipo de expertos te guiará en cada paso del proceso, desde la búsqueda hasta el cierre de la transacción.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de Estadísticas Animadas -->
    <section class="py-16 bg-gradient-to-br from-[#5E5E5E] via-[#BA9D79] to-[#5E5E5E] overflow-hidden">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-4 text-[#F4F4F4]">Nuestro Impacto en Números</h2>
            <p class="text-center text-[#E3CDAE] mb-12 max-w-2xl mx-auto">Descubre por qué somos líderes en el mercado inmobiliario</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Estadística 1 -->
                <div class="relative group cursor-pointer" data-count="1500">
                    <div class="bg-[#F4F4F4]/10 backdrop-blur-lg rounded-2xl p-6 transform transition-all duration-500 group-hover:scale-105 group-hover:bg-[#F4F4F4]/20">
                        <h3 class="text-4xl font-bold text-[#F4F4F4] mb-2 counter">0</h3>
                        <p class="text-[#E3CDAE]">Propiedades Vendidas</p>
                    </div>
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-[#BA9D79] to-[#E3CDAE] rounded-2xl blur opacity-0 group-hover:opacity-30 transition duration-500"></div>
                </div>
                
                <!-- Estadística 2 -->
                <div class="relative group cursor-pointer" data-count="95">
                    <div class="bg-[#F4F4F4]/10 backdrop-blur-lg rounded-2xl p-6 transform transition-all duration-500 group-hover:scale-105 group-hover:bg-[#F4F4F4]/20">
                        <h3 class="text-4xl font-bold text-[#F4F4F4] mb-2 counter">0</h3>
                        <p class="text-[#E3CDAE]">% Clientes Satisfechos</p>
                    </div>
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-[#BA9D79] to-[#E3CDAE] rounded-2xl blur opacity-0 group-hover:opacity-30 transition duration-500"></div>
                </div>
                
                <!-- Estadística 3 -->
                <div class="relative group cursor-pointer" data-count="50">
                    <div class="bg-[#F4F4F4]/10 backdrop-blur-lg rounded-2xl p-6 transform transition-all duration-500 group-hover:scale-105 group-hover:bg-[#F4F4F4]/20">
                        <h3 class="text-4xl font-bold text-[#F4F4F4] mb-2 counter">0</h3>
                        <p class="text-[#E3CDAE]">Agentes Expertos</p>
                    </div>
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-[#BA9D79] to-[#E3CDAE] rounded-2xl blur opacity-0 group-hover:opacity-30 transition duration-500"></div>
                </div>
                
                <!-- Estadística 4 -->
                <div class="relative group cursor-pointer" data-count="15">
                    <div class="bg-[#F4F4F4]/10 backdrop-blur-lg rounded-2xl p-6 transform transition-all duration-500 group-hover:scale-105 group-hover:bg-[#F4F4F4]/20">
                        <h3 class="text-4xl font-bold text-[#F4F4F4] mb-2 counter">0</h3>
                        <p class="text-[#E3CDAE]">Años de Experiencia</p>
                    </div>
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-[#BA9D79] to-[#E3CDAE] rounded-2xl blur opacity-0 group-hover:opacity-30 transition duration-500"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Galería Interactiva -->
    <section class="py-16 bg-[#F4F4F4]">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12 animate-on-scroll gradient-shine">Descubre Nuestras Propiedades Destacadas</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Tarjeta 1 -->
                <div class="group relative overflow-hidden rounded-2xl shadow-lg transform transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl">
                    <div class="relative h-80">
                        <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3" 
                             alt="Propiedad 1" 
                             class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/75 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-6 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                            <h3 class="text-2xl font-bold mb-2">Villa Moderna</h3>
                            <p class="text-sm opacity-90">Santa Tecla, La Libertad</p>
                            <div class="mt-4 flex items-center space-x-4">
                                <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg> 450m²</span>
                                <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path></svg> 4 Habitaciones</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta 2 -->
                <div class="group relative overflow-hidden rounded-2xl shadow-lg transform transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl">
                    <div class="relative h-80">
                        <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?ixlib=rb-4.0.3" 
                             alt="Propiedad 2" 
                             class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/75 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-6 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                            <h3 class="text-2xl font-bold mb-2">Residencia Exclusiva</h3>
                            <p class="text-sm opacity-90">Antiguo Cuscatlán</p>
                            <div class="mt-4 flex items-center space-x-4">
                                <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg> 380m²</span>
                                <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path></svg> 3 Habitaciones</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta 3 -->
                <div class="group relative overflow-hidden rounded-2xl shadow-lg transform transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl">
                    <div class="relative h-80">
                        <img src="https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?ixlib=rb-4.0.3" 
                             alt="Propiedad 3" 
                             class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/75 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-6 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                            <h3 class="text-2xl font-bold mb-2">Apartamento de Lujo</h3>
                            <p class="text-sm opacity-90">San Salvador</p>
                            <div class="mt-4 flex items-center space-x-4">
                                <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg> 200m²</span>
                                <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path></svg> 2 Habitaciones</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección CTA con Parallax -->
    <section class="relative py-24 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3" 
                 alt="Background" 
                 class="w-full h-full object-cover opacity-30">
            <div class="absolute inset-0 bg-gradient-to-r from-[#5E5E5E] to-[#BA9D79] opacity-90"></div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-6 transform transition-all duration-700 translate-y-0 opacity-100">
                    Encuentra tu Hogar Ideal Hoy
                </h2>
                <p class="text-xl text-[#E3CDAE] mb-10 transform transition-all duration-700 delay-100 translate-y-0 opacity-100">
                    Déjanos ayudarte a descubrir la propiedad perfecta para ti y tu familia
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center transform transition-all duration-700 delay-200 translate-y-0 opacity-100">
                    <a href="#" class="px-8 py-4 bg-[#F4F4F4] text-[#5E5E5E] rounded-full font-semibold hover:bg-[#E3CDAE] transition-all duration-300 shadow-lg hover:shadow-xl flex items-center group">
                        Explorar Propiedades
                        <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                    <a href="#" class="px-8 py-4 border-2 border-[#F4F4F4] text-[#F4F4F4] rounded-full font-semibold hover:bg-[#F4F4F4] hover:text-[#5E5E5E] transition-all duration-300 flex items-center group">
                        Contactar Agente
                        <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Elementos decorativos flotantes -->
        <div class="absolute top-10 left-10 w-20 h-20 bg-[#BA9D79] rounded-full opacity-10 animate-float"></div>
        <div class="absolute bottom-10 right-10 w-32 h-32 bg-[#E3CDAE] rounded-full opacity-10 animate-float delay-200"></div>
        <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-white rounded-full opacity-10 animate-float delay-500"></div>
    </section>

    <!-- Características Interactivas -->
    <section class="py-20 bg-gradient-to-br from-[#5E5E5E] via-[#BA9D79] to-[#5E5E5E] overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center mb-16">
                <h2 class="text-4xl font-bold text-[#F4F4F4] mb-6 animate-on-scroll gradient-shine">Características Innovadoras</h2>
                <p class="text-xl text-[#E3CDAE] animate-on-scroll">Descubre las herramientas que hacen única tu experiencia de búsqueda</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Característica 1 -->
                <div class="group bg-white/10 backdrop-blur-lg rounded-3xl p-8 hover:bg-white/20 transition-all duration-300 transform hover:-translate-y-2 animate-on-scroll parallax-scroll" data-rate="0.2">
                    <div class="relative w-16 h-16 mb-6 mx-auto">
                        <div class="absolute inset-0 bg-gradient-to-r from-[#BA9D79] to-[#E3CDAE] rounded-2xl transform -rotate-6 group-hover:rotate-6 transition-transform duration-300"></div>
                        <div class="relative w-full h-full flex items-center justify-center text-white">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-2xl font-semibold text-[#F4F4F4] text-center mb-4">Búsqueda Inteligente</h3>
                    <p class="text-[#E3CDAE] text-center">Encuentra tu propiedad ideal con nuestro avanzado sistema de filtros y recomendaciones personalizadas.</p>
                </div>

                <!-- Característica 2 -->
                <div class="group bg-white/10 backdrop-blur-lg rounded-3xl p-8 hover:bg-white/20 transition-all duration-300 transform hover:-translate-y-2 animate-on-scroll parallax-scroll" data-rate="0.3">
                    <div class="relative w-16 h-16 mb-6 mx-auto">
                        <div class="absolute inset-0 bg-gradient-to-r from-[#BA9D79] to-[#E3CDAE] rounded-2xl transform -rotate-6 group-hover:rotate-6 transition-transform duration-300"></div>
                        <div class="relative w-full h-full flex items-center justify-center text-white">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-2xl font-semibold text-[#F4F4F4] text-center mb-4">Tours Virtuales 360°</h3>
                    <p class="text-[#E3CDAE] text-center">Explora cada rincón de tu futura casa con nuestros recorridos virtuales inmersivos.</p>
                </div>

                <!-- Característica 3 -->
                <div class="group bg-white/10 backdrop-blur-lg rounded-3xl p-8 hover:bg-white/20 transition-all duration-300 transform hover:-translate-y-2 animate-on-scroll parallax-scroll" data-rate="0.4">
                    <div class="relative w-16 h-16 mb-6 mx-auto">
                        <div class="absolute inset-0 bg-gradient-to-r from-[#BA9D79] to-[#E3CDAE] rounded-2xl transform -rotate-6 group-hover:rotate-6 transition-transform duration-300"></div>
                        <div class="relative w-full h-full flex items-center justify-center text-white">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-2xl font-semibold text-[#F4F4F4] text-center mb-4">Asesoría en Tiempo Real</h3>
                    <p class="text-[#E3CDAE] text-center">Conecta con nuestros expertos inmobiliarios para resolver todas tus dudas al instante.</p>
                </div>
            </div>

            <!-- Elementos decorativos -->
            <div class="absolute -top-10 -right-10 w-40 h-40 bg-[#BA9D79] rounded-full opacity-10 animate-pulse-slow"></div>
            <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-[#E3CDAE] rounded-full opacity-10 animate-pulse-slow delay-300"></div>
        </div>
    </section>

    <!-- Sección de Video Promocional -->
    <section class="relative py-24 bg-[#5E5E5E] overflow-hidden">
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center mb-16">
                <h2 class="text-4xl font-bold text-[#F4F4F4] mb-6 animate-on-scroll gradient-shine">Descubre la Experiencia</h2>
                <p class="text-xl text-[#E3CDAE] animate-on-scroll">Vive el futuro de la búsqueda de propiedades</p>
            </div>
            
            <div class="relative max-w-5xl mx-auto rounded-2xl overflow-hidden shadow-2xl group">
                <div class="aspect-w-16 aspect-h-9 relative">
                    <video id="promoVideo" class="w-full h-full object-cover" poster="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3" muted>
                        <source src="https://player.vimeo.com/external/459389137.sd.mp4?s=956dda7d1313577d69a3fff5b7d51f7d5a313812&profile_id=165&oauth2_token_id=57447761" type="video/mp4">
                        Tu navegador no soporta el elemento de video.
                    </video>
                    
                    <!-- Overlay con gradiente -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent opacity-100 group-hover:opacity-70 transition-opacity duration-300"></div>
                    
                    <!-- Botón de reproducción personalizado -->
                    <button id="playButton" class="absolute inset-0 w-full h-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <div class="w-20 h-20 flex items-center justify-center rounded-full bg-white/30 backdrop-blur-sm border-2 border-white group-hover:bg-white/40 transition-all duration-300">
                            <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z" />
                            </svg>
                        </div>
                    </button>
                </div>
                
                <!-- Barra de progreso personalizada -->
                <div class="absolute bottom-0 left-0 right-0 h-1 bg-gray-800">
                    <div id="progressBar" class="h-full w-0 bg-[#BA9D79] transition-all duration-300"></div>
                </div>
            </div>
        </div>

        <!-- Elementos decorativos -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
            <div class="absolute -top-1/2 -left-1/2 w-full h-full bg-gradient-to-br from-[#BA9D79]/20 to-transparent transform rotate-12 scale-150"></div>
            <div class="absolute -bottom-1/2 -right-1/2 w-full h-full bg-gradient-to-tl from-[#E3CDAE]/20 to-transparent transform -rotate-12 scale-150"></div>
        </div>
    </section>



    <!-- Footer -->
    <footer class="bg-5E5E5E text-F4F4F4 pt-16 pb-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
                <!-- Columna 1: Sobre Nosotros -->
                <div>
                    <h3 class="text-2xl font-bold mb-4">ENCASA</h3>
                    <p class="text-E3CDAE mb-4">Tu mejor solución para encontrar el hogar perfecto. Más de 15 años de experiencia en el mercado inmobiliario salvadoreño.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-E3CDAE hover:text-F4F4F4 transition-colors duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-E3CDAE hover:text-F4F4F4 transition-colors duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-E3CDAE hover:text-F4F4F4 transition-colors duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19.995 6.68c-.37.177-.764.3-1.17.357.42-.252.744-.65.898-1.123-.394.234-.83.403-1.294.496-.372-.4-.898-.645-1.482-.645-1.12 0-2.03.912-2.03 2.033 0 .16.018.315.053.465-1.687-.085-3.183-.893-4.185-2.123-.175.3-.275.65-.275 1.02 0 .706.358 1.33.904 1.695-.334-.01-.647-.103-.92-.257v.025c0 .986.7 1.81 1.63 1.996-.17.046-.35.07-.534.07-.13 0-.257-.013-.38-.038.258.81 1.01 1.398 1.9 1.416-.696.546-1.573.87-2.525.87-.164 0-.327-.01-.487-.028.9.577 1.97.915 3.12.915 3.745 0 5.795-3.104 5.795-5.798 0-.088-.002-.176-.006-.262.4-.287.744-.646 1.017-1.054z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                
                <!-- Columna 2: Enlaces Rápidos -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Enlaces Rápidos</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-E3CDAE hover:text-F4F4F4 transition-colors duration-300">Inicio</a></li>
                        <li><a href="#" class="text-E3CDAE hover:text-F4F4F4 transition-colors duration-300">Propiedades</a></li>
                        <li><a href="#" class="text-E3CDAE hover:text-F4F4F4 transition-colors duration-300">Servicios</a></li>
                        <li><a href="#" class="text-E3CDAE hover:text-F4F4F4 transition-colors duration-300">Sobre Nosotros</a></li>
                        <li><a href="#" class="text-E3CDAE hover:text-F4F4F4 transition-colors duration-300">Contacto</a></li>
                    </ul>
                </div>
                
                <!-- Columna 3: Servicios -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Servicios</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-E3CDAE hover:text-F4F4F4 transition-colors duration-300">Compra de Propiedades</a></li>
                        <li><a href="#" class="text-E3CDAE hover:text-F4F4F4 transition-colors duration-300">Venta de Propiedades</a></li>
                        <li><a href="#" class="text-E3CDAE hover:text-F4F4F4 transition-colors duration-300">Alquiler</a></li>
                        <li><a href="#" class="text-E3CDAE hover:text-F4F4F4 transition-colors duration-300">Asesoría Legal</a></li>
                        <li><a href="#" class="text-E3CDAE hover:text-F4F4F4 transition-colors duration-300">Avalúos</a></li>
                    </ul>
                </div>
                
                <!-- Columna 4: Contacto -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Contacto</h4>
                    <ul class="space-y-2">
                        <li class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-BA9D79 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span class="text-E3CDAE">Calle La Mascota #444, San Salvador</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-blue-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span class="text-gray-400">info@encasa.com</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-6 h-6 text-blue-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <span class="text-gray-400">+503 2222-2222</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-BA9D79 pt-8 mt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-E3CDAE text-sm">© 2024 ENCASA. Todos los derechos reservados.</p>
                    <div class="flex space-x-6 mt-4 md:mt-0">
                        <a href="#" class="text-E3CDAE hover:text-F4F4F4 text-sm transition-colors duration-300">Política de Privacidad</a>
                        <a href="#" class="text-E3CDAE hover:text-F4F4F4 text-sm transition-colors duration-300">Términos de Servicio</a>
                        <a href="#" class="text-E3CDAE hover:text-F4F4F4 text-sm transition-colors duration-300">Cookies</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    @endsection
    