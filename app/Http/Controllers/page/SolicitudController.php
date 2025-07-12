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

    public function store(Request $request){
    try {
        $validated = $request->validate([
            // validaciones ...
            'name'                 => 'required|string|max:255',
            'email'                => 'required|email|max:255',
            'phone'                => 'required|string|max:20',
            'experiencia'          => 'required|integer|min:0|max:100',
            'licencia'             => 'required|in:si,no',
            'zona'                 => 'required|string|max:255',
            'razon'                => 'nullable|string|max:500',
            'descripcion'          => 'nullable|string|max:1000',
            'red_social'           => 'nullable|string|max:255',
            'especialidad'         => 'nullable|string|max:255',
            'telefono_adicional'   => 'nullable|string|max:20',
            'photo'                => 'nullable|mimes:jpg,jpeg,png,avif,webp|max:2048|file',
        ]);
        
        // lógica para subir foto y guardar usuario...
        $validated['user_id'] = auth()->user()->id;

        if($request->hasFile('photo')){
            $foto = $request->file('photo');
            $nombre = time() . '_' . uniqid() . '.' . $foto->getClientOriginalExtension();

            $foto->move(public_path('uploads/perfiles/'),$nombre);

            //guardar la ruta en el usuario
            $user = auth()->user();
            $user->foto_perfil = 'uploads/perfiles/' . $nombre;
            $user->save();
        }

        Solicitud::create([
            // datos
        'user_id'     => $validated['user_id'],
        'name'        => $validated['name'],
        'experiencia' => $validated['experiencia'],
        'email'       => $validated['email'],
        'phone'       => $validated['phone'],
        'licencia'    => $validated['licencia'],
        'zona'        => $validated['zona'],
        'mensaje'     => $validated['descripcion'],
        'photo'       => $user->foto_perfil ?? null,
        'razon'       => $validated['razon'] ?? null, // campo extra que agregaste
        ]);

        return back()->with('success', 'Solicitud enviada correctamente');

    } catch (\Exception $e) {
        
            dd('Error:', $e->getMessage());

    }
    }
}
