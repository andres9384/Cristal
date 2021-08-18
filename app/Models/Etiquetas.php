<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etiquetas extends Model
{
    use HasFactory;

    protected $fillable=["nombre","ficha","color"];
    //relacion mucohos a muchos

    public function publicacion(){
        return $this->belongsToMany(Publicacion::class);
        
    }
    public function getRouteKeyName()
    {
        return "ficha";
    }
}
