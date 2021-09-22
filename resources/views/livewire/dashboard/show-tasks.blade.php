<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-4 lg:flex justify-between text-center items-center">
            <div class="flex justify-center items-center pl-2">
                @foreach($users as $user)
                <label for="search_by_user_{{$user->id}}">
                    <input type="checkbox" class="hidden" id="search_by_user_{{$user->id}}" wire:model="selectedUser" value="{{$user->id}}">
                    <span  class="relative flex items-center border  rounded-full mr-1 @if( in_array($user->id, $selectedUser) ) border-blue-900 @else border-gray-300 @endif">
                        <span class="absolute -top-1 -left-1 w-4 h-4 bg-blue-400 font-light text-xs text-white rounded-full">{{ $user->activeTasks->count() }}</span>
                        <img class="rounded-full w-8 h-8 object-cover" src="{{ $user->profile_photo_url }}"  alt=""/>
                    </span>
                </label>
                @endforeach
            </div>
            <div>
                <label for="unasiggnedUsers">
                    <input type="checkbox" class="hidden" id="unasiggnedUsers" wire:model="unasiggnedUsers" value="1">
                    <span class="inline-flex px-2 py-1 h-10 text-xs font-bold items-center leading-none text-black border rounded-full @if( $unasiggnedUsers == "1" ) border-blue-900 @else border-gray-300 @endif">Unasiggned Tasks</span>
                </label>
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
                <x-form.select :options="$taskStatuses" :firstValue="'All Tasks'" wire:model="selectedTaskStatus" :selected="''" />
            </div>
        </div>
    </div>
    <div class="bg-white overflow-hidden shadow-xl">
        <main class="h-full w-full flex flex-col justify-center py-2 items-center lg:items-baseline lg:flex-row lg:justify-around">

            @if(count($tasks) === 0)
                <div class="mx-auto w-full text-center justify-center flex flex-col items-center pt-10 pb-10">
                    <span>Task not found.</span>
                    <div class="bg-red-700 rounded-full w-40 px-4 py-2 text-white mt-3 cursor-pointer" wire:click="resetFilters">Clear all filters.</div>
                </div>
            @else

                <div class="lg:flex lg:flex-col flex-row w-full md:w-72 lg:w-72 rounded-lg h-full border">
                    <h3 class="pt-3 pb-1 text-md font-medium bg-red-200 text-gray-700 text-center">Backlog</h3>
                    <div class="flex-1 min-h-0">
                        <ul class="pt-1 pb-3 px-3">
                            @isset($tasks[""])
                                @foreach($tasks[""] as $task)
                                    <x-dashboard.task :task="$task" />
                                @endforeach
                            @else
                                <div class="px-4 text-center">not found.</div>
                            @endisset
                        </ul>
                    </div>
                </div>

                @foreach($taskGroups as $key => $group)
                    <div class="lg:flex lg:flex-col flex-row w-full md:w-72 lg:w-72 rounded-lg h-full border">
                        <h3 class="pt-3 pb-1 text-md font-medium bg-{{ $group->color }}-200 text-gray-700 text-center">{{ $group->name }}</h3>
                        <div class="flex-1 min-h-0">
                            <ul class="pt-1 pb-3 px-3">
                                @isset($tasks[$group->id])
                                    @foreach($tasks[$group->id] as $task)
                                        <x-dashboard.task :task="$task" />
                                    @endforeach
                                @else
                                    <div class="px-4 text-center">not found.</div>
                                @endisset
                            </ul>
                        </div>
                    </div>
                @endforeach
            @endif
        </main>
    </div>
</div>
