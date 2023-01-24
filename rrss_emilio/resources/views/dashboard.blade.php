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
                    <li><a href="{{route('form-upload-image')}}">Subir imágen</a></li>
                </ul>
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3">
                @foreach($images as $image)
                    {{$image->user->name . ' ' . $image->user->surname}}
                    {{$image->description}} <br>
                    <img src="{{asset('images_rrss/'. $image->image_path)}}" alt=""/>
                @endforeach
            </div>


        </div>
    </div>
</x-app-layout>
