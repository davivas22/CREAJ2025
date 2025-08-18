<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use App\Models\Propertie;
use Illuminate\Http\Request;

class PropiedadesController extends Controller
{
    public function index(Request $request){
        $tipo = $request->input('tipo');
        $precio = $request->input('precio');
        $habitaciones = $request->input('habitaciones');

        $query =  Propertie::with('imagenes');

        if($tipo){
            $query->where('tipo', $tipo);
        }

          if ($precio == '$0 - $100k') {
                $query->whereBetween('precio', [0, 100000]);
            } elseif ($precio == '$100k - $200k') {
                $query->whereBetween('precio', [100000, 200000]);
            } elseif ($precio == '$200k - $500k') {
                $query->whereBetween('precio', [200000, 500000]);
            } elseif ($precio == '$500k+') {
                $query->where('precio', '>', 500000);
            } elseif ($precio == '< $50k') {
                $query->where('precio', '<', 50000);
            } else {
                // Si el precio es un rango con ' - ', lo procesamos
                $rango = explode(' - ', $precio);
                if (count($rango) === 2) {  // Aseguramos que haya dos elementos
                    $query->whereBetween('precio', [$rango[0], $rango[1]]);
                } }

        if($habitaciones){
            $query->where('habitaciones', $habitaciones);
        }

        $propiedades=$query->get();

        return view('page.propiedades', compact('propiedades','tipo','habitaciones','precio'));
    }
}
