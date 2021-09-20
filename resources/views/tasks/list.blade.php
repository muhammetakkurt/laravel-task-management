<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @can('create tasks')
                <div class="mb-4">
                    <x-form.button :route="'tasks.create'" :color="'indigo'" :name="'+ New Task'" />
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="w-full whitespace-nowrap">
                    <thead>
                    <tr>
                        <x-table.column>Assigned</x-table.column>
                        <x-table.column>Title</x-table.column>
                        <x-table.column>Content</x-table.column>
                        <x-table.column>Velocity</x-table.column>
                        <x-table.column>Status</x-table.column>
                        <x-table.column>#</x-table.column>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <x-table.column>{{ $task->user->name }}</x-table.column>
                            <x-table.column><a href="{{ route('tasks.edit' , $task->id) }}" class="underline">{{ Str::limit($task->title,40)  }}</a></x-table.column>
                            <x-table.column>{{ Str::limit($task->content,20)  }}</x-table.column>
                            <x-table.column>{{ $task->velocity }}</x-table.column>
                            <x-table.column>{{ $task->status }}</x-table.column>
                            <x-table.column>
                                <div class="inline-flex">
                                    @if(auth()->user()->can('edit tasks') || $task->user_id == auth()->user()->id)
                                        <a href="{{ route('tasks.edit' , $task->id) }}" class="bg-indigo-500 text-white py-2 px-4 rounded mr-2"><i class="fa fa-pen"></i> Edit</a>
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
