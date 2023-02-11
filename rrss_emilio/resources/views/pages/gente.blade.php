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
            <div class="my-8">
                <ul class="flex items-center gap-6">
                    <li><img class="w-14 h-14 object-cover rounded-full" src="{{asset('storage/'
                    .$user->profile_photo_path)}}"
                             alt="foto"></li>
                    <li class="font-bold">{{$user->name}}</li>
                    <li class="italic"> {{'@' . $user->username}}</li>
                    <li><a href="{{route('viewUser', ['user_id' => $user->id])}}">Ver
                            perfil</a></li>
                </ul>
            </div>
        @endforeach

    </div>






</x-app-layout>
