<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPerfilController extends Controller
{
    public function index(){
        $user = auth()->user();
        return view('admin.perfil',[
            'user' => $user
        ]);
    }

    public function update(Request $request){

      $user = auth()->user();

      $validated = $request->validate([
         'name'                 => 'required|string|max:255',
        'email' => [
                        'required',
                        'email',
                        'max:255',
                        Rule::unique('users')->ignore(auth()->user()->id),
                    ],
                ]);

                $user->update([
                    'name' => $request->name,
                    'email' => $request->email
                ]);

         if($request->hasFile('foto_perfil')){

            // Borrar imagen anterior si existe
    if ($user->foto_perfil && file_exists(public_path($user->foto_perfil))) {
        unlink(public_path($user->foto_perfil));
    }

    // Subir nueva imagen
    $imagen = $request->file('foto_perfil');
    $nombre = time() . '_' . uniqid() . '.' . $imagen->getClientOriginalExtension();
    $ruta = 'uploads/perfiles/' . $nombre;

    // Mover la imagen a public/uploads/perfiles
    $imagen->move(public_path('uploads/perfiles'), $nombre);

    // Guardar ruta en base de datos
    $user->foto_perfil = $ruta;
    $user->save(); // ✅ Esto sí guarda la nueva foto


    }
  return back()->with('succes', 'perfil correctamente actualizado');
    }
}
