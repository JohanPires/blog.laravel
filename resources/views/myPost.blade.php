<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (count($posts) > 0)
                <div class="post-container flex flex-col">
                    @foreach ($posts as $post)
                        @if ($post->author === Auth::user()->name)
                            <div class="post bg-white rounded-md p-6 mb-6">
                                <h2>{{ $post->title }}</h2>
                                <p>{{ $post->description }}</p>
                                <img src="{{ $post->picture }}" alt="">
                                <form action="{{ route('deletePost', ['id' => $post->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type='submit'>Supprimer</button>
                                </form>
                                <a href='{{ route('formPost', ['id' => $post->id]) }}'>Modifier</a>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
