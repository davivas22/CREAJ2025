<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Propertie;
use Illuminate\Http\Request;

class PropiedadController extends Controller
{
    public function index(){
        $propiedades = Propertie::with('user')->paginate(5);

        return view('admin.propiedades',[
            'propiedades' => $propiedades,
        ]);
    }
}
