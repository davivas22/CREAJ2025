<?php

namespace App\Http\Controllers\agent;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule as ValidationRule;

class PerfilController extends Controller
{
    public function index(){

        $user = User::with('agente')->find(auth()->user()->id);
        return view('agent.perfil',[
            'user' => $user,
        ]);
    }

    public function update(Request $request){
      
      $user = auth()->user();

      // Validaciones
    $validated = $request->validate([
        'name'                 => 'required|string|max:255',
        'email' => [
                        'required',
                        'email',
                        'max:255',
                        ValidationRule::unique('users')->ignore(auth()->user()->id),
                    ],
        'phone'             => 'required|string|max:20',
        'zona'                 => 'required|string|max:255',
        'descripcion'          => 'nullable|string|max:1000',
        'experiencia'          => 'nullable|integer|min:0|max:100',
        'red_social'           => 'nullable|string|max:255',
        'especialidad'         => 'nullable|string|max:255',
        'telefono_adicional'   => 'nullable|string|max:20',
        'foto_perfil'          => 'nullable|image|mimes:jpg,jpeg,png,webp,avix|max:2048', // max 2MB
    ]);


    $user->update([
        'name' => $request->name,
        'email' =>$request->email,
        'phone' => $request->phone,
        
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

    

    $user->agente()->update([
        'zona' => $request->zona,
        'descripcion' => $request->descripcion,
        'experiencia' => $request->experiencia,
        'red_social' => $request->red_social,
        'especialidad' => $request->especialidad,
        'telefono_adicional' => $request->telefono_adicional,
        
    ]);


    return back()->with('success', 'Informacion actualizada correctamente');

    }
}
