<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subir imagen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-3">
                    <form method="POST" action="{{ route('saveImage') }}"
                          enctype="multipart/form-data">
                        @csrf

                        <div>
                            <x-jet-label for="image" value="{{ __('Imagen') }}"/>
                            <x-jet-input id="image" class="block mt-1 w-full" type="file"
                                         name="image"
                                         :value="old('image')" required autofocus
                                         autocomplete="image"/>
                        </div>
                        <div>
                            <x-jet-label for="description" value="{{ __('Descripción') }}"/>
                            <x-jet-input id="description" class="block mt-1 w-full" type="text"
                                         name="description"
                                         :value="old('description')" required autofocus
                                         autocomplete="description"/>
                        </div>

                        <div class="flex items-center justify-end mt-4">

                            <x-jet-button class="ml-4">
                                {{ __('Subir Imagen') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
