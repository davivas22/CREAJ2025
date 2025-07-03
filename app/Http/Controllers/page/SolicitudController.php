<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use App\Models\Solicitud;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    public function index(){
        return view('page.solicitud-agente');
    }

    public function store(Request $request){
      $validated = $request->validate([
        'name'        => 'required|string|max:255',
        'email'       => 'required|email|max:255',
        'phone'       => 'required|string|max:20',
        'experiencia' => 'required|integer|min:0|max:100',
        'licencia'    => 'required|in:si,no',
        'zona'        => 'required|string|max:255',
        'mensaje'     => 'required|string|max:1000',
        'photo'       => 'mimes:jpg,jpeg,png,avif,webp|max:2048|file',
    ]);

    $validated['user_id'] = auth()->user()->id;

    Solicitud::create($validated);

    return back()->with('success' , 'solicitud enviada correctamente');
    }
}
