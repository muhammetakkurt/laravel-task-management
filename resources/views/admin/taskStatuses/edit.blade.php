<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit '.$taskStatus->name.' status.') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg grid py-8 px-6 px-2 text-sm md:grid-cols-3">
                <form method="POST" action="{{route('admin.task-statuses.update' , $taskStatus->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="col-span-5 pb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ $taskStatus->name }}" />
                        @error('name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-5 pb-3">
                        <label for="code">Code</label>
                        <input type="text" name="code" id="code" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                               value="{{ $taskStatus->code }}" />
                        @error('code')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-5 pb-3">
                        <label for="code">Color</label>
                        <input type="text" name="color" id="color" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                               value="{{ $taskStatus->color }}" />
                        @error('color')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-5 pb-3">
                        <label for="code">Order</label>
                        <input type="number" name="order" id="order" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                               value="{{ $taskStatus->order }}" />
                        @error('order')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
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
