<?php

namespace App\Http\Controllers\agent;

use App\Http\Controllers\Controller;
use App\Models\Propertie;
use Illuminate\Http\Request;

class CrearController extends Controller
{
    public function index(){
        return view('agent.create');
    }

    public function store(Request $request){
              // ✅ 1. VALIDACIÓN de todos los campos
    $validated = $request->validate([
        'titulo' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'precio' => 'required|numeric|min:0',
        'tipo' => 'required|in:casa,apartamento,local,terreno,oficina',
        'estado' => 'required|in:nueva,usada,remodelada',
        'habitaciones' => 'nullable|integer|min:0',
        'banos' => 'required|integer|min:0',
        'parqueos' => 'required|integer|min:0',
        'area_terreno' => 'required|integer|min:0',
        'area_construccion' => 'required|integer|min:0',
        'ubicacion' => 'required|string|max:255',
        'imagenes' => 'required|array|min:1', // ✅ Espera al menos 1 imagen
        'imagenes.*' => 'image|mimes:jpg,jpeg,png|max:2048' // ✅ Cada archivo debe ser una imagen válida
    ]);
   
    $propiedad = Propertie::create([
        'titulo' => $validated['titulo'],
        'descripcion' => $validated['descripcion'],
        'precio' => $validated['precio'],
        'tipo' => $validated['tipo'],
        'estado' => $validated['estado'],
        'habitaciones' => $validated['habitaciones'],
        'banos' => $validated['banos'],
        'parqueos' => $validated['parqueos'],
        'area_terreno' => $validated['area_terreno'],
        'area_construccion' => $validated['area_construccion'],
        'ubicacion' => $validated['ubicacion'],
        'user_id' => auth()->user()->id,
    ]);

    //subir y guardar cada imagen en la db de imagenes

    foreach($request->file('imagenes') as $imagen){
        $nombre = time() . '_' . uniqid() . '.' . $imagen->getClientOriginalExtension();
        $imagen->move(public_path('uploads/propiedades'),$nombre);
             //ahora se guarda en l db

             $propiedad->imagenes()->create([
                'ruta' => 'uploads/propiedades/' .$nombre ,
             ]);
    };

    return back()->with('success' , 'Propiedad creada correctamente');

    }
}
