<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Agente_User_Rating;
use App\Models\Mensaje;
use Illuminate\Http\Request;

class ReseñasController extends Controller
{
    public function index(){
        $mensajes_contacto = Mensaje::get();
        $ratings = Agente_User_Rating::with(['agente.user','user'])->latest()->paginate(10);
        
        return view('admin.reseñas',[
            'mensajes_contacto' => $mensajes_contacto,
            'ratings' => $ratings
        ]);
    }
}
