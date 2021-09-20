<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="w-full whitespace-nowrap">
                    <thead>
                    <tr>
                        <x-table.column>#</x-table.column>
                        <x-table.column>Name</x-table.column>
                        <x-table.column>E-mail</x-table.column>
                        <x-table.column>Role</x-table.column>
                        <x-table.column>Verified At</x-table.column>
                        <x-table.column>#</x-table.column>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <x-table.column>{{ $user->id }}</x-table.column>
                            <x-table.column>{{ $user->name }}</x-table.column>
                            <x-table.column>{{ $user->email }}</x-table.column>
                            <x-table.column class="text-center">
                                @foreach($user->roles as $role)
                                    <x-badge>{{ $role->name }}</x-badge>
                                @endforeach
                            </x-table.column>
                            <x-table.column>{{ $user->email_verified_at->format('d.m.Y') }}</x-table.column>
                            <x-table.column>
                                <a href="{{ route('admin.users.edit' , $user->id) }}" class="bg-indigo-500 text-white py-2 px-4 rounded mr-2">Edit</a>
                            </x-table.column>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
