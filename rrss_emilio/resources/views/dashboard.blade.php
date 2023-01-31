<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-2">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3">
                <ul>
                    <li><a href="{{route('form-upload-image')}}">Subir imagen</a></li>
                </ul>
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3">
                @foreach($images as $image)
                    {{$image->user->name}}
                    {{$image->description}} <br>
                    <img src="{{asset('images_rrss/'. $image->image_path)}}" alt=""/>

                    <p>{{ $carbon->parse($image->created_at)->longAbsoluteDiffForHumans()}}</p>

                <div>


                    <p>Número de comentarios: {{count($image->comments)}}
                        <a href="{{route('show_image', ['image_id' => $image->id])}}">Ver
                            comentarios</a>

                    </p>


                </div>

                    <form method="POST" action="{{route('saveComment')}}">
                        @csrf
                        <div>
                            <x-jet-label for="comment" value="{{ __('Comentario') }}"/>
                            <textarea name="comment" id="comment" cols="30" rows="10"
                                      class="block w-full"></textarea>
                            <input type="hidden" name="user_id" value="{{$image->user_id}}">
                            <input type="hidden" name="image_id" value="{{$image->id}}">
                        </div>


                        <div class="flex items-center justify-end mt-4">

                            <x-jet-button class="ml-4">
                                {{ __('Subir comentario') }}
                            </x-jet-button>
                        </div>

                    </form>

                @endforeach
            </div>
            {{$images->links()}}


        </div>
    </div>
</x-app-layout>
