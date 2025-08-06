@extends('layout.app')
@vite(['resources/css/app.css', 'resources/js/auth/login.js'])


@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 h-screen">
    <!-- Slider -->
    <div class="relative hidden md:block bg-black">
        <div id="slider" class="w-full h-full relative overflow-hidden">
            <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-100" data-slide>
                <img src="https://imgix.cosentino.com/es/wp-content/uploads/2023/07/Lumire-70-Facade-MtWaverley-vic-1.jpg?auto=format%2Ccompress&ixlib=php-3.3.0" class="w-full h-full object-cover" alt="Slide 1">
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                    <h2 class="text-white text-3xl font-semibold">Bienvenido a ENCASA</h2>
                </div>
            </div>
            <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0" data-slide>
                <img src="https://www.esneca.com/wp-content/uploads/casas-modernas-1200x900.jpeg" class="w-full h-full object-cover" alt="Slide 2">
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                    <h2 class="text-white text-3xl font-semibold">Conecta. Aprende. Crea.</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Formulario -->
    <div class="flex items-center justify-center bg-white p-8">
        <form method="POST" action="{{ route('login') }}" class="w-full max-w-md space-y-6">
            @csrf

            <h1 class="text-3xl font-bold text-[#BA9D79] text-center">Iniciar Sesión</h1>

            @if (session('status'))
                <div class="text-green-500 text-sm">{{ session('status') }}</div>
            @endif

            <div>
                <label for="email" class="block text-sm font-medium text-black">Correo Electrónico</label>
                <input type="email" name="email" id="email" required autofocus
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#BA9D79] focus:border-[#BA9D79]">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-black">Contraseña</label>
                <input type="password" name="password" id="password" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#BA9D79] focus:border-[#BA9D79]">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-between items-center">
                <label class="inline-flex items-center text-sm text-black">
                    <input type="checkbox" name="remember" class="mr-2"> Recuérdame
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-[#BA9D79] hover:underline">¿Olvidaste tu contraseña?</a>
                @endif
            </div>

            <button type="submit" class="w-full py-2 bg-black text-white rounded-lg hover:bg-[#BA9D79] hover:text-black transition">
                Ingresar
            </button>
            <div>
                <a href="{{url('/auth/google')}}">
                    <button type="button"
                    class="w-full flex items-center justify-center gap-3 bg-white text-gray-800 border border-gray-300 rounded-xl shadow-sm py-3 px-6 font-medium hover:bg-gray-100 transition-all duration-300 ease-in-out">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google Logo" class="w-5 h-5">
                    Iniciar Sesión con Google
                    </button>
                </a>
            </div>
                        <div class="text-center mt-4 text-sm">
                            <span class="text-black">¿No tienes cuenta?</span>
                            <a href="{{ route('register') }}" class="text-[#BA9D79] hover:underline">Regístrate</a>
                        </div>

        </form>
    </div>
</div>


@endsection
