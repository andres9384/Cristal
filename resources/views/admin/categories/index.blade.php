@extends('adminlte::page')

@section('title', 'Cristal')

@section('content_header')
@can('admin.categories.create')
<a class="btn btn-success btn-sm float-right" href="{{route("admin.categories.create")}}">Agregar Categoria</a>
@endcan

    <h1>Lista de Categorias</h1>
@stop

@section('content')
@if (session("info"))
    <div class="alert alert-danger">
        <strong>{{session("info")}}</strong>
    </div>
@endif
    <div class="card">
       
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
                   @foreach ($categorias as $categoria)
                       <tr>
                           <td>{{$categoria->id}}</td>
                           <td>{{$categoria->nombre}}</td>
                   
                           <td width="10px">
                                       @can('admin.categories.edit')
                               <a class="btn btn-primary btn-sm" href="{{route("admin.categories.edit",$categoria)}}">Editar</a>
                             @endcan
                            </td>
                         
                           <td width="10px">
                            @can('admin.categories.destroy')
                                   
                              
                               <form action="{{route("admin.categories.destroy", $categoria)}}" method="POST">
                                @csrf
                                @method("delete")
                                <button type="submit" class="btn btn-danger btn-sm" >Eliminar</button>
                                </form>
                                @endcan
                           </td>
                       </tr>
                   @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop