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

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white rounded-md p-6 ">
            <form method='post' action="{{ route('addCategorie') }}">
                @csrf
                @method('POST')
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Nouveau Poste</h2>

                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-4">
                                <label for="username"
                                    class="block text-sm font-medium leading-6 text-gray-900">Titre</label>
                                <div class="mt-2">
                                    <div
                                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">

                                        <input type="text" name="title" id="username" autocomplete="username"
                                            class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                            placeholder="Nom du post">
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-full">
                                <label for="about"
                                    class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                                <div class="mt-2">
                                    <textarea id="about" name="description" rows="3"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 resize-none"></textarea>
                                </div>
                            </div>

                            <div class="col-span-full">
                                <label for="photo"
                                    class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
                                <div
                                    class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                    <div class="text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                            <label for="file-upload"
                                                class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                                <span>Upload a file</span>
                                                <input id="file-upload" name="picture" type="file" class="sr-only">
                                            </label>
                                            <p class="pl-1"> or drag and drop</p>
                                        </div>
                                        <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <a href="{{ route('categories') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>

                    <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>
            </form>
        </div>

    </div>
    </div>
</x-app-layout>
