<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('profile') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 flex gap-4">
            <div class="w-1/3 flex flex-col">
                <img class="block rounded-xl" src="{{ $user->profile_photo_url }}" alt="{{
                Auth::user()
                ->name }}">
                <p>{{ Auth::user()->name }}</p>

                <div>
                    <h2 class="font-bold text-lg">Solicitud de amistad</h2>
                    @foreach($pending as $friend)
                        @if($friend->recipient_id === Auth::id())
                            <form action="{{route('acceptFriend')}}" method="post">
                                @csrf
                                <input type="hidden" name="friend"
                                       value="{{$friend->sender_id}}">
                                <x-jet-button class="bg-blue-600">Aceptar {{$users->where('id',
                            $friend->sender_id)
                            ->first()->username
                            }}</x-jet-button>
                            </form>

                            <x-jet-button class="bg-red-900">Denegar {{$users->where('id',
                            $friend->sender_id)
                            ->first()->username
                            }}</x-jet-button>

                        @endif

                        @if($friend->sender_id === Auth::id())
                            <form>
                                @csrf
                                <input type="hidden" name="friend"
                                       value="{{$friend->recipient_id}}">
                                <x-jet-button>Cancelar Solicitud {{$users->where('id',
                            $friend->recipient_id)
                            ->first()->username
                            }}</x-jet-button>

                            </form>

                        @endif

                    @endforeach


                </div>
            </div>

            <div class="flex flex-col gap-4">
                @foreach($images as $image)

                    <div>
                        <img class="rounded-xl" src="{{asset('images_rrss/'. $image->image_path)}}"
                             alt=""/>
                    </div>

                @endforeach
            </div>


        </div>
    </div>
</x-app-layout>
