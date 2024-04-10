<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Utilisateurs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="post-container flex flex-col">
                @foreach ($users as $user)
                    <div class="post bg-white rounded-md p-6 mb-6">
                        <h3>{{ $user->name }}</h3>
                        <p>{{ $user->email }}</p>
                        <p><?php if ($user->role === null): ?>
                            Client
                            <?php else: ?>
                            Admin
                            <?php endif; ?>
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
