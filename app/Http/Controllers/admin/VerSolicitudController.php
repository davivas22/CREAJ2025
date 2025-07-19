<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Solicitud;
use Illuminate\Http\Request;

class VerSolicitudController extends Controller
{
    public function show(Solicitud $solicitud){

         if (!$solicitud->visto) {
        $solicitud->visto = true;
        $solicitud->save();
    }
      return view('admin.verSolicitud', [
        'solicitud' => $solicitud
      ]);
    }
}
