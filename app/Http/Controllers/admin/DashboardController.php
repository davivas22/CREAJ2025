<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Propertie;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $agentes = User::role('agente')->count();
        $propiedades = Propertie::count();
        return view('admin.dashboard',[
            'agentes'=> $agentes,
            'propiedades' => $propiedades,
        ]);
    }
}
