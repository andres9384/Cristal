@extends('adminlte::page')

@section('title', 'Cristal')

@section('content_header')
    <h1>Crear Categoria</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(["route"=>"admin.categories.store"]) !!}

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
            {!! Form::submit("Crear Categoria",["class"=>"btn btn-primary"]) !!}
            {!! Form::close() !!}
        </div>
    </div>
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
