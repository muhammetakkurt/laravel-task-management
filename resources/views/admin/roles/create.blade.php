<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg grid py-8 px-6 px-2 text-sm md:grid-cols-3">
                <form method="POST" action="{{route('admin.roles.store')}}">
                    @csrf
                    <div class="md:col-span-5 pb-3">
                        <label for="name">Guard</label>
                        <x-form.select :options="['web'=>'web', 'api'=>'api']" :selected="''"  name="guard_name" id="guard_name" />
                        @error('guard_name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="md:col-span-5 pb-3">
                        <label for="name">Role</label>
                        <input type="text" name="name" id="name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                        @error('name')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-5 pb-3">
                        @foreach($permissions as $permission)
                            <label for="{{ $permission->name }}_{{$permission->guard_name}}">
                                <input type="checkbox" name="permissions[]" id="{{ $permission->name }}_{{$permission->guard_name}}" value="{{ $permission->name }}" /> {{ $permission->name }} - {{ $permission->guard_name }}
                            </label>
                            <br/>
                        @endforeach
                        @error('permissions')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-5">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                    </div>
                </form>
            </div>

        </div>
        </div>
    </div>
</x-app-layout>
