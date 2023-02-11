<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($user->name) }}
        </h2>
    </x-slot>

    @foreach($images as $image)
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3 flex flex-col">
            <img src="{{asset('images_rrss/'. $image->image_path)}}"
                 alt=""/>
        </div>
    @endforeach

</x-app-layout>
