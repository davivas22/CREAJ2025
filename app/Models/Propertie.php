<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Propertie extends Model
{
     protected $fillable = [
        'titulo',
        'user_id',
        'descripcion',
        'precio',
        'tipo',
        'estado',
        'habitaciones',
        'banos',
        'parqueos',
        'area_terreno',
        'area_construccion',
        'ubicacion',
        
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function imagenes(){
        return $this->hasMany(ImagenPropiedad::class,'propiedad_id');
    }
}
