<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AgenteController extends Controller
{
    public function index(){
        $agentes = User::role('agente')->with('agente')->get();
        return view('admin.agentes',[
            'agentes' => $agentes,
        ]);
    }

    public function destroy(User $agente){
       
        if($agente->hasRole('agente')){
            $agente->removeRole('agente');

            //Eliminar la relacion con la tabla agente
            $agente->agente()->delete();

            return back()->with('success', 'Agente eliminado correctamente');
        }
    }
}
