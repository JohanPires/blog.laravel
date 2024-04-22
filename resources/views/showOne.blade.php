<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="max-w-4xl mx-auto px-4 py-8">
        <h2 class="text-3xl font-bold mb-4">{{ $post->title }}</h2>

        <p class="text-gray-600 text-sm mb-4">Par {{ $user->name }} le {{ $post->created_at->format('d/m/Y') }}</p>

        <img src="{{ asset('images/' . $post->picture) }}" alt="Image du post" class="rounded-lg mb-4">

        <p class="text-lg leading-relaxed mb-4">{{ $post->description }}</p>

        <div class="prose max-w-none">
            {!! $post->content !!}
        </div>

        <a href="{{ route('index') }}"
            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Accueil
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
        </a>
    </div>
</body>

</html>
