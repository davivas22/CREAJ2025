@extends('layout.app')

@section('content')
  <!-- Hero con imagen de fondo -->
<section class="relative h-[60vh] bg-cover bg-center flex items-center justify-center" style="background-image: url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c');">
    <div class="bg-black bg-opacity-60 w-full h-full absolute inset-0"></div>
    <div class="relative z-10 text-center text-white px-4">
        <h1 class="text-4xl font-bold mb-2">Encuentra tu propiedad ideal</h1>
        <p class="text-lg">Explora nuestra selección exclusiva de propiedades y encuentra el hogar de tus sueños.</p>
    </div>
</section>

<!-- Filtro -->
<section class="max-w-7xl mx-auto px-4 mt-[-4rem] z-20 relative">
    <div class="bg-white rounded-xl shadow-lg p-6 grid grid-cols-1 md:grid-cols-5 gap-4">
        <select class="w-full border border-gray-300 rounded-md px-4 py-2">
            <option selected disabled>Tipo</option>
            <option>Casa</option>
            <option>Apartamento</option>
        </select>
        <select class="w-full border border-gray-300 rounded-md px-4 py-2">
            <option selected disabled>Ubicación</option>
            <option>San Salvador</option>
            <option>Santa Ana</option>
        </select>
        <select class="w-full border border-gray-300 rounded-md px-4 py-2">
            <option selected disabled>Precio máximo</option>
            <option>$50,000</option>
            <option>$100,000</option>
            <option>$200,000+</option>
        </select>
        <select class="w-full border border-gray-300 rounded-md px-4 py-2">
            <option selected disabled>Habitaciones</option>
            <option>1+</option>
            <option>2+</option>
            <option>3+</option>
        </select>
        <button class="bg-[#BA9D79] text-white rounded-md px-6 py-2 hover:bg-[#a88a67] transition">Buscar</button>
    </div>
</section>

<!-- Cards dinámicas -->
<section class="max-w-7xl mx-auto px-4 py-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @for($i = 0; $i < 6; $i++)
    <div class="group bg-white shadow-md rounded-2xl overflow-hidden transform transition duration-500 hover:scale-[1.03] hover:shadow-2xl">
        <div class="relative">
            <img src="https://www.construyehogar.com/wp-content/uploads/2016/01/Casa-moderna-un-piso.jpg" class="w-full h-56 object-cover transition duration-300 group-hover:brightness-90">
            <span class="absolute top-3 left-3 bg-[#BA9D79] text-white text-xs px-3 py-1 rounded-full uppercase tracking-wide">Venta</span>
            <button class="absolute top-3 right-3 bg-white p-2 rounded-full shadow hover:scale-110 transition">
                <!-- Heroicon: Heart -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#BA9D79]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 016.364 0L12 7.636l1.318-1.318a4.5 4.5 0 116.364 6.364L12 21.364 4.318 12.682a4.5 4.5 0 010-6.364z" />
                </svg>
            </button>
        </div>
        <div class="p-5">
            <h3 class="text-lg font-semibold text-black">Casa moderna en San Salvador</h3>
            <p class="text-sm text-gray-600 mb-3">Diseño moderno, espacios amplios y acabados de lujo.</p>
            <div class="flex justify-between text-sm text-gray-600 mb-3">
                <div class="flex items-center gap-1">
                    <!-- Heroicon: Map Pin -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c1.657 0 3-1.343 3-3S13.657 5 12 5 9 6.343 9 8s1.343 3 3 3z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21l-7-7-7 7" />
                    </svg>
                    San Salvador
                </div>
                <div class="flex items-center gap-1 text-yellow-500">
                    <!-- Heroicon: Star -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.175 3.617a1 1 0 00.95.69h3.813c.969 0 1.371 1.24.588 1.81l-3.084 2.24a1 1 0 00-.364 1.118l1.175 3.617c.3.921-.755 1.688-1.54 1.118l-3.084-2.24a1 1 0 00-1.176 0l-3.084 2.24c-.784.57-1.838-.197-1.539-1.118l1.174-3.617a1 1 0 00-.364-1.118L2.535 9.044c-.783-.57-.38-1.81.588-1.81h3.813a1 1 0 00.951-.69l1.175-3.617z" />
                    </svg>
                    4.9
                </div>
            </div>
            <div class="flex justify-between text-gray-600 text-sm mb-4">
                <div class="flex items-center gap-1">
                    <!-- Heroicon: Expand -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V6a2 2 0 012-2h2m8 0h2a2 2 0 012 2v2m0 8v2a2 2 0 01-2 2h-2m-8 0H6a2 2 0 01-2-2v-2" />
                    </svg>
                    110 m²
                </div>
                <div class="flex items-center gap-1">
                    <!-- Heroicon: Home -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9l9-7 9 7v11a2 2 0 01-2 2h-4a2 2 0 01-2-2v-4H9v4a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                    </svg>
                    2 hab
                </div>
                <div class="flex items-center gap-1">
                    <!-- Heroicon: Toilet (usamos outline square icon como reemplazo) -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 10h12v4H6z" />
                    </svg>
                    2 baños
                </div>
            </div>
            <div class="flex items-center justify-between">
                <span class="text-[#BA9D79] font-bold text-xl">$245,000</span>
                <a href="#" class="text-white bg-black px-4 py-2 rounded-md hover:bg-gray-800 transition text-sm">Ver detalles</a>
            </div>
        </div>
    </div>
    @endfor
</section>
@endsection