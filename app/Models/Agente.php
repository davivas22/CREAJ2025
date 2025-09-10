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
    public function getRatingStarsAttribute()
    {
        return round($this->rating);
    }
    public function ratings()
    {
        return $this->hasMany(Agente_User_Rating::class,'agente_id');
    }

    // promedio dinámico
    public function getAverageRatingAttribute()
    {
        return round($this->ratings()->avg('rating'), 2);
    }

    // total de votos
    public function getRatingsCountAttribute()
    {
        return $this->ratings()->count();
    }


}
