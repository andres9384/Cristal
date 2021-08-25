<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Etiquetas;
use Illuminate\Http\Request;

class TagController extends Controller
{
   
    public function __construct()
    {
        $this->middleware("can:admin.tags.index")->only("index");
        $this->middleware("can:admin.tags.create")->only("create","store");
        $this->middleware("can:admin.tags.edit")->only("edit","update");
        $this->middleware("can:admin.tags.destroy")->only("destroy");
    }

    public function index()
    {
       
        $tags = Etiquetas::all();
        return view("admin.tags.index"  , compact("tags"));
    }

    public function create()
    {
        $colors=[
            "#800080"=>"Color Morado",
            "778899"=>"Color Azul Cielo",
            "#FAEBD7"=>"Color Rosado",
            "#1E90FF"=>"Color Azul Mar",
            "#D2691E"=>"Color Naranja",
            "#00FA9A"=>"Color Aguamarina",
            "#C71585"=>"Color Rosado",
            "#FF0000"=>"Color Rojo",
        ];
        return view("admin.tags.create", compact("colors"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "nombre"=> "required",
            "ficha"=> "required|unique:etiquetas",
            "color"=> "required",
            
        ]);
        
        $etiqueta = Etiquetas::create($request->all());
        

        return  redirect()->route('admin.tags.edit' , compact("etiqueta"))->with("info","La etiqueta se creo con exito");
        // redirect()->route("admin.tags.edit",$etiquetas);
        // return view('admin.tags.edit', $etiqueta);     
    }

    public function edit(Etiquetas $etiqueta)
    {
        $perro ="hoa mundo";
        $colors=[
            "#800080"=>"Color Morado",
            "778899"=>"Color Azul Cielo",
            "#FAEBD7"=>"Color Rosado",
            "#1E90FF"=>"Color Azul Mar",
            "#D2691E"=>"Color Naranja",
            "#00FA9A"=>"Color Aguamarina",
            "#C71585"=>"Color Rosado",
            "#FF0000"=>"Color Rojo",
        ];
        return view("admin.tags.edit",compact("etiqueta","perro","colors"));
    }

    public function update(Request $request, Etiquetas $etiqueta)
    {
        $request->validate([
            "nombre"=>"required",
            "ficha"=>"required|unique:etiquetas,ficha,$etiqueta->id",
            "color"=>"required"
        ]);
        $etiqueta->update($request->all());
        return redirect()->route("admin.tags.edit",$etiqueta)->with("info","La etiqueta se actualizo correctamente");
    }

    public function destroy(Etiquetas $etiqueta)
    {
        $etiqueta->delete();
        return redirect()->route("admin.tags.index")->with("info","La etiqueta se elimino con exito");
    }
}
