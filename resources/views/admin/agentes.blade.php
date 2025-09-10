@extends('layout.sidebaradmin')

@section('content')
<div class="bg-neutral-100 dark:bg-gray-900 text-gray-800 dark:text-white h-screen flex overflow-hidden text-sm">
  <div class="flex-grow overflow-hidden h-full flex flex-col">

    <!-- Header -->
   

    <div class="flex-grow flex overflow-x-hidden">

      <!-- Panel de información (IZQUIERDA) -->
      <div class="flex-grow overflow-y-auto p-8 bg-white dark:bg-gray-800 rounded-lg shadow-inner">
        <div id="detalle-agente" class="hidden max-w-5xl mx-auto space-y-6">

          <!-- Encabezado -->
          <div class="flex items-center justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
            <div class="flex items-center gap-4">
              <img id="foto-agente" src="" class="w-16 h-16 rounded-full object-cover ring-2 ring-neutral-300 dark:ring-neutral-600" alt="Foto">
              <div>
                <h2 id="nombre-agente" class="text-lg font-semibold text-neutral-800 dark:text-white"></h2>
              </div>
            </div>

            <form id="form-eliminar-agente" method="POST" class="inline" action="">
              @csrf
              @method('DELETE')
              <button
                id="eliminar-agente-btn"
                type="submit"
                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition"
              >
                Eliminar
              </button>
            </form>
          </div>

          <!-- Tabs -->
          <div class="flex gap-6 border-b border-gray-200 dark:border-gray-700 mb-4 text-sm font-medium">
            <button class="tab-link pb-2 text-neutral-600 dark:text-gray-300 hover:text-black dark:hover:text-white active-tab border-b-2 border-neutral-800 dark:border-white">Propiedades</button>
            <button class="tab-link pb-2 text-neutral-600 dark:text-gray-300 hover:text-black dark:hover:text-white border-b-2 border-transparent">Información</button>
          </div>

          <!-- Tab: Propiedades -->
          <div class="tab-content" id="tab-propiedades">
            <div class="overflow-x-auto rounded-lg shadow-sm ring-1 ring-gray-200 dark:ring-gray-700">
              <table class="min-w-full text-sm bg-white dark:bg-gray-800 rounded-md">
                <thead class="bg-neutral-50 dark:bg-gray-700">
                  <tr class="text-left text-gray-500 dark:text-gray-300">
                    <th class="py-2 px-3">Título</th>
                    <th class="py-2 px-3">Imagen</th>
                    <th class="py-2 px-3">Zona</th>
                    <th class="py-2 px-3">Estado</th>
                    <th class="py-2 px-3">Precio</th>
                    <th class="py-2 px-3">Acciones</th>
                  </tr>
                </thead>
                <tbody class="text-gray-700 dark:text-gray-200"></tbody>
              </table>
            </div>
          </div>

          <!-- Tab: Información -->
          <div class="tab-content hidden" id="tab-info">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4 text-sm">
              <div><p class="font-semibold">Teléfono adicional</p><p id="telefono-agente"></p></div>
              <div><p class="font-semibold">Especialidad</p><p id="especialidad-agente"></p></div>
              <div><p class="font-semibold">Experiencia</p><p id="experiencia-agente"></p></div>
              <div><p class="font-semibold">Licencia</p><p id="licencia-agente"></p></div>
              <div class="md:col-span-2"><p class="font-semibold">Descripción</p><p id="descripcion-agente"></p></div>
              <p id="zona-agente" class="text-sm font-bold"></p>
              <p id="email-agente" class="text-sm font-bold"></p>
            </div>
          </div>
        </div>
      </div>

      <!-- Lista de agentes (DERECHA) -->
      <div class="xl:w-72 w-64 flex-shrink-0 border-l border-gray-400 dark:border-gray-800 h-full overflow-y-auto p-5 bg-[#09121b] dark:bg-gray-900 shadow-sm ">
       

        <div class="text-xs text-neutral-500 tracking-wider mb-2">AGENTES</div>
        <div id="lista-agentes">
          @foreach ($agentes as $agente)
          @php
            $propiedadesJson = $agente->propiedad->map(function($p) {
              $imagen = $p->imagenes->first()->ruta ?? 'images/default.jpg';
              return [
                'titulo' => $p->titulo,
                'zona' => $p->zona ?? 'No definida',
                'estado' => $p->estado ?? 'Disponible',
                'precio' => $p->precio ?? '0.00',
                'url' => route('admin.editar.propiedades', $p->id),
                'imagen' => asset($imagen),
              ];
            })->toJson();
          @endphp
          <button
            class="agente-btn mt-2 flex items-center w-full gap-2 p-2 rounded-lg hover:bg-neutral-400 dark:hover:bg-gray-800 transition"
            data-id="{{ $agente->id }}"
            data-nombre="{{ $agente->name }}"
            data-email="{{ $agente->email }}"
            data-zona="{{ $agente->agente->zona ?? 'No especificada' }}"
            data-foto="{{ asset($agente->foto_perfil) }}"
            data-telefono="{{ $agente->agente->telefono_adicional ?? 'No disponible' }}"
            data-experiencia="{{ $agente->agente->experiencia ?? '0' }}"
            data-especialidad="{{ $agente->agente->especialidad ?? 'No definida' }}"
            data-licencia="{{ $agente->licencia === 'si' ? 'Sí' : 'No' }}"
            data-descripcion="{{ $agente->agente->descripcion ?? 'Sin descripción' }}"
            data-propiedades='{{ $propiedadesJson }}'
          >
            <img src="{{ asset($agente->foto_perfil) }}" class="w-9 h-9 rounded-full object-cover">
            <div class="flex flex-col text-left">
              <span class="text-sm font-medium truncate text-white">{{ $agente->name }}</span>
              <span class="text-xs text-neutral-500">{{ $agente->zona }}</span>
            </div>
          </button>
          @endforeach
        </div>
      </div>

    </div>
  </div>
</div>


<!-- Script funcional -->
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const botones = document.querySelectorAll('.agente-btn');
    const panel = document.getElementById('detalle-agente');
    const formEliminar = document.getElementById('form-eliminar-agente');

    const tabLinks = document.querySelectorAll('.tab-link');
    const tabContents = {
      propiedades: document.getElementById('tab-propiedades'),
      info: document.getElementById('tab-info')
    };

    botones.forEach(boton => {
      boton.addEventListener('click', () => {
        // Actualizar datos personales
        document.getElementById('nombre-agente').textContent = boton.dataset.nombre;
        document.getElementById('zona-agente').textContent = `Zona: ${boton.dataset.zona}`;
        document.getElementById('email-agente').textContent = `Correo: ${boton.dataset.email}`;
        document.getElementById('foto-agente').src = boton.dataset.foto;
        document.getElementById('telefono-agente').textContent = boton.dataset.telefono;
        document.getElementById('experiencia-agente').textContent = `${boton.dataset.experiencia} años`;
        document.getElementById('especialidad-agente').textContent = boton.dataset.especialidad;
        document.getElementById('licencia-agente').textContent = boton.dataset.licencia;
        document.getElementById('descripcion-agente').textContent = boton.dataset.descripcion;

        // Actualizar acción del formulario de eliminación
        const idAgente = boton.dataset.id;
        formEliminar.action = `/admin/agentes/${idAgente}`;

        // Mostrar el panel
        panel.classList.remove('hidden');

        // Activar tab "Propiedades" por defecto
        tabLinks.forEach(link => link.classList.remove('border-blue-500', 'text-black', 'dark:text-white'));
        tabLinks[0].classList.add('border-blue-500', 'text-black', 'dark:text-white');

        tabContents.info.classList.add('hidden');
        tabContents.propiedades.classList.remove('hidden');

        // Propiedades
        const propiedades = JSON.parse(boton.dataset.propiedades || '[]');
        const tbody = document.querySelector('#tab-propiedades tbody');
        tbody.innerHTML = '';

        if (propiedades.length === 0) {
          tbody.innerHTML = `
            <tr>
              <td colspan="6" class="py-4 text-center text-gray-500">Este agente no tiene propiedades registradas.</td>
            </tr>`;
        } else {
          propiedades.forEach(p => {
            const row = document.createElement('tr');
            row.classList.add('border-b');
            row.innerHTML = `
              <td class="py-2 px-3">${p.titulo}</td>
              <td class="py-2 px-3">
                <img src="${p.imagen}" alt="Imagen propiedad" class="w-16 h-16 object-cover rounded-md">
              </td>
              <td class="py-2 px-3">${p.zona}</td>
              <td class="py-2 px-3">${p.estado}</td>
              <td class="py-2 px-3">$${p.precio}</td>
              <td class="py-2 px-3">
                <a href="${p.url}" class="text-blue-500 hover:underline">Ver</a>
              </td>
            `;
            tbody.appendChild(row);
          });
        }
      });
    });

    // Tabs
    tabLinks.forEach(btn => {
      btn.addEventListener('click', () => {
        tabLinks.forEach(l => l.classList.remove('border-blue-500', 'text-black', 'dark:text-white'));
        btn.classList.add('border-blue-500', 'text-black', 'dark:text-white');

        const tab = btn.dataset.tab;
        for (let key in tabContents) {
          tabContents[key].classList.add('hidden');
        }
        tabContents[tab].classList.remove('hidden');
      });
    });

    // Auto-seleccionar último agente
    const ultimoAgente = botones[botones.length - 1];
    if (ultimoAgente) {
      ultimoAgente.click();
    }
  });
</script>
@endsection
