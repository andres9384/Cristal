<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Categorias;
use App\Models\Etiquetas;
use App\Models\Publicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;




class PostController extends Controller
{
    
    public function __construct()
    {
        $this->middleware("can:admin.posts.index")->only("index");
        $this->middleware("can:admin.posts.create")->only("create","store");
        $this->middleware("can:admin.posts.edit")->only("edit","update");
        $this->middleware("can:admin.posts.destroy")->only("destroy");
    }

    public function index()
    {
        return view("admin.posts.index");
    }

    public function create()
    {
        $categorias =Categorias::pluck("nombre","id");
        $etiquetas = Etiquetas::all();

        // return $categorias;
        return view("admin.posts.create",compact("categorias","etiquetas"));
    }

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
        Cache::flush();
        

        if($request->etiqueta){
            $publicacione->etiquetasbla()->attach($request->etiqueta);
        }
        return redirect()->route("admin.posts.edit", compact("publicacione"));
    }

    public function edit(Publicacion $publicacione)
    {

        $this->authorize("author",$publicacione);

        $categorias = Categorias::pluck("nombre","id");
        $etiquetas = Etiquetas::all();
        return view("admin.posts.edit", compact("publicacione","categorias","etiquetas"));
    }

    public function update(PostRequest $request, Publicacion $publicacione)
    {
        $this->authorize("author",$publicacione);

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

        if($request->etiqueta){
            $publicacione->etiquetasbla()->sync($request->etiqueta);
        }
        
        Cache::flush();
        return redirect()->route("admin.posts.edit",$publicacione)->with("info","La publicación se actualizo con exito");
    }

    public function destroy(Publicacion $publicacione)
    {
        $this->authorize("author",$publicacione);

        $publicacione->delete();

        Cache::flush();
        return redirect()->route("admin.posts.index")->with("info","La publicación se elimino con exito");
    }
}
