<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tasks') }}
            </h2>
            @can('create tasks')
                    <x-form.button :classes="'bg-green-500 text-white'" :route="route('tasks.create')" :name="'+ New Task'" />
            @endif
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="w-full whitespace-nowrap">
                    <thead>
                    <tr>
                        <x-table.column :class="'text-center'">Assigned</x-table.column>
                        <x-table.column :class="'text-center'">Title</x-table.column>
                        <x-table.column :class="'text-center'">Content</x-table.column>
                        <x-table.column :class="'text-center'">Velocity</x-table.column>
                        <x-table.column :class="'text-center'">Status</x-table.column>
                        <x-table.column :class="'text-center'">#</x-table.column>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <x-table.column>{{ $task->user->name }}</x-table.column>
                            <x-table.column><a href="{{ route('tasks.edit' , $task->id) }}" class="underline">{{ Str::limit($task->title,40)  }}</a></x-table.column>
                            <x-table.column>{{ Str::limit($task->content,20)  }}</x-table.column>
                            <x-table.column :class="'text-center'">{{ $task->velocity }}</x-table.column>
                            <x-table.column  :class="'text-center'">
                                <x-badge>{{ $task->status->name }}</x-badge>
                            </x-table.column>
                            <x-table.column>
                                <div class="flex justify-center">
                                    @if(auth()->user()->can('edit tasks') || $task->user_id == auth()->user()->id)
                                        <x-form.button :route="route('tasks.edit' , $task->id)" :name="' Edit'" />
                                    @endif
                                    @can('delete tasks')
                                        <form method="POST" action="{{ route('tasks.destroy' , $task->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded"><i class="fa fa-trash-alt"></i> Delete</button>
                                        </form>
                                    @endcan
                                </div>
                            </x-table.column>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $tasks->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
