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
                        <div class="post bg-white rounded-md p-6 mb-6 flex gap-6 justify-between">
                            <div class="flex flex-col justify-between">
                                <div>
                                    <h2>{{ $post->title }}</h2>
                                    <p>{{ $post->description }}</p>
                                </div>
                                <div class="flex gap-4">
                                    {{-- @dd(Auth::user()->id); --}}
                                    @if ($post->author == Auth::user()->id)
                                        <form action="{{ route('deletePost', ['id' => $post->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type='submit'>Supprimer</button>
                                        </form>
                                        <a href='{{ route('formPost', ['id' => $post->id]) }}'>Modifier</a>
                                    @endif
                                </div>

                            </div>
                            <img src="{{ asset('images/' . $post->picture) }}" alt=""
                                class="w-64 h-64 object-cover">
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
