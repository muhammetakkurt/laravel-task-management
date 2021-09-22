<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <x-form.button :route="route('admin.roles.create')" :name="'+ New Role'" />
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="w-full whitespace-nowrap">
                    <thead>
                    <tr>
                        <x-table.column>#</x-table.column>
                        <x-table.column>Guard</x-table.column>
                        <x-table.column>Role</x-table.column>
                        <x-table.column>Permissions</x-table.column>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <x-table.column>{{ $role->id }}</x-table.column>
                            <x-table.column>{{ $role->guard_name }}</x-table.column>
                            <x-table.column>{{ $role->name }}</x-table.column>
                            <x-table.column>
                                @foreach($role->permissions as $permission)
                                    <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-gray-500 text-white rounded-full color-white">{{ $permission->name }}</span>
                                @endforeach
                            </x-table.column>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
