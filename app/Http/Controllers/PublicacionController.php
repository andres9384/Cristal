<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Etiquetas;
use Illuminate\Http\Request;
use App\Models\Publicacion;

class PublicacionController extends Controller
{
    public function index(){
        $publicacion = Publicacion::where("estados",2)->latest("id")->paginate(8);
        return view("post.index",compact("publicacion"));
    }
    public function show(Publicacion $publicacion){
        $similar = Publicacion::where("id_categoria", $publicacion->id_categoria)
            ->where("estados",2)
            ->where("id","!=",$publicacion->id)
            ->latest("id")
            ->take(4)
            ->get();
        $nombre_categoria = Categorias::where("id","$publicacion->id_categoria")->get();
        return view("post.show", compact("publicacion","similar","nombre_categoria"));
    }
    public function category(Categorias $category ){
        
        $publicacion = Publicacion::where("id_categoria",$category->id)
            ->where("estados",2)
            ->latest("id")
            ->paginate(6);

        
        return view("post.category", compact("publicacion","category")) ;
    }
    public function tag(Etiquetas $tag)
    {
        $publicacion = $tag->publicacion()->where("estados","2")->latest("id")->paginate(4);
        return view("post.tag", compact("publicacion", "tag"));
     }
}
