<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Catégories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @for ($i = 0; $i < 5; $i++)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        {{-- {{ __("You're logged in!") }} --}}
                        <x-post />
                        {{-- <x-application-logo class="block h-9 w-auto fill-current text-gray-800" /> --}}
                    </div>
                </div>
            @endfor
        </div>
    </div>
</x-app-layout>
