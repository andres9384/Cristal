<x-app-layout>
    <div class="container py-8 ">
        <div class="grid grid-cols-1 md-grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($publicacion as $publicaciones)
            <article class="w-full h-80 bg-cover bg-center @if($loop->first)md:col-span-2 @endif" style="background-image:url( @if($publicaciones->imagenes) {{"http://127.0.0.1:8000/storage/".($publicaciones->imagenes->url) }} @else https://cdn.pixabay.com/photo/2016/12/05/11/39/fox-1883658_960_720.jpg @endif )">
                {{-- {{
                    // Storage::url($publicaciones->imagenes->url) 
                }}  --}}
                <div class="w-full h-full px-8 flex flex-col justify-center">
                    <div>
                        @foreach($publicaciones->etiquetas as $items)
                        <a href="{{route("post.tag",$items)}}" style="background-color:{{$items->color}}" class="inline-block px-3 h-6  text-white rounded-full">{{$items->nombre}}</a>
                        @endforeach
                    </div>
                    <h1 class="text-4xl text-white leading-8 font-bold mt-2">
                        <a href="{{route("post.show",$publicaciones) }}">{{$publicaciones->nombre}}</a>
                    </h1>
                </div>
            </article>
            @endforeach
        </div>
        <div class="mt-4">
            {{$publicacion->links()}}
        </div>
    </div>
</x-app-layout>