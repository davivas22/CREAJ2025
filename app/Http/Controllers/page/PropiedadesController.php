<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use App\Models\Propertie;
use Illuminate\Http\Request;

class PropiedadesController extends Controller
{
    public function index(){
        $propiedades = Propertie::with('imagenes')->get();
        return view('page.propiedades',[
            'propiedades' => $propiedades,
        ]);
    }
}
