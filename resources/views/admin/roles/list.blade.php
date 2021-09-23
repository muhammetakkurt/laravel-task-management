<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Roles') }}
            </h2>
            <x-form.button :classes="'bg-green-500 text-white'"  :route="route('admin.roles.create')" :name="'+ New Role'" />
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="w-full whitespace-nowrap">
                    <thead>
                    <tr>
                        <x-table.column :class="'text-center'">#</x-table.column>
                        <x-table.column :class="'text-center'">Guard</x-table.column>
                        <x-table.column :class="'text-center'">Role</x-table.column>
                        <x-table.column :class="'text-center'">Permissions</x-table.column>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <x-table.column :class="'text-center'">{{ $role->id }}</x-table.column>
                            <x-table.column :class="'text-center'">{{ $role->guard_name }}</x-table.column>
                            <x-table.column :class="'text-center'">{{ $role->name }}</x-table.column>
                            <x-table.column :class="'text-center'">
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
