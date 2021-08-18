 {{-- nombre --}}
 <div class="form-group">

    {!! Form::label("nombre", "Nombre") !!}
    {!! Form::text("nombre", null , ["class"=>"form-control","placeholder"=>"Ingrese el nombre de la Publicación "]) !!}

    @error('nombre')
    <small class="text-danger">{{$message}}</small>
    @enderror

</div>

 {{-- ficha --}}
<div class="form-group">

    {!! Form::label("ficha", "Ficha") !!}
    {!! Form::text("ficha", null , ["class"=>"form-control","placeholder"=>"Ingrese la ficha de la Publicación ","readonly"]) !!}

    @error('ficha')
    <small class="text-danger">{{$message}}</small>
    @enderror
</div>

 {{-- categoria --}}
<div class="form-group">

    {!! Form::label("categoria", "Categoria ") !!}
    {!! Form::select("id_categoria", $categorias, null, ["class"=>"form-control"]) !!}
   
    @error('id_categoria')
    <small class="text-danger">{{$message}}</small>
    @enderror
</div>

 {{-- etiquetas --}}
<div class="form-group">
    <p class="font-weight-bold">Etiquetas</p>
    @foreach ($etiquetas as $etiqueta)

        <label class="mr-2">
            {!! Form::checkbox("etiqueta[]", $etiqueta->id, null) !!}
            {{$etiqueta->nombre}}
        </label>
        
    @endforeach  
        
    @error('etiquetas')
    <br>
    <small class="text-danger">{{$message}}</small>
    @enderror

</div>

 {{-- estados --}}
<div class="form-group">
    <p class="font-weight-bold">Estado</p>
    <label for="">
        {!! Form::radio("estados", 1, True) !!}
    Borrador
    </label>
    <label for="">
        {!! Form::radio("estados", 2, True) !!}
        Publicado
    </label>
    @error('estados')
    <br>
    <small class="text-danger">{{$message}}</small>
    @enderror
</div>

{{-- imagen --}}
<div class="row mb-3">
    <div class="col">
      <div class="image-wrapper">
          @isset ($publicacione->imagenes)
          <img  id="picture1" src="{{"http://127.0.0.1:8000/storage/".($publicacione->imagenes->url)}}" alt="">
          {{-- <img  id="picture1" src="{{Storage::url($publicacione->imagenes->url)}}" alt=""> --}}
          @else
          <img  id="picture1" src="https://cdn.pixabay.com/photo/2016/12/05/11/39/fox-1883658_960_720.jpg" alt="">    
          @endif
      </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label("file", "Imagen de la Publicación") !!}
            {!! Form::file("file", ["class"=>"form-contro-file","accept"=>"image/*"]) !!}
            @error('file')
            <br>
            <span class="text-danger">{{$message}} </span>
        @enderror
        </div>
        
       <P> Solo Imagenes Pdf no joda si escoge otro tipo de imagen se carga el sistema </P>
    </div>
</div>

 {{-- extracto --}}
<div class="form-group">

    {!! Form::label("extracto", "Extracto", ) !!}
    {!! Form::textarea("extracto", null, ["class"=> "form-control"]) !!}

    @error('extracto')
    <small class="text-danger">{{$message}}</small>
    @enderror
</div>

{{-- cuerpo --}}
<div class="form-group">

    {!! Form::label("cuerpo", "Contenido de la publicación", ) !!}
    {!! Form::textarea("cuerpo", null, ["class"=> "form-control"]) !!}

    @error('cuerpo')
    <small class="text-danger">{{$message}}</small>
    @enderror

</div>