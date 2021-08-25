<div>
    
    
        
   
   <div class="card">
       <div class="card-header">
        <input wire:model="search" type="text" class="form-control" placeholder="Ingrese el Nombre o Correo de un Usuario">
    </div>
    @if ($users->count())
       <div class="card-body">
           <table class="table table-striped">
               <thead>
                   <tr>
                       <th>Id</th>
                       <th>Nombre</th>
                       <th>Email</th>
                       <th></th>
                   </tr>
               </thead>
               <tbody>
                   @foreach ($users as $user)
                       <tr>
                           <td>{{$user->id}}</td>
                           <td>{{$user->name}}</td>
                           <td>{{$user->email}}</td>
                           <td width="10px">
                               <a class="btn btn-primary" href="{{route("admin.users.edit",$user)}}">Editar</a>
                           </td>
                       </tr>
                   @endforeach
               </tbody>
           </table>
       </div>
       <div class="card-footer">
           {{$users->links()}}
       </div>           
       @else
       <div class="card-body">
           <Strong>No hay registros</Strong></div>    
        @endif
   </div>
</div>
