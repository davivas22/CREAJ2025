<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use App\Models\Mensaje;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index(){
        return view('page.contacto');
    }

    public function store(Request $request){
      $validated = $request->validate([
        'name' => 'required|string',
        'email' => 'email|required',
        'phone' => 'numeric|required',
        'subject' => 'required|min:5',
        'message' => 'required'
      ]);

      Mensaje::create($validated);

      return redirect()->back()->with('success', 'Mensaje enviado correctamente');


    }
}
