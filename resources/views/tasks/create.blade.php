<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create task.') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{route('tasks.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg grid py-8 px-6 px-2 text-sm md:grid-cols-3">
                    <div class="md:col-span-5 pb-3">
                        <label for="status">Assigned User</label>
                        <x-form.select :options="$users" :selected="old('user_id') ?? ''" name="user_id" id="user_id" />
                        @error('user_id')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="md:col-span-5 pb-3">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('title') }}" />
                        @error('title')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-5 pb-3">
                        <label for="title">Content</label>
                        <textarea type="text" rows="10" name="content" id="content" class="border mt-1 rounded px-4 w-full bg-gray-50">{{ old('content') }}</textarea>
                        @error('content')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-5 pb-3">
                        <label for="velocity">Velocity</label>
                        <input type="number" name="velocity" id="velocity" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('velocity') }}" />
                        @error('velocity')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-5 pb-3">
                        <label for="status">Status</label>
                        <x-form.select :options="$taskStatuses" :selected="old('status') ?? ''" name="status" id="status" />
                        @error('status')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-5 pb-3">
                        <label for="status">Image</label>
                        <input type="file" name="image_path" />
                        @error('image_path')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-5">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
