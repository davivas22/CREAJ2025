<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $fillable = [
    'user_id',
    'name',
    'email',
    'phone',
    'experiencia',
    'licencia',
    'zona',
    'mensaje',
    'photo',
];

public function user (){
    return  $this->belongsTo(User::class);
}

}
