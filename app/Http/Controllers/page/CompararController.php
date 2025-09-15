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

     public function enriquecerPropiedades(Request $request)
    {
        $propiedades = $request->input('propiedades');
        $apiKey = env('GOOGLE_API_KEY');

        $propiedadesEnriquecidas = [];

        foreach ($propiedades as $prop) {
            $lat = $prop['lat'] ?? null;
            $lng = $prop['lng'] ?? null;

            $centroComercial = "No disponible";
            $hospital = "No disponible";

            if ($lat && $lng) {
                try {
                    // 🔍 Centro Comercial
                    $mallResponse = Http::withHeaders([
                        'Content-Type' => 'application/json',
                        'X-Goog-Api-Key' => $apiKey,
                        'X-Goog-FieldMask' => 'places.displayName,places.location',
                    ])->post("https://places.googleapis.com/v1/places:searchNearby", [
                        "includedTypes" => ["shopping_mall"],
                        "maxResultCount" => 1,
                        "locationRestriction" => [
                            "circle" => [
                                "center" => [
                                    "latitude" => (float) $lat,
                                    "longitude" => (float) $lng,
                                ],
                                "radius" => 5000
                            ]
                        ]
                    ]);

                    $mallData = $mallResponse->json();
                    if (!empty($mallData['places'][0]['displayName']['text'])) {
                        $centroComercial = $mallData['places'][0]['displayName']['text'];
                    }

                    // 🏥 Hospital
                    $hospitalResponse = Http::withHeaders([
                        'Content-Type' => 'application/json',
                        'X-Goog-Api-Key' => $apiKey,
                        'X-Goog-FieldMask' => 'places.displayName,places.location',
                    ])->post("https://places.googleapis.com/v1/places:searchNearby", [
                        "includedTypes" => ["hospital"],
                        "maxResultCount" => 1,
                        "locationRestriction" => [
                            "circle" => [
                                "center" => [
                                    "latitude" => (float) $lat,
                                    "longitude" => (float) $lng,
                                ],
                                "radius" => 5000
                            ]
                        ]
                    ]);

                    $hospitalData = $hospitalResponse->json();
                    if (!empty($hospitalData['places'][0]['displayName']['text'])) {
                        $hospital = $hospitalData['places'][0]['displayName']['text'];
                    }

                } catch (\Exception $e) {
                    Log::error("Error con Google Places: " . $e->getMessage());
                }
            }

            $propiedadesEnriquecidas[] = array_merge($prop, [
                'centro_comercial' => $centroComercial,
                'hospital' => $hospital,
            ]);
        }

        return response()->json($propiedadesEnriquecidas);
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
