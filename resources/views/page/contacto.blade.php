@extends('layout.app')

@section('content')
<section class="py-16 md:py-20 min-h-screen bg-white text-gray-900">
  <div class="max-w-7xl mx-auto px-6">
    <!-- Row: 3 tarjetas de info -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <!-- Dirección -->
      <div class="w-full text-center">
        <div class="bg-[#071c34] rounded-2xl px-6 py-8">
          <div class="mb-4 flex justify-center">
            <!-- map icon -->
            <svg class="h-12 w-12 text-[#fda40b]" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path d="M12 2a7 7 0 00-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 00-7-7zm0 9.5a2.5 2.5 0 110-5 2.5 2.5 0 010 5z"/>
            </svg>
          </div>
          <div>
            <h2 class="text-white text-xl font-semibold capitalize mb-2">Direccion</h2>
            <span class="block text-gray-400 text-base">Colonia Escalon </span>
            <span class="block text-gray-400 text-base">Santa Tecla</span>
          </div>
        </div>
      </div>

      <!-- Email -->
      <div class="w-full text-center">
        <div class="bg-[#071c34] rounded-2xl px-6 py-8">
          <div class="mb-4 flex justify-center">
            <!-- envelope icon -->
            <svg class="h-12 w-12 text-[#fda40b]" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path d="M20 4H4a2 2 0 00-2 2v1.2l10 5.8 10-5.8V6a2 2 0 00-2-2z"/>
              <path d="M22 8.3l-10 5.8L2 8.3V18a2 2 0 002 2h16a2 2 0 002-2z"/>
            </svg>
          </div>
          <div>
            <h2 class="text-white text-xl font-semibold capitalize mb-2">E-mail</h2>
            <span class="block text-gray-400 text-base">encasa@gmail.com</span>
            <span class="block text-gray-400 text-base">yourmail@gmail.com</span>
          </div>
        </div>
      </div>

      <!-- Horario -->
      <div class="w-full text-center">
        <div class="bg-[#071c34] rounded-2xl px-6 py-8">
          <div class="mb-4 flex justify-center">
            <!-- clock icon -->
            <svg class="h-12 w-12 text-[#fda40b]" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path d="M12 2a10 10 0 1010 10A10.011 10.011 0 0012 2zm1 10.59l3.3 1.9a1 1 0 01-1 1.73l-3.8-2.2A1 1 0 0111 13V7a1 1 0 012 0z"/>
            </svg>
          </div>
          <div>
            <h2 class="text-white text-xl font-semibold capitalize mb-2">Horario de atencion</h2>
            <span class="block text-gray-400 text-base">Lunes - Jueves  9:00 am - 4.00 pm</span>
            <span class="block text-gray-400 text-base">Jueves - Lunes  10.00 pm - 5.00 pm</span>
          </div>
        </div>
      </div>
    </div>
@if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif
    <!-- Row: formulario + mapa -->
    <div class="mt-10 grid grid-cols-1 lg:grid-cols-3 gap-8">
      <!-- Formulario (col-span 2) -->
      <div class="lg:col-span-2">
        <div class="inline-block w-full mt-6">
          <div class="px-4 md:px-6 pt-5 md:pt-6">
            <h2 class="text-2xl font-bold text-[#071c34] capitalize">Contactanos</h2>
          </div>

          <form action="{{route('contacto.store')}}" method="post" class="p-4 md:p-6">

          @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
           <!-- Name -->
<div>
  <input
    type="text" name="name" placeholder="Tu nombre"
    class="w-full rounded-md bg-[#f9f9f9] border border-[#f9f9f9] px-4 py-3 text-sm md:text-base placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#fda40b] focus:border-[#fda40b]"
    value="{{ old('name') }}"
  />
  @error('name')
    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
  @enderror
</div>

<!-- Email -->
<div>
  <input
    type="email" name="email" placeholder="Correo" required
    class="w-full rounded-md bg-[#f9f9f9] border border-[#f9f9f9] px-4 py-3 text-sm md:text-base placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#fda40b] focus:border-[#fda40b]"
    value="{{ old('email') }}"
  />
  @error('email')
    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
  @enderror
</div>

<!-- Phone -->
<div>
  <input
    type="text" name="phone" placeholder="Número de teléfono"
    class="w-full rounded-md bg-[#f9f9f9] border border-[#f9f9f9] px-4 py-3 text-sm md:text-base placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#fda40b] focus:border-[#fda40b]"
    value="{{ old('phone') }}"
  />
  @error('phone')
    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
  @enderror
</div>

<!-- Subject -->
<div>
  <input
    type="text" name="subject" placeholder="Asunto"
    class="w-full rounded-md bg-[#f9f9f9] border border-[#f9f9f9] px-4 py-3 text-sm md:text-base placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#fda40b] focus:border-[#fda40b]"
    value="{{ old('subject') }}"
  />
  @error('subject')
    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
  @enderror
</div>

<!-- Message -->
<div class="md:col-span-2">
  <textarea
    name="message" placeholder="Escribe tu mensaje"
    class="w-full h-32 md:h-40 rounded-md bg-[#f9f9f9] border border-[#f9f9f9] px-4 py-3 text-sm md:text-base placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#fda40b] focus:border-[#fda40b] resize-y"
  >{{ old('message') }}</textarea>
  @error('message')
    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
  @enderror
</div>


            <!-- Botón -->
            <div class="mt-4">
              <input
                type="submit" value="Enviar"
                class="inline-block w-40 bg-[#BA9D79] text-white font-semibold rounded-md py-2.5 text-base cursor-pointer transition hover:bg-[#071c34] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#fda40b]"
              />
            </div>
          </form>
        </div>
      </div>

      <!-- Mapa (col 1) -->
      <div class="mt-6 lg:mt-9">
        <div class="rounded-xl overflow-hidden shadow-sm border border-gray-200">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3877.663282782491!2d-89.18718!3d13.69294!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f6330b9bf1e5c21%3A0x1c9c1f77f8f2ff57!2sSan%20Salvador%2C%20El%20Salvador!5e0!3m2!1ses!2ssv!4v1693584680000!5m2!1ses!2ssv"
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            class="w-full h-[450px]"
          ></iframe>

        </div>
      </div>
    </div>
  </div>
</section>


@endsection