<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ver comentarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-3">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3">
                        <img src="{{asset('images_rrss/'. $image->image_path)}}" alt=""/>

                        <ul class="list-none">
                            @foreach($image->comments as $comment)
                                <li class="block my-8 p-2 rounded border text-xl">
                                    {{$comment->content}}
                                    <span class="italic text-xs">{{$carbon->parse
                                    ($comment->created_at)
                                    ->longAbsoluteDiffForHumans()}}</span>

                                    @if(Auth::user()->id === $image->user_id)
                                    <form method="POST" action="{{route('deleteComment')}}">
                                        @csrf
                                        @method('DELETE')

                                        <input type="hidden" name="comment_id"
                                               value="{{$comment->id}}">
                                        <input type="hidden" name="image_id"
                                               value="{{$image->id}}">
                                        <button class="border rounded p-1 my-1 text-md"
                                                type="submit">Borrar</button>
                                    </form>
                                    @endif
                                </li>
                            @endforeach
                        </ul>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
