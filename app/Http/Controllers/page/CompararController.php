<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use App\Models\Propertie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CompararController extends Controller
{
     public function index(Request $request)
    {
        
        $ids = explode(',', $request->ids);

     
        $propiedades = Propertie::whereIn('id', $ids)->get();

        // Validamos que no pasen de 2 propiedades
        if ($propiedades->count() > 2) {
            return redirect()->back()->with('error', 'Solo puedes comparar 2 propiedades a la vez.');
        }

        return view('page.comparar', compact('propiedades'));
    }

 public function compararConIA(Request $request)
{
    $propiedades = $request->input('propiedades'); 

    $prompt = "Compara estas propiedades teniendo en cuenta precio, tamaño, estado y ubicación:\n\n";

    foreach ($propiedades as $index => $prop) {
        $ubicacion     = $prop['ubicacion'] ?? 'No especificada';
        $precio        = $prop['precio'] ?? 'No disponible';
        $habitaciones  = $prop['habitaciones'] ?? 'No disponible';
        $areaTerreno   = $prop['area_terreno'] ?? 'No disponible';
        $estado        = $prop['estado'] ?? 'No disponible';
        $centro        = $prop['centro_comercial'] ?? 'No disponible';
        $hospital      = $prop['hospital'] ?? 'No disponible';
        $calle         = $prop['calle'] ?? 'No disponible';
        $distancia     = $prop['distancia_centrocomercial'] ?? 'No calculada';
        $tiempo        = $prop['tiempo_centrocomercial'] ?? 'No calculado';

        $prompt .= "Propiedad " . ($index+1) . ":\n";
        $prompt .= "Ubicación: {$ubicacion}\n";
        $prompt .= "Precio: {$precio}\n";
        $prompt .= "Habitaciones: {$habitaciones}\n";
        $prompt .= "Metros cuadrados: {$areaTerreno}\n";
        $prompt .= "Estado: {$estado}\n";
        $prompt .= "Centro comercial cercano: {$centro}\n";
        $prompt .= "Hospital cercano: {$hospital}\n";
        $prompt .= "Calle: {$calle}\n";
        $prompt .= "Distancia al centro comercial: {$distancia} ({$tiempo} en carro)\n\n";
    }

    $response = Http::withToken(env('OPENAI_API_KEY'))
        ->post("https://api.openai.com/v1/chat/completions", [
            "model" => "gpt-4o-mini",
            "messages" => [
                ["role" => "system", "content" => "Eres un asesor inmobiliario experto en El Salvador."],
                ["role" => "user", "content" => $prompt],
            ],
            "temperature" => 0.7
        ]);

    $data = $response->json();

    // 👇 Log para inspección de la API
    Log::info('Respuesta OpenAI:', $data);

    return response()->json([
        "comparacion" => $data['choices'][0]['message']['content'] 
            ?? $data['choices'][0]['delta']['content'] 
            ?? ($data['error']['message'] ?? "⚠️ No se pudo generar conclusión.")
    ]);
}

    
}
