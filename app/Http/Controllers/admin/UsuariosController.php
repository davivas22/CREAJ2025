<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index(){
         $users = User::with('roles')->paginate(7);
        return view('admin.usuarios',[
            'users' => $users
        ]);
    }
    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:user,agente,admin',
        ]);

        $user->syncRoles([$request->role]);

        return back()->with('success', 'Rol actualizado correctamente.');
    }

    // 👉 Eliminar usuario
    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('success', 'Usuario eliminado correctamente.');
    }
}
