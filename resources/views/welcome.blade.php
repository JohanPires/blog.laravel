<x-header />
<div class="categories flex justify-center gap-2">
    <a href="/blog?categories=web">Web</a>
    <a href="/blog?categories=tech">Tech</a>
    <a href="/blog?categories=marketing">Marketing</a>
</div>
@if (count($posts) > 0)
    <div class="post-container flex flex-col">
        @foreach ($posts as $post)
            <div class="post bg-white rounded-md p-6 mt-6">
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->description }}</p>
                <p>{{ $post->content }}</p>
            </div>
        @endforeach
    </div>
@endif

<x-footer />
