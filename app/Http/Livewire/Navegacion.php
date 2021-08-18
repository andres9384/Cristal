<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categorias;
class Navegacion extends Component
{
    public function render()
    {

        $categoria =Categorias::all();
        return view('livewire.navegacion', compact("categoria"));
    }
}
