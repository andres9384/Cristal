@extends('adminlte::page')

@section('title', 'Cristal')

@section('content_header')
<a href="{{route("admin.rol.create")}}" class="btn btn-sm btn-success float-right">Nuevo Rol</a>
    <h1>Lista de Roles</h1>
@stop

@section('content')
@if (session("info"))
    <div class="alert alert-success">
        {{session("info")}}
    </div>
@endif
<div class="card">
    <div class="card-body">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Roles</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $rol)
                <tr>
                    <td>{{$rol->id}}</td>
                    <td>{{$rol->name}}</td>
                    <td width="10px"><a href="{{route("admin.rol.edit",$rol)}}" class="btn btn-primary btn-sm">Editar</a></td>
                    <td width="10px"><form action="{{route("admin.rol.destroy",$rol)}}" method="post">
                        @csrf
                        @method("delete")
                        <button type="submit" class="btn btn-sm btn-danger" > Eliminar</button></form></td>
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