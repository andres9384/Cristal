@extends('adminlte::page')

@section('title', 'Cristal')

@section('content_header')

@can('admin.tags.create')
<a href="{{route("admin.tags.create")}}" class="btn btn-success btn-sm float-right">Crear Etiqueta</a>
@endcan    
<h1>Lista de Etiquetas</h1>
@stop

@section('content')
@if (session("info"))
<div class="alert alert-success">
    <strong>{{session("info")}}</strong>
</div>
@endif
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th colspan="2"></th>
                </thead>
                <tbody>
                    @foreach ( $tags as $etiqueta)
                        <tr>
                            <td>{{$etiqueta->id}}</td>
                            <td>{{$etiqueta->nombre}}</td>
                            <td width="10px">
                            @can('admin.tags.edit')
                                <a  class="btn btn-primary btn-sm" href="{{route("admin.tags.edit",$etiqueta)}}">Editar</a>
                            @endcan
                            </td>
                            <td width="10px">
                            @can('admin.tags.destroy')
                                <form action="{{route("admin.tags.destroy",$etiqueta)}}" method="post">
                                    @csrf
                                    @method("delete")
                                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
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

