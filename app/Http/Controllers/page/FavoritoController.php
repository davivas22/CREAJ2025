<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use App\Models\Propertie;
use Illuminate\Http\Request;

class FavoritoController extends Controller
{
     // alternar favorito
    public function toggle(Propertie $propiedad)
    {
        $user = auth()->user();

        if (! $user) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para usar favoritos.');
        }

        // alterna entre agregar y quitar
        $user->favoritos()->toggle($propiedad->id);

        return back()->with('success', 'Favorito actualizado.');
    }

    
    public function index()
    {
        $user = auth()->user();

        $favoritos = $user->favoritos()->paginate(6);

        return view('page.favoritos', compact('favoritos'));
    }
}
