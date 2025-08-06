@extends('layout.sidebaragent')

@section('contenido')
<!-- Dashboard limpio en blanco estilo "Agente" con Tailwind CSS -->
<div class="min-h-screen bg-white text-gray-800 p-6 space-y-6">
  <h1 class="text-2xl font-bold">Panel del Agente</h1>

  <!-- KPI Cards -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <div class="bg-white border shadow rounded-xl p-5">
      <p class="text-sm text-gray-500">Propiedades activas</p>
      <p class="text-3xl font-bold">12</p>
    </div>
    <div class="bg-white border shadow rounded-xl p-5">
      <p class="text-sm text-gray-500">Solicitudes recibidas</p>
      <p class="text-3xl font-bold">27</p>
    </div>
    <div class="bg-white border shadow rounded-xl p-5">
      <p class="text-sm text-gray-500">Interesados este mes</p>
      <p class="text-3xl font-bold">89</p>
    </div>
    <div class="bg-white border shadow rounded-xl p-5">
      <p class="text-sm text-gray-500">Propiedades vendidas</p>
      <p class="text-3xl font-bold">5</p>
    </div>
  </div>

  <!-- Chart y métricas -->
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Simulación de gráfico -->
    <div class="lg:col-span-2 bg-white border shadow rounded-xl p-6">
      <h2 class="font-semibold mb-4">Visitas a propiedades (últimos 30 días)</h2>
      <div class="h-48 bg-gray-100 rounded flex items-center justify-center text-gray-400">[Gráfico de visitas aquí]</div>
    </div>

    <!-- Detalle lateral -->
    <div class="bg-white border shadow rounded-xl p-6 space-y-4">
      <div>
        <h2 class="font-semibold mb-2">Estado de propiedades</h2>
        <ul class="text-sm text-gray-600 space-y-1">
          <li class="flex justify-between"><span>Activas</span><span class="font-medium">10</span></li>
          <li class="flex justify-between"><span>En negociación</span><span class="font-medium">2</span></li>
          <li class="flex justify-between"><span>Vendidas</span><span class="font-medium">5</span></li>
        </ul>
      </div>
      <div>
        <h2 class="font-semibold mb-2">Nuevos interesados</h2>
        <ul class="space-y-2">
          <li class="flex items-center gap-3">
            <img class="w-8 h-8 rounded-full" src="https://i.pravatar.cc/40?img=1" alt="">
            <div>
              <p class="font-medium">Carlos Martínez</p>
              <p class="text-xs text-gray-500">Consultó casa en La Libertad</p>
            </div>
          </li>
          <li class="flex items-center gap-3">
            <img class="w-8 h-8 rounded-full" src="https://i.pravatar.cc/40?img=2" alt="">
            <div>
              <p class="font-medium">Ana Gómez</p>
              <p class="text-xs text-gray-500">Agendó visita en San Salvador</p>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

@endsection