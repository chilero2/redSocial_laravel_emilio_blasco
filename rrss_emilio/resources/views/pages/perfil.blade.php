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
                <p class="text-2xl underline uppercase font-bold text-center">{{ Auth::user()->name
                }}</p>

                <div>
                    <h2 class="font-bold text-xl underline text-orange-500 mb-4">Amigos</h2>
                    <ul>
                        @foreach($friends as $friend)
                            <li class="capitalize flex items-center gap-4 mb-4">
                                <img class="w-14 h-14 object-cover rounded-full"
                                     src="{{asset('storage/'.$friend->profile_photo_path)}}"
                                     alt="foto">
                                {{$friend->name}}</li>
                        @endforeach
                    </ul>

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
