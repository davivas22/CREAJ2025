<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use App\Models\Propertie;
use Illuminate\Http\Request;


class MorePropiedadController extends Controller
{
    public function index(Propertie $propiedad){
        return view('page.mas',[
            'propiedad' => $propiedad
        ]);
    }
}
