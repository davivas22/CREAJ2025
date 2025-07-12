<?php

namespace App\Http\Controllers\agent;

use App\Http\Controllers\Controller;
use App\Models\Propertie;
use Illuminate\Http\Request;

class VerPropiedadController extends Controller
{
    public function index(Propertie $propiedad){
        return view('agent.verpropiedad',[
            'propiedad' => $propiedad,
        ]);
    }
}
