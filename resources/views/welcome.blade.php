<x-header />
<div class="categories flex justify-center gap-2">
    <a href="{{ '/' }}">Tous</a>
    @foreach ($categories as $categorie)
        <a href="{{ '/?categories=' . $categorie->id }}">{{ $categorie->title }}</a>
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
    <div class="post-container flex flex-col">
        @foreach ($posts as $post)
            <div class="post bg-white rounded-md p-6 mt-6 shadow-lg shadow-black">
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->description }}</p>
                <img src="{{ $post->picture }}" alt="">
            </div>
        @endforeach
    </div>
@endif

<x-footer />
