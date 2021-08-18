@extends('adminlte::page')

@section('title', 'Cristal')

@section('content_header')
    <h1>Edita Categoria</h1>
@stop

@section('content')

    @if (session("info"))
        <div class="alert alert-success">
            <strong>{{session("info")}}</strong>
        </div>
    @endif
<div class="card">
    <div class="card-body">
        {!! Form::model($categoria,["route"=>["admin.categories.update",$categoria],"method"=>"put"]) !!}

        <div class="form-group">
            {!! Form::label("nombre", "Nombre") !!}
            {!! Form::text("nombre", null, ["class"=>"form-control","placeholder"=>"Ingrese el nombre de la categoria"]) !!}


            @error('nombre')
                <span class="text-danger">
                    {{$message}}
                </span>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label("ficha", "Ficha") !!}
            {!! Form::text("ficha", null, ["class"=>"form-control","placeholder"=>"Ingrese la ficha de la categoria","readonly"]) !!}

            @error('ficha')
                <span class="text-danger">
                    {{$message}}
                </span>
            @enderror

        </div>
        {!! Form::submit("Actualizar Categoria",["class"=>"btn btn-primary"]) !!}
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
