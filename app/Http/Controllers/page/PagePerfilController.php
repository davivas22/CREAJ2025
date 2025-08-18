<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PagePerfilController extends Controller
{
    public function index(){
        return view('page.perfil',[
        'user' => auth()->user()
        ]
    );
    }

    public function update( Request $request){
     $user = auth()->user();

      // Validaciones
    $validated = $request->validate([
        'name'  => 'required|string|max:255',
        'email' => [
                        'required',
                        'email',
                        'max:255',
                        Rule::unique('users')->ignore(auth()->user()->id),
                    ],
        'phone'             => 'required|string|max:20',
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

    return back()->with('success', 'Informacion actualizada correctamente');

    
    }
}
