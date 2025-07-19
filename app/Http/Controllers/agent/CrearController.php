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
        'imagenes.*' => 'image|mimes:jpg,jpeg,png,webp,avif|max:2048' // ✅ Cada archivo debe ser una imagen válida
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

    public function update(Request $request, Propertie $propiedad){
        // Validación
    $request->validate([
        'titulo' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'precio' => 'required|numeric|min:0',
        'tipo' => 'required|in:casa,apartamento,terreno',
        'habitaciones' => 'nullable|integer|min:0',
        'banos' => 'nullable|integer|min:0',
        'parqueos' => 'nullable|integer|min:0',
        'area_terreno' => 'nullable|numeric|min:0',
        'area_construccion' => 'nullable|numeric|min:0',
        'ubicacion' => 'required|string|max:255',
        'imagenes.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    // Actualizar los datos de la propiedad
    $propiedad->update([
        'titulo' => $request->titulo,
        'descripcion' => $request->descripcion,
        'precio' => $request->precio,
        'tipo' => $request->tipo,
        'habitaciones' => $request->habitaciones,
        'banos' => $request->banos,
        'parqueos' => $request->parqueos,
        'area_terreno' => $request->area_terreno,
        'area_construccion' => $request->area_construccion,
        'ubicacion' => $request->ubicacion,
    ]);

    // Subir nuevas imágenes si se enviaron
    if ($request->hasFile('imagenes')) {
        foreach ($request->file('imagenes') as $imagen) {
            $nombre = time() . '_' . uniqid() . '.' . $imagen->getClientOriginalExtension();
            $imagen->move(public_path('uploads/propiedades'), $nombre);

            $propiedad->imagenes()->create([
                'ruta' => 'uploads/propiedades/' . $nombre,
            ]);
        }
    }


    return back()->with('success','Propiedad actualizada correctamente');
    }


    public function destroy (Propertie $propiedad){
      //primero eliminamos las imagenes relacionadas a la propiedad si existen

      foreach($propiedad->imagenes() as $imagen){
        if(file_exists(public_path($imagen->ruta))){
            unlink(public_path($imagen->ruta));
        }
        $imagen->delete();
      }

      $propiedad->delete();

      return back()->with('success' , 'Propiedad eliminada correctamente');
    }
}
