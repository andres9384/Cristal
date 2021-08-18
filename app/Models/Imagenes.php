<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagenes extends Model
{
    use HasFactory;
    protected $fillable = ["url"];
    //Relacion Polimorfica
    public function imagen(){
        return $this->morphTo();
    }
}
