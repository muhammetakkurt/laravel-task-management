<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl">
                <main class="h-full flex justify-around px-4">
                    @foreach($taskGroups as $key => $group)
                    <div class="flex flex-col w-72 rounded-lg">
                        <h3 class="px-3 pt-3 pb-1 text-md font-medium text-gray-700 leading-tight">{{ $key }}</h3>
                        <div class="flex-1 min-h-0">
                            <ul class="pt-1 pb-3 px-3">
                                @foreach($group as $task)
                                    <x-dashboard.task :task="$task" />
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </main>
            </div>
        </div>
    </div>
</x-app-layout>
