<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use App\Models\Agente;
use App\Models\User;
use Illuminate\Http\Request;

class InfoAgenteController extends Controller
{
    public function show(User $agente){

          $userRating = null;

     if (auth()->check()) {
        $userRating = $agente->agente->ratings()
            ->where('user_id', auth()->id())
            ->value('rating');
    };
    



        $propiedades = $agente->propiedad()->paginate(5);
        return view('page.infoagente',[
            'agente' => $agente,
            'propiedades' => $propiedades,
            'userRating' => $userRating
        ]);
    }

    public function rate(Request $request, Agente $agente)
{
    $request->validate([
        'rating' => 'required|integer|min:1|max:5'
    ]);

    $user = auth()->user();

   $agente->ratings()->updateOrCreate(
    ['user_id' => $user->id], // solo user_id porque agente_id lo pone la relación
    ['rating' => $request->rating]
);


    return back()->with('success', '¡Gracias por tu calificación!');
}

}
