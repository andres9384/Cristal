<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" type="text" placeholder="Ingrese en Nombre de la publicación">
    </div>

@if ($posts->count())
    


    <div class="card-body">
        <table class="table table-striped">
            <thead>
                
         <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th colspan="2"></th>
                </tr>

          
               
            </thead>
            <tbody>
              
                @foreach ($posts as $publicacione)
               
                <tr>
                    <td>{{$publicacione->id}}</td>
                    <td>{{$publicacione->nombre}}</td>
                    <td with="10px">
                        <a class="btn btn-primary btn-sm" href="{{route("admin.posts.edit",$publicacione)}}">Editar</a>
                    </td>
                    <td with="10px">
                        <form action="{{route("admin.posts.destroy",$publicacione)}}" method="post">
                        @csrf
                        @method("delete")
                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
                
            @endforeach
               
                
            </tbody>
        </table>
    </div>

    <div class="card-footer">
        {{$posts->links() }}
    </div>
    
        
    @else
        <div class="card-body">
            <strong>No se escontro ningun Registro</strong>
        </div>
    
    @endif
</div>
