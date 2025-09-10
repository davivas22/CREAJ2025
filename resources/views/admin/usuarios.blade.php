@extends('layout.sidebaradmin')

@section('content')

<script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'encasa-primary': '#19284c',
                        'encasa-secondary': '#BA9D79',
                        'encasa-light': '#FFF',
                        'encasa-dark': '#8B4513',
                        'encasa-darker': '#654321'
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.3s ease-out'
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' }
                        }
                    }
                }
            }
        }
    </script>


 <div class="max-w-7xl mx-auto p-5">
        <!-- Header -->
      <header class="mb-6 p-6">
    <h1 class="text-4xl font-bold text-black">Gestión de Usuarios</h1>
</header>


       

        <!-- Users Table -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <table class="w-full border-collapse">
                <thead class="bg-encasa-light">
                    <tr>
                        <th class="py-4 px-3 text-left font-semibold text-encasa-dark text-xs uppercase tracking-wider border-b-2 border-encasa-secondary">FOTO</th>
                        <th class="py-4 px-3 text-left font-semibold text-encasa-dark text-xs uppercase tracking-wider border-b-2 border-encasa-secondary">NOMBRE</th>
                        <th class="py-4 px-3 text-left font-semibold text-encasa-dark text-xs uppercase tracking-wider border-b-2 border-encasa-secondary">EMAIL</th>
                        <th class="py-4 px-3 text-left font-semibold text-encasa-dark text-xs uppercase tracking-wider border-b-2 border-encasa-secondary">ROL</th>
                        
                        <th class="py-4 px-3 text-left font-semibold text-encasa-dark text-xs uppercase tracking-wider border-b-2 border-encasa-secondary hidden md:table-cell">FECHA REGISTRO</th>
                        <th class="py-4 px-3 text-left font-semibold text-encasa-dark text-xs uppercase tracking-wider border-b-2 border-encasa-secondary">ACCIONES</th>
                    </tr>
                </thead>
                <tbody id="usersTableBody" class="divide-y divide-gray-100">
                    @foreach ($users as $user)
                <tr>
                    <td class="px-4 py-2">
                        <img src="{{ asset($user->foto_perfil) }}" alt="Foto de {{ $user->name }}" 
                            class="w-12 h-12 rounded-full object-cover">
                    </td>

                    <td class="px-4 py-2">{{ $user->name }} {{ $user->lastname }}</td>
                    <td class="px-4 py-2">{{ $user->email }}</td>
                    <td class="px-4 py-2">
                       <form action="{{ route('admin.users.updateRole', $user->id) }}" 
                            method="POST"
                            onsubmit="return confirm('¿Estás seguro de cambiar el rol de este usuario?')">
                            @csrf
                            @method('PUT')

                            <select name="role" onchange="this.form.submit()" 
                                    class="border rounded px-2 py-1 text-sm">
                                <option value="user" {{ $user->hasRole('user') ? 'selected' : '' }}>User</option>
                                <option value="agente" {{ $user->hasRole('agente') ? 'selected' : '' }}>Agente</option>
                                <option value="admin" {{ $user->hasRole('admin') ? 'selected' : '' }}>Admin</option>
                            </select>
                        </form>

                    </td>

                    <td class="px-4 py-2" >{{$user->created_at}}</td>
                    <td class="px-4 py-2 flex gap-2">
                        
                        <form action="{{route('admin.users.destroy',$user->id)}}" method="POST" 
                              onsubmit="return confirm('¿Seguro de eliminar este usuario?')">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 text-white px-3 py-1 rounded">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
                </tbody>
            </table>
        </div>
    </div>

    


@endsection