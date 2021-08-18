<x-app-layout>

<div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
    <h1 class="uppercase text-center text-3xl font-bold">categoria: {{$category->nombre}}</h1>
    @foreach($publicacion as $publicaciones)
    <x-card-post :publicaciones=$publicaciones />
    @endforeach
    <div class="mt-4">
        {{$publicacion->links()}}
    </div>
    </div>
</x-app-layout>