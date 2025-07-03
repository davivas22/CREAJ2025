<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Verificación de correo</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-white text-black min-h-screen flex items-center justify-center px-4">

    <div class="max-w-md w-full space-y-6 text-center">
        <!-- Ícono de sobre -->
        <div class="flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke-width="1.5" stroke="currentColor"
                 class="w-16 h-16 text-[#BA9D79]">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25H4.5a2.25 2.25 0 01-2.25-2.25V6.75M21.75 6.75A2.25 2.25 0 0019.5 4.5H4.5A2.25 2.25 0 002.25 6.75M21.75 6.75l-9.69 6.615a.75.75 0 01-.84 0L2.25 6.75"/>
            </svg>
        </div>

        <!-- Título -->
        <h1 class="text-3xl font-bold text-[#BA9D79]">Verifica tu correo electrónico</h1>

        <!-- Mensaje de instrucción -->
        <p class="text-sm text-black leading-relaxed">
            ¡Gracias por registrarte en <span class="font-semibold">Poorgram</span>! Antes de comenzar, necesitamos que confirmes tu dirección de correo electrónico haciendo clic en el enlace que te enviamos. <br>
            Si no lo recibiste, puedes solicitar otro.
        </p>

        <!-- Mensaje de éxito si se reenvió el enlace -->
        @if (session('status') == 'verification-link-sent')
            <div class="text-sm font-medium text-green-600 bg-green-100 p-3 rounded-lg border border-green-300">
                Se ha enviado un nuevo enlace de verificación al correo que proporcionaste.
            </div>
        @endif

        <!-- Botones -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mt-6">
            <!-- Botón reenviar verificación -->
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit"
                        class="w-full sm:w-auto bg-black text-white px-4 py-2 rounded-lg hover:bg-[#BA9D79] hover:text-black transition">
                    Reenviar correo de verificación
                </button>
            </form>

            <!-- Botón cerrar sesión -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="text-sm text-[#BA9D79] hover:underline">
                    Cerrar sesión
                </button>
            </form>
        </div>
    </div>

</body>
</html>
