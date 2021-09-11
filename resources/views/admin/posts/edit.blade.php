@extends('adminlte::page')

@section('title', 'Cristal')

@section('content_header')
    <h1>editar Publicacion</h1>
@stop

@section('content')
@if (session("info"))
<div class="alert alert-success">
    <strong>{{session("info")}}</strong>
</div>
@endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($publicacione,["route"=>["admin.posts.update",$publicacione], "autocomplete"=>"off","files"=>true,"method"=>"put"]) !!}

            
                @include('admin.posts.partials.form')

            {!! Form::submit("Actualizar Publicación ", ["class"=>"btn btn-primary"]) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
<style>
    .image-wrapper{
        position: relative;
        padding-bottom: 56.25%; 
    }
    .image-wrapper img{
        position: absolute;
        object-fit: cover;
        width: 100%;
        height: 100%;
    }
</style>
@stop

@section('js')
    <script src="{{asset("vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js")}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>
    <script>
        $(document).ready( function() {
  $("#nombre").stringToSlug({
    setEvents: 'keyup keydown blur',
    getPut: '#ficha',
    space: '-'
  });
});


    ClassicEditor
        .create( document.querySelector( '#extracto' ) )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '#cuerpo' ) )
        .catch( error => {
            console.error( error );
        } );



        document.getElementById("file").addEventListener('change', cambiarImagen);
        function cambiarImagen(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture1").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
        }
    </script>
    
@endsection