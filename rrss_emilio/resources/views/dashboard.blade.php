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
                    <img src="{{asset('images_rrss/'. $image->image_path)}}" alt=""
                         data-id="{{$image->id}}"/>

                    <p>{{ $carbon->parse($image->created_at)->longAbsoluteDiffForHumans()}}</p>

                    <div>

                        <div>


                            <svg id="like" data-id="{{$image->id}}"
                                 xmlns="http://www.w3.org/2000/svg"
                                 width="24"
                                 height="24"
                                 fill="currentColor" class="bi bi-balloon-heart"
                                 viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="m8 2.42-.717-.737c-1.13-1.161-3.243-.777-4.01.72-.35.685-.451 1.707.236 3.062C4.16 6.753 5.52 8.32 8 10.042c2.479-1.723 3.839-3.29 4.491-4.577.687-1.355.587-2.377.236-3.061-.767-1.498-2.88-1.882-4.01-.721L8 2.42Zm-.49 8.5c-10.78-7.44-3-13.155.359-10.063.045.041.089.084.132.129.043-.045.087-.088.132-.129 3.36-3.092 11.137 2.624.357 10.063l.235.468a.25.25 0 1 1-.448.224l-.008-.017c.008.11.02.202.037.29.054.27.161.488.419 1.003.288.578.235 1.15.076 1.629-.157.469-.422.867-.588 1.115l-.004.007a.25.25 0 1 1-.416-.278c.168-.252.4-.6.533-1.003.133-.396.163-.824-.049-1.246l-.013-.028c-.24-.48-.38-.758-.448-1.102a3.177 3.177 0 0 1-.052-.45l-.04.08a.25.25 0 1 1-.447-.224l.235-.468ZM6.013 2.06c-.649-.18-1.483.083-1.85.798-.131.258-.245.689-.08 1.335.063.244.414.198.487-.043.21-.697.627-1.447 1.359-1.692.217-.073.304-.337.084-.398Z"/>
                            </svg>
                            <span>{{count($image->likes)}} Likes</span>

                        </div>


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

<script>
    const heart = document.getElementById('like')

    heart.addEventListener('click', () => {
        heart.classList.toggle('stroke-red-700')
        if (!heart.classList.contains('stroke-red-700')) {
            fetch(`http://rrss.emilio.com/dashboard/dislike/${heart.dataset.id}`)
        } else {
            fetch(`http://rrss.emilio.com/dashboard/like/${heart.dataset.id}`)
        }
    })
</script>
