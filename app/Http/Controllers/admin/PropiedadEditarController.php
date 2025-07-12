<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Propertie;
use Illuminate\Http\Request;

class PropiedadEditarController extends Controller
{
    public function index(Propertie $propiedad){
        return view('admin.verpropiedad', [
            'propiedad' => $propiedad,
        ]);
    }
}
