<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;
    protected $fillable=["nombre","ficha"];

    //relacion 1 a muchos
    public function publicaciones(){
        return $this->hasMany(Publicacion::class);
    }

    public function getRouteKeyName()
    {
        return "ficha";
    }   
}
