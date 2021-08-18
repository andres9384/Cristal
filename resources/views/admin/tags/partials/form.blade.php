<div class="form-group">
    {!! Form::label("nombre","Nombre:")  !!}
    {!! Form::text("nombre",null ,["class"=>"form-control","placeholder"=>"Ingrese el nombre de la etiqueta"])  !!}
 @error('nombre')
    <small class="text-danger">{{$message}}</small>
@enderror
</div>



<div class="form-group">
    {!! Form::label("ficha","Ficha:")  !!}
    {!! Form::text("ficha",null ,["class"=>"form-control","placeholder"=>"Ingrese la ficha de la etiqueta","readonly"])  !!}
    @error('ficha')
<small class="text-danger">{{$message}}</small>
@enderror
</div>



<div class="form-group">
    {!! Form::label("color","Color: ") !!}
    {!! Form::select("color", $colors, null , ["class"=>"form-control"]) !!}
@error('color')
<small class="text-danger">{{$message}}</small>
@enderror
</div>