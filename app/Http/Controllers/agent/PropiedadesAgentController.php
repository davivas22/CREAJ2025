<?php

namespace App\Http\Controllers\agent;

use App\Http\Controllers\Controller;
use App\Models\Propertie;
use Illuminate\Http\Request;

class PropiedadesAgentController extends Controller
{
    public function index(){
         $propiedades = Propertie::where('user_id', auth()->id())->with('imagenes')->latest()->get();
        
        return view('agent.propiedades',[
            'propiedades' => $propiedades,
        ]);
    }
}
