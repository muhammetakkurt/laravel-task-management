<li class="mt-3 hover:opacity-70 card" id="card{{$task->id}}"
    taskId="{{$task->id}}"
    draggable="true"
    ondragstart="dragStart(event)">
    <div class="block bg-white p-5 shadow-lg rounded">
        <div class="flex items-baseline justify-between">
            <span class="text-sm font-medium rounded px-2 py-1 bg-{{ $task->status->color }}-400 text-white">{{ $task->status->name }}</span>
            <div class="flex items-center">
                <span class="text-sm font-medium mr-1">{{ $task->velocity}}</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M2 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1H3a1 1 0 01-1-1V4zM8 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1H9a1 1 0 01-1-1V4zM15 3a1 1 0 00-1 1v12a1 1 0 001 1h2a1 1 0 001-1V4a1 1 0 00-1-1h-2z" />
                </svg>
            </div>
        </div>
        <div class="mt-3">
            <a href="{{ route('tasks.edit' , $task->id) }}"><span class="font-medium">{{ Str::limit($task->title,20) }}</span></a>
        </div>
        <div class="mt-3 flex justify-between items-center">
            <span class="flex items-center">
                @if($task->user_id)
                    <img class="rounded-full w-6 h-6 object-cover" src="{{ $task->user->profile_photo_url }}"  alt="{{ $task->user->name }}"/>
                    <span class="text-sm font-light ml-1">{{ $task->user->name }}</span>
                @else
                    <x-badge>Unasiggned</x-badge>
                @endif
            </span>
            <span class="priority text-xs">
                <x-badge> p:{{ $task->priority }}</x-badge>
            </span>
        </div>
    </div>
</li>
