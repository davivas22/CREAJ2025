<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agente_User_Rating extends Model
{
    protected $fillable=[
        'user_id',
        'agente_id',
        'rating'
    ];
     protected $table = 'agente_user_ratings'; // 👈 aclaramos el nombre correcto


     public function user(){
        return $this->belongsTo(User::class,'user_id');
     }

     public function agente(){
        return $this->belongsTo(Agente::class,'agente_id');
     }
}
