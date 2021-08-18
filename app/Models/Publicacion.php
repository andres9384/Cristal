<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    use HasFactory;

    protected   $guarded =["id","created_at","updated_at"];
    //relacion 1 a muchos inversa

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function categoria()
    {
        return $this->belongsTo(Categorias::class);
    }

    //relacion muchos a muchos
    public function etiquetasbla()
    {
        return $this->belongsToMany(Etiquetas::class);
    }
    //relacion 1 a 1 polimorfica 
    public function imagenes()
    {
        return $this->morphOne(Imagenes::class,"imagen");
    }
}
