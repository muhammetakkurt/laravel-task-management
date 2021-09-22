<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit '.$user->name.' user.') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg grid py-8 px-6 px-2 text-sm md:grid-cols-3">
                <form method="POST" action="{{route('admin.users.update' , $user->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="col-span-5 pb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ $user->name }}" />
                        @error('name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-5 pb-3">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                               value="{{ $user->email }}" />
                        @error('email')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-5 flex flex-col pb-3">
                        @foreach($roles as $key => $role)
                            <label for="{{ $role->name }}">
                                <input type="checkbox" name="roles[{{$role->guard_name}}][{{$role->id}}]" id="{{ $role->name }}" @if($user->hasRole($role->name)) checked @endif value="{{ $role->name }}" />
                                {{ $role->name }}
                                {{ 'guard:'.$role->guard_name }}
                                @foreach($role->permissions as $permission)
                                    [{{ $permission->name }}-{{ $permission->guard_name }}]
                                @endforeach
                            </label>
                        @endforeach
                    </div>

                    <div class="col-span-5">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    </div>
</x-app-layout>
