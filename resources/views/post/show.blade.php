<x-app-layout>
    <div class="container py-8">
        <h1 class="text-4xl font-bold text-gray-600">{{$publicacion->nombre}}</h1>
        <div class="text-lg text-gray-500 mb-2">
            {!!$publicacion->extracto!!}
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Contenido Principal -->
            <div class="lg:col-span-2">
                <figure>
                    @if ($publicacion->imagenes)
                    <img class="w-full h-80 object-cover object-center" src=" {{"http://127.0.0.1:8000/storage/".($publicacion->imagenes->url) }} " alt="">
                    @else
                    <img class="w-full h-80 object-cover object-center" src=" https://cdn.pixabay.com/photo/2016/12/05/11/39/fox-1883658_960_720.jpg " alt="">
                    @endif
                    
                </figure>
                <div class="text-base text-gray-500 mt-4">
                    {!!$publicacion->cuerpo!!}
                </div>
            </div>

            <!-- Contenido Relacionado -->
            <aside>
                <h1 class="text-2xl font-bold text-gray-600 mb-4">Contenido Relacionado
                    @foreach($nombre_categoria as $categoria)
                    {{$categoria->nombre}}
                    @endforeach
                </h1>

                <ul>
                    @foreach($similar as $relacionado)

                    <li class="mb-4"> 
                        <a class="flex" href="{{route("post.show",$relacionado->id)}}">
                            @if ($relacionado->imagenes)
                            <img class="w-36 h-20 object-cover object-center" src="{{"http://127.0.0.1:8000/storage/".($relacionado->imagenes->url) }}" alt="">
                            @else
                            <img class="w-30 h-20 object-cover object-center" src="https://cdn.pixabay.com/photo/2016/12/05/11/39/fox-1883658_960_720.jpg" alt="">
                            @endif
                           
                            <span class="ml-2 text-gray-600">{{$relacionado->nombre}}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>
</x-app-layout>