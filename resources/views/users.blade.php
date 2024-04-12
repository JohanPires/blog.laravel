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
                    <div class="post bg-white rounded-md p-6 mb-6 flex gap-4">
                        <div>
                            <h3>Nom : {{ $user->name }}</h3>
                            <p>Email : {{ $user->email }}</p>
                            <p><?php if ($user->role === null): ?>
                                Role : Client
                                <?php else: ?>
                                Role : Admin
                                <?php endif; ?>
                            </p>
                        </div>
                        <form action="{{ route('changeRole', ['id' => $user->id, 'role' => $user->role]) }}"
                            method="post" class="flex align-middle">
                            @csrf
                            @method('PUT')
                            <select name="role" type='submit' id="edit-role" class="mr-4 h-10 self-center">
                                <option @if ($user->role === 'admin') selected @endif value="admin">Admin</option>
                                <option @if ($user->role === null) selected @endif value="{{ null }}">
                                    Client</option>
                            </select>
                            <button type="submit">Valider</button>

                        </form>
                        <form action="{{ route('deleteUser', ['id' => $user->id]) }}" class="flex align-middle"
                            method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
