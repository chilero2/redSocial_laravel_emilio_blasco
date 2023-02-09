<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gente') }}
        </h2>
    </x-slot>

    <form action="" method="post" class="m-8">
        @csrf
        <input type="text" name="search" id="search" placeholder="Buscar...">
        <button type="submit">Buscar</button>
    </form>




    <div class="mx-8">
        @foreach($users as $user)
            <div class="my-8">
                <ul class="flex items-center gap-6">
                    <li><img class="rounded-full" src="{{asset('storage/'.$user->profile_photo_path)}}"
                             alt="foto"></li>
                    <li>Nombre: {{$user->name}}</li>
                    <li>Nick: {{$user->name}}</li>
                    <li><a href="{{}}">Ver pefil</a></li>
                </ul>
            </div>
        @endforeach

    </div>






</x-app-layout>

