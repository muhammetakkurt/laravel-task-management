<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Task Statuses') }}
            </h2>
            <x-form.button :classes="'bg-green-500 text-white'"  :route="route('admin.task-statuses.create')" :name="'+ New Task Status'" />
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
                        <x-table.column :class="'text-center'">Code</x-table.column>
                        <x-table.column :class="'text-center'">Color</x-table.column>
                        <x-table.column :class="'text-center'">Order</x-table.column>
                        <x-table.column :class="'text-center'">#</x-table.column>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($taskStatuses as $taskStatus)
                        <tr>
                            <x-table.column :class="'text-center'">{{ $taskStatus->id }}</x-table.column>
                            <x-table.column :class="'text-center'">{{ $taskStatus->name }}</x-table.column>
                            <x-table.column :class="'text-center'">{{ $taskStatus->code }}</x-table.column>
                            <x-table.column :class="'text-center'">{{ $taskStatus->color }}</x-table.column>
                            <x-table.column :class="'text-center'">{{ $taskStatus->order }}</x-table.column>
                            <x-table.column>
                                <div class="flex justify-center">
                                    <a href="{{ route('admin.task-statuses.edit' , $taskStatus->id) }}" class="bg-indigo-500 text-white py-2 px-4 rounded mr-2">Edit</a>
                                    <form method="POST" action="{{ route('admin.task-statuses.destroy' , $taskStatus->id) }}">
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
                {{ $taskStatuses->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
