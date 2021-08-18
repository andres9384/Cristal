@extends('adminlte::page')

@section('title', 'Cristal')

@section('content_header')
<a class="btn btn-success btn-sm float-right" href="{{route("admin.posts.create")}}">Nueva Publicación</a>
    <h1>Lista de Publicaciones</h1>
@stop

@section('content')
    @livewire('admin.post-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop