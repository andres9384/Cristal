<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Etiquetas;
use Illuminate\Http\Request;


class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $tags = Etiquetas::all();
        return view("admin.tags.index"  , compact("tags"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Etiquetas $etiqueta)
    {
        return view("admin.tags.show",compact("etiqueta"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etiquetas $etiqueta)
    {
        $etiqueta->delete();
        return redirect()->route("admin.tags.index")->with("info","La etiqueta se elimino con exito");
    }
}
