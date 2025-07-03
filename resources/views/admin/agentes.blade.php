@extends('layout.sidebaradmin')

@section('content')

<!-- Contenido Principal -->
        <main class="flex-1 overflow-y-auto bg-gray-50">
            <!-- Barra superior -->
            <header class="bg-white border-b border-gray-200">
                <div class="px-4 sm:px-6 lg:px-8 py-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <button @click="mobileMenu = !mobileMenu" 
                                    class="md:hidden text-gray-600 hover:text-gray-900 focus:outline-none">
                                <i class="fas fa-bars text-xl"></i>
                            </button>
                            <div class="ml-4 md:ml-0">
                                <h1 class="text-2xl font-bold text-gray-900">Agentes</h1>
                                <p class="text-sm text-gray-500">Gestión de agentes inmobiliarios</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                    <i class="fas fa-search text-gray-400"></i>
                                </span>
                                <input type="text" 
                                       placeholder="Buscar agente..." 
                                       class="w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:border-blue-500">
                            </div>
                            <a  
                            href="{{route('admin.solicitud.agente')}}"  
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 flex items-center">
                            <i class="fas fa-plus mr-2"></i>
                            Solicitud agentes
                        </a>

                        </div>
                    </div>
                </div>
            </header>

            <!-- Contenido de Agentes -->
            <div class="p-6">
                <!-- Lista de Agentes -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <template x-for="agent in agents" :key="agent.id">
                        <div class="bg-white rounded-lg shadow-sm card-hover fade-enter">
                            <div class="p-4">
                                <div class="flex justify-between items-start mb-4">
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-800" x-text="agent.name"></h3>
                                        <p class="text-sm text-gray-500" x-text="agent.role"></p>
                                    </div>
                                    <span class="px-2 py-1 text-xs font-medium rounded-full"
                                          :class="agent.status === 'Activo' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700'"
                                          x-text="agent.status"></span>
                                </div>
                                
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center">
                                        <i class="fas fa-home text-gray-400 mr-2"></i>
                                        <span class="text-sm text-gray-600" x-text="agent.properties + ' Prop.'"></span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-star text-yellow-400 mr-1"></i>
                                        <span class="text-sm text-gray-600" x-text="agent.rating"></span>
                                    </div>
                                </div>

                                <div class="flex items-center space-x-2">
                                    <button @click="editAgent(agent)" 
                                            class="flex-1 px-3 py-2 text-sm text-blue-500 border border-blue-500 rounded-lg hover:bg-blue-50 transition-colors">
                                        Editar
                                    </button>
                                    <button @click="selectedAgent = agent; deleteModal = true" 
                                            class="px-3 py-2 text-sm text-red-500 border border-red-500 rounded-lg hover:bg-red-50 transition-colors">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </main>
    </div>

    <!-- Modal Editar/Nuevo Agente -->
    <div x-show="showModal" 
         class="fixed inset-0 z-50 overflow-y-auto" 
         style="display: none;">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="fixed inset-0 bg-black opacity-30" @click="showModal = false"></div>
            <div class="relative bg-white rounded-lg w-full max-w-md p-6 fade-enter">
                <h3 class="text-lg font-semibold text-gray-800 mb-4" x-text="selectedAgent.id ? 'Editar Agente' : 'Nuevo Agente'"></h3>
                <form @submit.prevent="saveAgent()">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                            <input type="text" x-model="selectedAgent.name" class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Especialidad</label>
                            <select x-model="selectedAgent.role" class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-blue-500">
                                <option>Residencial</option>
                                <option>Comercial</option>
                                <option>Lujo</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Estado</label>
                            <select x-model="selectedAgent.status" class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-blue-500">
                                <option>Activo</option>
                                <option>Pendiente</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex justify-end space-x-3 mt-6">
                        <button type="button" @click="showModal = false" class="px-4 py-2 text-gray-600 hover:text-gray-800">
                            Cancelar
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Confirmar Eliminación -->
    <div x-show="deleteModal" 
         class="fixed inset-0 z-50 overflow-y-auto" 
         style="display: none;">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="fixed inset-0 bg-black opacity-30" @click="deleteModal = false"></div>
            <div class="relative bg-white rounded-lg w-full max-w-sm p-6 fade-enter">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Confirmar Eliminación</h3>
                <p class="text-gray-600 mb-6">¿Estás seguro de que deseas eliminar a este agente?</p>
                <div class="flex justify-end space-x-3">
                    <button @click="deleteModal = false" class="px-4 py-2 text-gray-600 hover:text-gray-800">
                        Cancelar
                    </button>
                    <button @click="deleteAgent(selectedAgent.id)" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                        Eliminar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection