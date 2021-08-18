@extends('adminlte::page')

@section('title', 'Cristal')

@section('content_header')
    <h1>Editar Etiqueta</h1>
    <h1>
       
       {{-- {{$etiqueta->nombre}}
        {{$perro}} --}}
      </h1>
@stop



@section('content')
@if (session("info"))
<div class="alert alert-success">
    <strong>{{session("info")}}</strong>
</div>
@endif
    <div class="card">
        <div class="card-body">
        
            {!! Form::model($etiqueta,["route"=>["admin.tags.update",$etiqueta], "method" => "put"] ) !!}

            @include('admin.tags.partials.form')
            {!! Form::submit("Editar Tarjeta", ["class"=>"btn btn-info "]) !!}
            {!! Form::close() !!}
        </div>
       
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{asset("vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js")}}"></script>
    <script>
        $(document).ready( function() {
  $("#nombre").stringToSlug({
    setEvents: 'keyup keydown blur',
    getPut: '#ficha',
    space: '-'
  });
});
    </script>
    
@endsection