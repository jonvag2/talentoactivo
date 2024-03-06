<x-app-layout>
    <div class="container py-8 px-6 gap-6">
        <h1 class="text-4xl font-bold text-gray-500">{{$post->name}}</h1>

        <div class="container px-3 text-lg text-gray-500 mb-2 ">

            {!!$post->extract!!}
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 ">
            <div class="pr-4 md:col-span-2 bg-white rounded-b rounded-t-none overflow-hidden shadow-lg">
                <figure class="pt-4">
                    @if ($post->image)
                        <img class="w-full h-full object-cover object-center" src="{{Storage::url($post->image->url)}}" alt="">
        
                     @else
                        <img class="w-full h-80 object-cover object-center" src="https://cdn.pixabay.com/photo/2022/11/29/14/16/sheep-7624635_960_720.jpg" alt="">
        
                    @endif
                </figure>
                <div class="container w-full pb-2 px-0 text-base text-left text-gray-500 mt-4">
                    {{-- {!!$post->body!!} --}}

                    @if ($post->image)
                    {{-- {{$post}} --}}
                    <br>
                    {{Storage::url($post->image->url)}}
        
                    @endif
                </div>

            </div>
            <aside class="ml-4 pl-4  bg-white border-2 rounded-b rounded-t-none overflow-hidden shadow-inner">
                <h1 class="text-2xl font-bold text-gray-500 mb-4">Mas en {{$post->category->name}}{{-- este category es la relacion de los modelos post y category --}}</h1>
                <ul>
                    @foreach ($similares as $similar)
                    <a href="{{route('posts.show', $similar)}}">

                        <li class="flex mb-8">
                                <div class="w-full h-full py-2 ">
                                    @if ($similar->image)
                                        <img class="{{-- w-24 h-20 object-cover object-center --}}" src="{{Storage::url($similar->image->url)}}" alt="">
            
                                    @else
                                        <img class="{{-- w-24 h-20 object-cover object-center --}}" src="https://cdn.pixabay.com/photo/2022/11/29/14/16/sheep-7624635_960_720.jpg" alt="">
                        
                                    @endif
                                </div>
                                <div class="w-full h-full px-1 pb-1">
                                    <p class="font-bold cortar-caracter1">{{-- cortar-caracter1 e una clase para evitar mostrar todo el texto, esta declarada en VIEWS/LAYOUTS/app.blade --}}
                                        {!!$similar->name!!}
                                    </p>
                                    <p class="jonapis cortar-caracter2">
                                        {!!$similar->extract!!}
                                    </p>
                                </div>
                        </li>
                    </a>

                    @endforeach
                </ul>
            </aside>

        </div>
    </div>
</x-app-layout>