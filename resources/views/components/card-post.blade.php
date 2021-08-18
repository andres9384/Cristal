@props(["publicaciones"])

<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
    @if ($publicaciones -> imagenes)
    <img class="w-full h-72 object-cover object-center" src="{{"http://127.0.0.1:8000/storage/".($publicaciones->imagenes->url) }}" alt=""> 
    @else
    <img class="w-full h-72 object-cover object-center" src="https://cdn.pixabay.com/photo/2016/12/05/11/39/fox-1883658_960_720.jpg" alt="">  
    @endif  
        
        <div class="px-6 py-4">
            <h1 class="font-bold text-xl mb-2">
                <a href="{{route("post.show",$publicaciones)}}">{{$publicaciones->nombre}}</a>
            </h1>
            <div class="text-gray-700 text-base">
                {!!$publicaciones->extracto!!}
            </div>
        </div>
        <div class="px-6 pt-4 pb-2">
            @foreach($publicaciones->etiquetasbla as $etiquetas)
                <a href="{{route("post.tag",$etiquetas)}}" class="inline-block bg-gray-200 rounded-full px-3 py-1  text-sm text-gray-700 mr-2">{{$etiquetas->nombre}}</a>
            @endforeach
        </div>
    </article>