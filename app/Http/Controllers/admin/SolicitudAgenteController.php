<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Agente;
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
        
        if (!$user->hasRole('admin')) {
          $user->assignRole('agente');
        };

        //CREAR AGENTE
        Agente::create([
        'user_id'            => $solicitud->user_id,
        'experiencia'        => $solicitud->experiencia,
        'zona'               => $solicitud->zona,
        'licencia'           => $solicitud->licencia,
        'razon'              => $solicitud->razon ?? null,
        'descripcion'        => $solicitud->mensaje ?? null,
        'telefono_adicional' => null,
        'red_social'         => null,
        'especialidad'       => null,
        'propiedades'        => 0,
        'usuarios_contacto'  => 0,
        ]);

        $solicitud->delete();
        return redirect()->route('admin.solicitud.agente')->with('succes' , 'solicitud aceptada');
    }
    public function rechazar(Solicitud $solicitud){
        $solicitud->delete();
        return redirect()->back();
    }
}
