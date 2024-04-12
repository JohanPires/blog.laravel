<x-header />

<div class="categories flex justify-center gap-2">
    <a href="{{ '/' }}">Tous</a>
    @foreach ($categories as $categorie)
        <a href="{{ '/?categories=' . $categorie->title }}">{{ $categorie->title }}</a>
    @endforeach
</div>
{{-- <div class="categories flex justify-center gap-2">
    <a href="/?categories=web">Web</a>
    <a href="/?categories=tech">Tech</a>
    <a href="/?categories=marketing">Marketing</a>
</div> --}}
{{-- <div class="categories flex justify-center gap-2">
    <select name="categories" id="">
        <option value="all">Toute les catégories</option>
        @foreach ($categories as $categorie)
            <option value="{{ $categorie->title }}">{{ $categorie->title }}</option>
        @endforeach
    </select>
</div> --}}
@if (count($posts) > 0)
    <div class="post-container flex flex-col gap-6 ">
        @foreach ($posts as $post)
            <div class="post bg-white rounded-md p-6 mb-6 flex justify-between gap-6 ">
                <div class="flex flex-col ">
                    <div>
                        <h2>{{ $post->title }}</h2>
                        <p>{{ $post->description }}</p>
                    </div>
                    <div class="flex gap-4">
                        @if (Auth::user())
                            @if (Auth::user()->role === 'admin')
                                <form action="{{ route('deletePost', ['id' => $post->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type='submit'>Supprimer</button>
                                </form>
                                <a href='{{ route('formPost', ['id' => $post->id]) }}'>Modifier</a>
                            @endif
                        @endif
                    </div>

                </div>
                <img src="{{ asset('images/' . $post->picture) }}" alt="" class="w-64 h-64 object-cover">
            </div>
        @endforeach
    </div>
@endif

<x-footer />
