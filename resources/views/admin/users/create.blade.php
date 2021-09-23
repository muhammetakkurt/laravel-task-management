<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create user.') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg grid py-8 px-6 px-2 text-sm md:grid-cols-3">
                <form method="POST" action="{{route('admin.users.store')}}">
                    @csrf
                    <div class="col-span-5 pb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('name') }}" />
                        @error('name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-5 pb-3">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('email') }}" />
                        @error('email')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-5 pb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('email') }}" />
                        @error('password')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-5 flex flex-col pb-3">
                        @foreach($roles as $key => $role)
                            <label for="{{ $role->name }}">
                                <input type="checkbox" name="roles[{{$role->guard_name}}][{{$role->id}}]" id="{{ $role->name }}" value="{{ $role->name }}" />
                                {{ $role->name }}
                                {{ 'guard:'.$role->guard_name }}
                                @foreach($role->permissions as $permission)
                                    [{{ $permission->name }}-{{ $permission->guard_name }}]
                                @endforeach
                            </label>
                        @endforeach
                    </div>

                    <div class="col-span-5">
                        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Save
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    </div>
</x-app-layout>
