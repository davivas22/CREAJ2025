<?php

namespace App\Http\Controllers\agent;

use App\Http\Controllers\Controller;
use App\Models\Propertie;
use Illuminate\Http\Request;

class DashboarAgentController extends Controller
{
    public function index(){
        $totalpropiedades = Propertie::where('user_id', auth()->user()->id);
        return view('agent.index',[
            'totalpropiedades' => $totalpropiedades
        ]);
    }
}
