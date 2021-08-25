<?php

namespace App\Policies;

use App\Models\Publicacion;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PublicacionPolicy
{
    use HandlesAuthorization;

    public function author(User $user, Publicacion $post){
        if($user->id == $post->id_usuario){
            return true;
        }else{
            return false;
        }
        
    }
    public function published(?User $user, Publicacion $post )
    {
        if($post->estados==2){
            return true;
        }else{
            return false;
        }
    }
}
