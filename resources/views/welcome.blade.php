<x-header />

<h1 class="text-center text-3xl font-bold">Blog Actu Techo</h1>
<p class="text-center my-5 mx-auto w-1/2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam quo,
    asperiores
    voluptatem
    temporibus expedita
    reiciendis nisi dolorem quam corporis quos quia ad! Asperiores repellat voluptatum consequuntur iusto perspiciatis
    explicabo, temporibus maxime, neque dolor corporis omnis aspernatur ipsam minima ullam eos.</p>

<div class="categories flex flex-col justify-center gap-2">
    <a href="{{ '/' }}">Tous</a>
    @foreach ($categories as $categorie)
        <a href="{{ '/?categories=' . $categorie->id }}">{{ $categorie->title }}</a>
    @endforeach
</div>
<div class="post-container flex flex-wrap gap-6 justify-center">
    @foreach ($posts as $post)
        <div
            class="max-w-60 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 h-full w-full">

            <img class="rounded-t-lg w-full" src="{{ asset('images/' . $post->picture) }}" alt="" />

            <div class="p-5">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                    {{ $post->title }}</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $post->description }}</p>
                <a href="{{ route('showOne', ['id' => $post->id]) }}"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Read more
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        </div>
    @endforeach
</div>

<x-footer />
