<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use App\Models\Agente;
use App\Models\Solicitud;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    public function index(){
        return view('page.solicitud-agente');
    }

 
public function store(Request $request)
{
    // ✅ Validación automática, si falla Laravel redirige con errores
    $validated = $request->validate([
        'name'               => 'required|string|max:255',
     'email' => 'required|email|max:255|unique:solicituds,email',

        'phone'              => 'required|string|max:20',
        'experiencia'        => 'required|integer|min:0|max:100',
        'licencia'           => 'required|in:si,no',
        'zona'               => 'required|string|max:255',
        'razon'              => 'required|string|max:500',
        'descripcion'        => 'required|string|max:1000',
        'red_social'         => 'nullable|string|max:255',
        'especialidad'       => 'nullable|string|max:255',
        'telefono_adicional' => 'nullable|string|max:20',
        'photo'              => 'nullable|mimes:jpg,jpeg,png,avif,webp|max:2048|file',
    ]);

    // Agregamos el user_id al arreglo validado
    $validated['user_id'] = auth()->user()->id;

    // Guardar foto si existe
    $user = auth()->user();
    if ($request->hasFile('photo')) {
        $foto = $request->file('photo');
        $nombre = time() . '_' . uniqid() . '.' . $foto->getClientOriginalExtension();

        $foto->move(public_path('uploads/perfiles/'), $nombre);

        $user->foto_perfil = 'uploads/perfiles/' . $nombre;
        $user->save();
    }

    // Crear solicitud
    Solicitud::create([
        'user_id'     => $validated['user_id'],
        'name'        => $validated['name'],
        'experiencia' => $validated['experiencia'],
        'email'       => $validated['email'],
        'phone'       => $validated['phone'],
        'licencia'    => $validated['licencia'],
        'zona'        => $validated['zona'],
        'mensaje'     => $validated['descripcion'],
        'photo'       => $user->foto_perfil ?? null,
        'razon'       => $validated['razon'],
        'visto'       => false,
    ]);

    // Mensaje de éxito
    return back()->with('success', 'Solicitud enviada correctamente');
}

   

}
