<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-4 lg:flex justify-between text-center items-center">
            <div class="flex justify-center items-center pl-2">
                <span class="mr-2 font-bold text-sm">Assigned</span>
                @foreach($users as $user)
                <label for="search_by_user_{{$user->id}}">
                    <input type="checkbox" class="hidden" id="search_by_user_{{$user->id}}" wire:model="selectedUser" value="{{$user->id}}">
                    <span  class="flex items-center border  rounded-full -ml-1 @if( in_array($user->id, $selectedUser) ) border-blue-900 @else border-gray-300 @endif">
                        <img class="rounded-full w-8 h-8 object-cover" src="{{ $user->profile_photo_url }}"  alt=""/>
                    </span>
                </label>
                @endforeach
            </div>
            <div class="flex justify-center mt-4 px-4 lg:px-0 md:mt-0 lg:mt-0">
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-2 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input wire:model.debounce.400ms="q" name="q" class="rounded-full border w-full focus:outline-none pl-8 h-10" placeholder="Search a task.." autocomplete="off" />
                </div>
            </div>

            <div class="mt-4 md:mt-0  px-4 lg:px-0 lg:mt-0">
                <x-form.select :options="$taskStatuses" :firstValue="'Select task status'" wire:model="selectedStatus" :selected="''" />
            </div>
        </div>
        <div class="bg-white overflow-hidden shadow-xl" wire:init="loadTasks">
            <main class="h-full w-full flex flex-col justify-center items-center lg:items-baseline lg:flex-row lg:justify-around">

                @forelse($taskGroups as $key => $group)
                    <div class="lg:flex lg:flex-col flex-row w-72 rounded-lg">
                        <h3 class="px-3 pt-3 pb-1 text-md font-medium text-gray-700 leading-tight">{{ $key }}</h3>
                        <div class="flex-1 min-h-0">
                            <ul class="pt-1 pb-3 px-3">
                                @foreach($group as $task)
                                    <x-dashboard.task :task="$task" />
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @empty
                    <div class="mx-auto w-full text-center justify-center flex flex-col items-center pt-10 pb-10">
                        <span>There is no tasks for these filters.</span>
                        <div class="bg-red-700 rounded-full w-40 px-4 py-2 text-white mt-3 cursor-pointer" wire:click="resetFilters">Clear all filters.</div>
                    </div>
                @endforelse
            </main>
        </div>
    </div>
</div>
