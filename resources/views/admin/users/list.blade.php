<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users') }}
            </h2>
            <x-form.button :classes="'bg-green-500 text-white'"  :route="route('admin.users.create')" :name="'+ New User'" />
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="w-full whitespace-nowrap">
                    <thead>
                    <tr>
                        <x-table.column :class="'text-center'">#</x-table.column>
                        <x-table.column :class="'text-center'">Name</x-table.column>
                        <x-table.column :class="'text-center'">E-mail</x-table.column>
                        <x-table.column :class="'text-center'">Active Tasks</x-table.column>
                        <x-table.column :class="'text-center'">Role</x-table.column>
                        <x-table.column :class="'text-center'">Verified At</x-table.column>
                        <x-table.column :class="'text-center'">#</x-table.column>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <x-table.column>{{ $user->id }}</x-table.column>
                            <x-table.column>{{ $user->name }}</x-table.column>
                            <x-table.column>{{ $user->email }}</x-table.column>
                            <x-table.column :class="'text-center'">{{ $user->active_tasks_count }}</x-table.column>
                            <x-table.column :class="'text-center'">
                                <div class="flex flex-col gap-2 items-center">
                                    @foreach($user->roles as $role)
                                        <x-badge>{{ $role->name }}</x-badge>
                                    @endforeach
                                </div>
                            </x-table.column>
                            <x-table.column>{{ optional($user->email_verified_at)->format('d/m/Y') }}</x-table.column>
                            <x-table.column>
                                <div class="flex justify-center">
                                    <a href="{{ route('admin.users.edit' , $user->id) }}" class="bg-indigo-500 text-white py-2 px-4 rounded mr-2">Edit</a>
                                    <form method="POST" action="{{ route('admin.users.destroy' , $user->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded"><i class="fa fa-trash-alt"></i> Delete</button>
                                    </form>
                                </div>
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
