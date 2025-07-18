@extends('layout.sidebaradmin')

@section('content')
<div class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-white h-screen flex overflow-hidden text-sm">
  <div class="flex-grow overflow-hidden h-full flex flex-col">
    <!-- Header -->
    <div class="h-16 w-full border-b border-gray-200 dark:border-gray-800 hidden lg:flex px-10"></div>

    <div class="flex-grow flex overflow-x-hidden">

      <!-- Panel de información (IZQUIERDA AHORA) -->
      <div class="flex-grow overflow-y-auto p-8">
        <div id="detalle-agente" class="hidden max-w-5xl mx-auto space-y-6">
          
          <!-- Encabezado -->
          <div class="flex items-center justify-between border-b pb-4 mb-4">
            <div class="flex items-center gap-4">
              <img id="foto-agente" src="" class="w-16 h-16 rounded-full object-cover border-2 border-dorado" alt="Foto">
              <div>
                <h2 id="nombre-agente" class="text-lg font-bold"></h2>
              </div>
            </div>

            <!-- Formulario + Botón Eliminar -->
            <form id="form-eliminar-agente" method="POST" class="inline" action="">
              @csrf
              @method('DELETE')
              <button
                id="eliminar-agente-btn"
                type="submit"
                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition"
              >
                Eliminar
              </button>
            </form>
          </div>

          <!-- Tabs -->
          <div class="flex gap-6 border-b mb-4 text-sm font-medium text-gray-600 dark:text-gray-300">
            <button class="tab-link border-b-2 border-transparent pb-2 hover:text-black dark:hover:text-white active-tab" data-tab="propiedades">Propiedades</button>
            <button class="tab-link border-b-2 border-transparent pb-2 hover:text-black dark:hover:text-white" data-tab="info">Información</button>
          </div>

          <!-- Tab: Propiedades -->
          <div class="tab-content" id="tab-propiedades">
            <div class="overflow-x-auto">
              <table class="min-w-full text-sm border-t">
                <thead>
                  <tr class="text-left text-gray-500 border-b">
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
              <p id="zona-agente" class="text-sm text-black dark:text-gray-300 font-bold"></p>
              <p id="email-agente" class="text-sm text-black dark:text-gray-400 font-bold"></p>
            </div>
          </div>
        </div>
      </div>

      <!-- Lista de agentes (DERECHA AHORA) -->
      <div class="xl:w-72 w-64 flex-shrink-0 border-l border-gray-200 dark:border-gray-800 h-full overflow-y-auto p-5 bg-white dark:bg-gray-900">
        <!-- Buscador -->
        <div class="mb-4">
          <input
            type="text"
            placeholder="Buscar agente..."
            id="buscador-agentes"
            class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-dorado"
          />
        </div>

        <div class="text-xs text-gray-400 tracking-wider mb-2">USERS</div>
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
                'url' => route('agente.editar.propiedad', $p->id),
                'imagen' => asset($imagen),
              ];
            })->toJson();
          @endphp
          <button
            class="agente-btn mt-2 flex items-center w-full gap-2 p-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-800 transition"
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
              <span class="text-sm font-medium truncate">{{ $agente->name }}</span>
              <span class="text-xs text-gray-500">{{ $agente->zona }}</span>
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
