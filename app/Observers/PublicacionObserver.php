<?php

namespace App\Observers;

use App\Models\Publicacion;
use Illuminate\Support\Facades\Storage;



class PublicacionObserver
{
    /**
     * Handle the Publicacion "created" event.
     *
     * @param  \App\Models\Publicacion  $publicacion
     * @return void
     */
    public function creating(Publicacion $publicacione)
    {
        if(!\App::runningInConsole()){
            $publicacione->id_usuario = auth()->user()->id;
        }
    }

 
    public function deleting(Publicacion $publicacione)
    {
        if($publicacione->imagenes){
            Storage::delete($publicacione->imagenes->url);
        }
    }

 
}
