<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorias;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware("can:admin.categories.index")->only("index");
        $this->middleware("can:admin.categories.create")->only("create","store");
        $this->middleware("can:admin.categories.edit")->only("edit","update");
        $this->middleware("can:admin.categories.destroy")->only("destroy");
    }
    public function index()
    {
        $categorias = Categorias::all();
        return view("admin.categories.index",compact("categorias"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin/categories/create");
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
            "nombre"=>"required",
            "ficha"=>"required | unique:categorias"
        ]);
        $category = Categorias::create($request->all());
        return redirect()->route("admin.categories.edit",$category)->with("info","la Categoria se creo con exito");
    }



  
    public function edit(Categorias $categoria)
    {
        return view("admin/categories/edit" , compact("categoria"));
    }

    
    public function update(Request $request, Categorias $categoria)
    {
        $request->validate([
            "nombre"=>"required",
            "ficha"=>"required | unique:categorias,ficha,$categoria->id"
        ]);
        $categoria->update($request -> all());
        return redirect()->route("admin.categories.edit",$categoria)->with("info","la Categoria se actualizo con exito");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorias $categoria)
    {
        $categoria->delete();
        return redirect()->route("admin.categories.index")->with("info","la Categoria se destruyo con exito"); 
    }
}
