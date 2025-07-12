<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agente extends Model
{
    protected $fillable = [
        'user_id',
        'experiencia',
        'zona',
        'licencia',
        'descripcion',
        'razon',
        'propiedades',
        'usuarios_contacto',
        'red_social',
        'telefono_adicional',
        'especialidad',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
