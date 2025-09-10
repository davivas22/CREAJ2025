<?php

namespace App\Http\Controllers;

use App\Models\Agente;
use App\Models\Propertie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $propiedades = Propertie::latest()->take(3)->get();
        $agentes = Agente::with('user')
    ->withAvg('ratings', 'rating')               // calcula promedio en la query
    ->orderByDesc('ratings_avg_rating')          // ordena del más alto al más bajo
    ->take(3)                                    // solo 3
    ->get();

        return view('welcome',[
            'propiedades' => $propiedades,
            'agentes' => $agentes
        ]);
    }
}
