<x-app-layout>


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gente') }}
        </h2>
    </x-slot>

    <form action="{{route('search')}}" method="post" class="m-8">
        @csrf
        <input type="text" name="search" id="search" placeholder="Buscar...">
        <button type="submit">Buscar</button>
    </form>



    <div class="mx-8">
        @foreach($users as $user)
            @if(Auth::user()->id !== $user->id)
            <div class="my-8">
                <ul class="flex items-center gap-6">
                    <li><img class="w-14 h-14 object-cover rounded-full" src="{{asset('storage/'
                    .$user->profile_photo_path)}}"
                             alt="foto"></li>
                    <li class="font-bold">{{$user->name}}</li>
                    <li class="italic"> {{'@' . $user->username}}</li>
                    <li><a href="{{route('viewUser', ['user_id' => $user->id])}}">Ver
                            perfil</a></li>
                    <li>
                        @if(Auth::user()->isFriendWith($user))
                            Amigo
                        @elseif(Auth::user()->hasSentFriendRequestTo($user))
                            Pending...
                        @elseif(Auth::user()->hasFriendRequestFrom($user))
                            <div class="flex gap-4">
                            <form action="{{route('acceptFriend')}}" method="post">
                                @csrf
                                <input type="hidden" value="{{$user->id}}" name="acceptFriend">
                                <button class="bg-blue-700 p-2 text-white rounded-md">Acept
                                </button>
                            </form>
                            <form action="{{route('denyFriend')}}" method="post">
                                @csrf
                                <input type="hidden" value="{{$user->id}}" name="denyFriend">
                                <button class="bg-red-700 p-2 text-white rounded-md">Deny
                                </button>
                            </form>
                            </div>
                        @else
                            <form method="post" action="{{route('sendFriendRequest')}}">
                                @csrf
                                <input type="hidden" value="{{$user->id}}" name="friend">
                                <button class="bg-red-700 p-2 text-white rounded-md">Send friend
                                    request
                                </button>
                            </form>
                        @endif
                    </li>
                </ul>
            </div>
            @endif
        @endforeach

    </div>


</x-app-layout>

