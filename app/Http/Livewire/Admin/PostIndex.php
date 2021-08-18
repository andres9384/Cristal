<?php

namespace App\Http\Livewire\Admin;

use App\Models\Publicacion;
use Livewire\Component;
use Livewire\WithPagination;    

class PostIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;
    public function updatingSearch(){
        $this->resetPage();
    }
    
    public function render()
    {
        $posts = Publicacion::where("id_usuario", auth()->user()->id)
                                ->where("nombre","LIKE","%".$this->search . "%")
                                ->latest("id")
                                ->paginate();

        return view('livewire.admin.post-index',compact("posts"));
    }
}
