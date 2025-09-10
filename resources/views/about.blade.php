@extends('layout.app')

@section('content')

<script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brown-custom': '#BA9D79',
                        'brown-light': '#D4C4A8'
                    }
                }
            }
        }
    </script>

 <section class="py-20 bg-white" id="about">
            <div class="max-w-6xl mx-auto px-6">
                <h2 class="text-5xl font-light text-center text-gray-800 mb-4">
                   Conocenos
                </h2>
                <div class="w-20 h-1 bg-brown-custom mx-auto mb-16"></div>
                
                <!-- Timeline Layout -->
                <div class="relative hidden md:block">
                    <!-- Vertical Line -->
                    <div class="absolute left-1/2 transform -translate-x-1/2 w-1 h-full bg-gradient-to-b from-brown-custom to-brown-light"></div>
                    
                    <!-- Mission - Left Side -->
                    <div class="flex items-center mb-16">
                        <div class="w-1/2 pr-8 text-right">
                            <div class="bg-gradient-to-l from-brown-50 to-white p-8 rounded-l-3xl border-l-4 border-brown-custom">
                                <h3 class="text-3xl font-bold text-gray-800 mb-4">Nuestra Misión</h3>
                                <p class="text-gray-600 leading-relaxed text-lg">
                                    Aspiramos a crear espacios habitables que inspiren y conecten a las personas con su hogar ideal, aprendiendo y creciendo mientras combinamos funcionalidad, estética y sostenibilidad.
                                </p>
                            </div>
                        </div>
                        <div class="w-16 h-16 bg-gradient-to-br from-brown-custom to-brown-light rounded-full flex items-center justify-center text-2xl z-10 shadow-lg">
                            🏠
                        </div>
                        <div class="w-1/2 pl-8"></div>
                    </div>
                    
                    <!-- Vision - Right Side -->
                    <div class="flex items-center mb-16">
                        <div class="w-1/2 pr-8"></div>
                        <div class="w-16 h-16 bg-gradient-to-br from-brown-custom to-brown-light rounded-full flex items-center justify-center text-2xl z-10 shadow-lg">
                            👁️
                        </div>
                        <div class="w-1/2 pl-8">
                            <div class="bg-gradient-to-r from-brown-50 to-white p-8 rounded-r-3xl border-r-4 border-brown-custom">
                                <h3 class="text-3xl font-bold text-gray-800 mb-4">Nuestra Visión</h3>
                                <p class="text-gray-600 leading-relaxed text-lg">
                                    Convertirnos en una empresa reconocida en diseño de interiores, construyendo nuestra reputación día a día a través de la innovación, calidad y nuestro genuino compromiso con cada cliente.
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Experience - Left Side -->
                    <div class="flex items-center">
                        <div class="w-1/2 pr-8 text-right">
                            <div class="bg-gradient-to-l from-brown-50 to-white p-8 rounded-l-3xl border-l-4 border-brown-custom">
                                <h3 class="text-3xl font-bold text-gray-800 mb-4">Nuestro Crecimiento</h3>
                                <p class="text-gray-600 leading-relaxed text-lg">
                                    Aunque somos una empresa joven con 2 años en el mercado, hemos logrado transformar más de 15 hogares, aprendiendo de cada proyecto y creando espacios únicos que reflejan la personalidad de nuestros clientes.
                                </p>
                            </div>
                        </div>
                        <div class="w-16 h-16 bg-gradient-to-br from-brown-custom to-brown-light rounded-full flex items-center justify-center text-2xl z-10 shadow-lg">
                            ⭐
                        </div>
                        <div class="w-1/2 pl-8"></div>
                    </div>
                </div>
                
                <!-- Mobile Timeline -->
                <div class="md:hidden space-y-8 mt-16">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-yellow-custom to-yellow-light rounded-full flex items-center justify-center text-xl flex-shrink-0">
                            🏠
                        </div>
                        <div class="bg-yellow-50 p-6 rounded-2xl border-l-4 border-yellow-custom">
                            <h3 class="text-2xl font-bold text-gray-800 mb-3">Nuestra Misión</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Aspiramos a crear espacios habitables que inspiren y conecten a las personas con su hogar ideal, aprendiendo y creciendo mientras combinamos funcionalidad, estética y sostenibilidad.
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-yellow-custom to-yellow-light rounded-full flex items-center justify-center text-xl flex-shrink-0">
                            👁️
                        </div>
                        <div class="bg-yellow-50 p-6 rounded-2xl border-l-4 border-yellow-custom">
                            <h3 class="text-2xl font-bold text-gray-800 mb-3">Nuestra Visión</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Convertirnos en una empresa reconocida en diseño de interiores, construyendo nuestra reputación día a día a través de la innovación, calidad y nuestro genuino compromiso con cada cliente.
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-yellow-custom to-yellow-light rounded-full flex items-center justify-center text-xl flex-shrink-0">
                            ⭐
                        </div>
                        <div class="bg-yellow-50 p-6 rounded-2xl border-l-4 border-yellow-custom">
                            <h3 class="text-2xl font-bold text-gray-800 mb-3">Nuestro Crecimiento</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Aunque somos una empresa joven con 2 años en el mercado, hemos logrado transformar más de 15 hogares, aprendiendo de cada proyecto y creando espacios únicos que reflejan la personalidad de nuestros clientes.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Values Section -->
        <section class="py-20 bg-gradient-to-br from-gray-50 to-white relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-6 relative">
                <div class="text-center mb-16">
                    <h2 class="text-5xl font-bold text-gray-800 mb-6">
                        Nuestros <span class="text-transparent bg-clip-text bg-gradient-to-r from-brown-custom to-brown-light">Valores</span>
                    </h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                        Los principios que nos inspiran y guían nuestro crecimiento mientras trabajamos hacia la excelencia
                    </p>
                </div>
                
                <!-- Values Grid -->
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
                    <!-- Value 1: Excelencia -->
                    <div class="group text-center">
                        <div class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                            <div class="w-16 h-16 bg-gradient-to-br from-yellow-custom to-yellow-light rounded-2xl mx-auto mb-6 flex items-center justify-center text-2xl text-white shadow-lg group-hover:scale-110 transition-transform duration-300">
                                🎯
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-3">Dedicación</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                Nos esforzamos por superar expectativas en cada detalle, aprendiendo y mejorando constantemente
                            </p>
                        </div>
                    </div>
                    
                    <!-- Value 2: Innovación -->
                    <div class="group text-center">
                        <div class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl mx-auto mb-6 flex items-center justify-center text-2xl text-white shadow-lg group-hover:scale-110 transition-transform duration-300">
                                💡
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-3">Aprendizaje</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                Nos mantenemos actualizados con las últimas tendencias, siempre dispuestos a innovar
                            </p>
                        </div>
                    </div>
                    
                    <!-- Value 3: Confianza -->
                    <div class="group text-center">
                        <div class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                            <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl mx-auto mb-6 flex items-center justify-center text-2xl text-white shadow-lg group-hover:scale-110 transition-transform duration-300">
                                🤝
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-3">Honestidad</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                Construimos relaciones sólidas basadas en transparencia y comunicación abierta
                            </p>
                        </div>
                    </div>
                    
                    <!-- Value 4: Sostenibilidad -->
                    <div class="group text-center">
                        <div class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                            <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl mx-auto mb-6 flex items-center justify-center text-2xl text-white shadow-lg group-hover:scale-110 transition-transform duration-300">
                                🌱
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-3">Responsabilidad</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                Nos comprometemos con materiales eco-friendly y prácticas responsables desde el inicio
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Stats Section -->
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="text-center p-8 bg-gradient-to-br from-brown-50 to-white rounded-3xl shadow-lg border border-brown-custom/10">
                        <div class="text-4xl font-bold text-brown-custom mb-2">2+</div>
                        <div class="text-gray-600 font-medium">Años Creciendo</div>
                    </div>
                    <div class="text-center p-8 bg-gradient-to-br from-brown-50 to-white rounded-3xl shadow-lg border border-brown-custom/10">
                        <div class="text-4xl font-bold text-brown-custom mb-2">15+</div>
                        <div class="text-gray-600 font-medium">Proyectos Realizados</div>
                    </div>
                    <div class="text-center p-8 bg-gradient-to-br from-brown-50 to-white rounded-3xl shadow-lg border border-brown-custom/10">
                        <div class="text-4xl font-bold text-brown-custom mb-2">100%</div>
                        <div class="text-gray-600 font-medium">Compromiso</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section class="py-20 bg-gradient-to-br from-gray-50 to-white">
            <div class="max-w-7xl mx-auto px-6">
                <h2 class="text-5xl font-light text-center text-gray-800 mb-4">
                    Nuestros <span class="text-transparent bg-clip-text bg-gradient-to-r from-brown-custom to-brown-light">Servicios</span>
                </h2>
                <div class="w-20 h-1 bg-brown-custom mx-auto mb-16"></div>
                
                <!-- Interactive Service Tabs -->
                <div class="flex flex-wrap justify-center mb-12 space-x-2 space-y-2 md:space-y-0">
                    <button class="service-tab px-6 py-3 bg-brown-custom text-white rounded-full font-medium transition-all duration-300 shadow-lg" onclick="showService('interior')">
                        Diseño Interior
                    </button>
                    <button class="service-tab px-6 py-3 bg-gray-200 text-gray-700 hover:bg-gray-300 rounded-full font-medium transition-all duration-300" onclick="showService('construccion')">
                        Construcción
                    </button>
                    <button class="service-tab px-6 py-3 bg-gray-200 text-gray-700 hover:bg-gray-300 rounded-full font-medium transition-all duration-300" onclick="showService('consultoria')">
                        Consultoría
                    </button>
                    
                </div>
                
                <!-- Service Content -->
                <div class="service-content" id="interior">
                    <div class="grid md:grid-cols-2 gap-12 items-center">
                        <div class="space-y-6">
                            <div class="flex items-center space-x-4">
                                <div class="w-16 h-16 bg-gradient-to-br from-brown-custom to-brown-light rounded-2xl flex items-center justify-center text-2xl text-white">
                                    🎨
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold text-gray-800">Diseño Interior Personalizado</h3>
                                    <p class="text-brown-custom font-medium">Espacios únicos que reflejan tu personalidad</p>
                                </div>
                            </div>
                            
                            <p class="text-gray-600 leading-relaxed text-lg">
                                Nos especializamos en crear ambientes únicos y funcionales que se adapten a tu estilo de vida. 
                                Nuestro equipo joven y entusiasta trabaja de cerca contigo para transformar tus ideas en realidad.
                            </p>
                            
                            <div class="grid grid-cols-2 gap-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-2 h-2 bg-brown-custom rounded-full"></div>
                                    <span class="text-gray-700">Planos 3D</span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div class="w-2 h-2 bg-brown-custom rounded-full"></div>
                                    <span class="text-gray-700">Selección de materiales</span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div class="w-2 h-2 bg-brown-custom rounded-full"></div>
                                    <span class="text-gray-700">Iluminación especializada</span>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <div class="w-2 h-2 bg-brown-custom rounded-full"></div>
                                    <span class="text-gray-700">Mobiliario a medida</span>
                                </div>
                            </div>
                            
                            <button class="bg-gradient-to-r from-brown-custom to-brown-light text-white px-8 py-4 rounded-2xl font-semibold hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                                Solicitar Consulta Gratuita
                            </button>
                        </div>
                        
                        <div class="relative">
                            <div class="bg-gradient-to-br from-brown-50 to-white p-8 rounded-3xl shadow-xl">
                                <div class="aspect-video bg-gradient-to-br from-brown-100 to-brown-50 rounded-2xl flex items-center justify-center text-6xl">
                                    🏠
                                </div>
                                <div class="mt-6 space-y-4">
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600">Proyectos realizados</span>
                                        <span class="text-2xl font-bold text-brown-custom">15+</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600">Tiempo promedio</span>
                                        <span class="text-2xl font-bold text-brown-custom">45 días</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600">Dedicación</span>
                                        <span class="text-2xl font-bold text-brown-custom">100%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="service-content hidden" id="construccion">
                    <div class="grid md:grid-cols-3 gap-8">
                        <div class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-xl transition-all duration-300 border-t-4 border-brown-custom">
                            <div class="w-16 h-16 bg-brown-custom rounded-2xl flex items-center justify-center text-2xl text-white mb-6">
                                🏗️
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-4">Construcción Residencial</h3>
                            <p class="text-gray-600 mb-6">Casas y apartamentos con los más altos estándares de calidad</p>
                            <ul class="space-y-2 text-sm text-gray-600">
                                <li>• Estructuras sismo-resistentes</li>
                                <li>• Materiales de primera calidad</li>
                                <li>• Acabados personalizados</li>
                            </ul>
                        </div>
                        
                        <div class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-xl transition-all duration-300 border-t-4 border-brown-custom">
                            <div class="w-16 h-16 bg-brown-custom rounded-2xl flex items-center justify-center text-2xl text-white mb-6">
                                🏢
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-4">Construcción Comercial</h3>
                            <p class="text-gray-600 mb-6">Oficinas y locales comerciales funcionales y modernos</p>
                            <ul class="space-y-2 text-sm text-gray-600">
                                <li>• Espacios optimizados</li>
                                <li>• Tecnología integrada</li>
                                <li>• Certificaciones ambientales</li>
                            </ul>
                        </div>
                        
                        <div class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-xl transition-all duration-300 border-t-4 border-brown-custom">
                            <div class="w-16 h-16 bg-brown-custom rounded-2xl flex items-center justify-center text-2xl text-white mb-6">
                                🔧
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-4">Remodelaciones</h3>
                            <p class="text-gray-600 mb-6">Transformamos espacios existentes en lugares extraordinarios</p>
                            <ul class="space-y-2 text-sm text-gray-600">
                                <li>• Renovación completa</li>
                                <li>• Ampliaciones</li>
                                <li>• Modernización</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="service-content hidden" id="consultoria">
                    <div class="text-center max-w-4xl mx-auto">
                        <div class="w-24 h-24 bg-brown-custom rounded-full flex items-center justify-center text-4xl text-white mx-auto mb-8">
                            💡
                        </div>
                        <h3 class="text-3xl font-bold text-gray-800 mb-6">Consultoría Especializada</h3>
                        <p class="text-xl text-gray-600 mb-12 leading-relaxed">
                            Te acompañamos desde la conceptualización hasta la ejecución de tu proyecto, 
                            brindando asesoría dedicada y personalizada en cada etapa del proceso.
                        </p>
                        
                        <div class="grid md:grid-cols-2 gap-8 text-left">
                            <div class="space-y-6">
                                <div class="flex items-start space-x-4">
                                    <div class="w-8 h-8 bg-brown-custom rounded-full flex items-center justify-center text-white font-bold text-sm flex-shrink-0 mt-1">
                                        1
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Análisis de Viabilidad</h4>
                                        <p class="text-gray-600">Evaluamos cuidadosamente la factibilidad técnica y económica de tu proyecto</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start space-x-4">
                                    <div class="w-8 h-8 bg-brown-custom rounded-full flex items-center justify-center text-white font-bold text-sm flex-shrink-0 mt-1">
                                        2
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Planificación Estratégica</h4>
                                        <p class="text-gray-600">Desarrollamos un plan detallado y realista con cronogramas y presupuestos ajustados</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="space-y-6">
                                <div class="flex items-start space-x-4">
                                    <div class="w-8 h-8 bg-brown-custom rounded-full flex items-center justify-center text-white font-bold text-sm flex-shrink-0 mt-1">
                                        3
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Gestión de Permisos</h4>
                                        <p class="text-gray-600">Te ayudamos con todos los trámites legales y permisos necesarios</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start space-x-4">
                                    <div class="w-8 h-8 bg-brown-custom rounded-full flex items-center justify-center text-white font-bold text-sm flex-shrink-0 mt-1">
                                        4
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Supervisión de Obra</h4>
                                        <p class="text-gray-600">Seguimiento cercano y control de calidad durante todo el proyecto</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
           
        </section>
@endsection