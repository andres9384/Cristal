<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Categorias;
use App\Models\Etiquetas;
use App\Models\Publicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;





class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.posts.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias =Categorias::pluck("nombre","id");
        $etiquetas = Etiquetas::all();

        // return $categorias;
        return view("admin.posts.create",compact("categorias","etiquetas"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        // return Storage::put("posts", $request->file("file"));

      
        $publicacione = Publicacion::create($request->all());

        if($request->file("file")){
            $url =  Storage::put("posts",$request->file("file") );
            $publicacione->imagenes()->create([
                "url"=>$url
            ]);
        }

        if($request->etiqueta){
            $publicacione->etiquetasbla()->attach($request->etiqueta);
        }
        return redirect()->route("admin.posts.edit", compact("publicacione"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Publicacion $post)
    {
        return view("admin.posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Publicacion $publicacione)
    {

        $categorias =Categorias::pluck("nombre","id");
        $etiquetas = Etiquetas::all();
        return view("admin.posts.edit", compact("publicacione","categorias","etiquetas"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Publicacion $publicacione)
    {
        $publicacione->update($request->all());
        if ($request->file("file")){
            $url = Storage::put("posts",$request->file("file"));

            if($publicacione->imagenes){
                Storage::delete($publicacione->imagenes->url);

                $publicacione->imagenes->update([
                    "url"=>$url
                ]);
            }else{
                $publicacione->imagenes()->create([
                    "url"=>$url
                ]);
            }
        }

        if($request->etiquetas){
            $publicacione->etiquetasbla()->attach($request->etiquetas);
        }

        return redirect()->route("admin.posts.edit",$publicacione)->with("info","La publicación se actualizo con exito");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publicacion $post)
    {
        //
    }
}
