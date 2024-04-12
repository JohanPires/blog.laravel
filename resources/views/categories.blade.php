<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Catégories') }}
            </h2>
            <a href="categories/form">Ajouter une catégorie</a>
            {{-- <form action="{{ route() }}" method="post">
                @csrf
                @method('POST')
                <button type="submit">Ajouter une catégorie</button>
            </form> --}}
        </div>
        {{-- <a href="{{ '/categories' }}">Tous</a>
        <div class="categories flex justify-center gap-2">
            @foreach ($categories as $categorie)
                <a href="{{ '/categories?categories=' . $categorie->title }}">{{ $categorie->title }}</a>
            @endforeach
        </div> --}}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($categories as $categorie)
                <div class="post bg-white rounded-md p-6 mt-6 flex justify-between">
                    <h3>Nom de catégorie : {{ $categorie->title }}</h3>
                    {{-- <p>{{ $categorie->description }}</p> --}}
                    {{-- <img src="{{ $categorie->picture }}" alt=""> --}}
                    <form action="{{ route('deleteCategorie', ['id' => $categorie->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type='submit'>Supprimer</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
