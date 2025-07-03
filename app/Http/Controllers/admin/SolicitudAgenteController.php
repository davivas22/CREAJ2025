<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Solicitud;
use App\Models\User;
use Illuminate\Http\Request;

class SolicitudAgenteController extends Controller
{
    public function index(){

    $solicitud = Solicitud::with('user')->latest()->get();

        return view('admin.solicitud-agente',[
            'solicitud' => $solicitud,
        ]);
    }
    

    public function aceptar(Solicitud $solicitud){
        $user = User::find($solicitud->user_id);
        $user->assignRole('agente');
        $solicitud->delete();
        return redirect()->back()->with('succes' , 'solicitud aceptada');
    }
    public function rechazar(Solicitud $solicitud){
        $solicitud->delete();
        return redirect()->back();
    }
}
